<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
      'ques', 'mcq_category_id', 'mcq_subject_id', 'mcq_sub_subject_name_id', 'status', 'test'
    ];

    protected $table = 'mcq_questions';

    public function correctOption(){
        return $this->hasMany(McqCorrectOption::class, 'mcq_question_id', 'id');
    }

    public function correct_option(){
        return $this->hasOne(McqCorrectOption::class, 'mcq_question_id', 'id');
    }

    public function options(){
        return $this->hasMany(McqOption::class, 'mcq_question_id', 'id');
    }

    public function mcqCategory(){
        return $this->belongsTo(MCQsCategory::class);
    }

    public function subject(){
        return $this->belongsTo(MCQSubject::class, 'mcq_subject_id', 'id');
    }

    public function subSubject(){
        return $this->belongsTo(MCQSubSubjectName::class, 'mcq_sub_subject_name_id', 'id');
    }

    public function store($ques_data){
        return $this->create($ques_data);
    }

    public function getCount($sub_subbj_id){
        return $this->whereStatus(1)->where('mcq_sub_subject_name_id', $sub_subbj_id)->count();
    }

    public function getQuestions($sub_subbj_id){
        return $this->whereStatus(1)->where('mcq_sub_subject_name_id', $sub_subbj_id)
            ->with('options', 'subject', 'subSubject')
            ->paginate(1);
    }

    public function getTestQuestions($sub_subbj_id){
        return $this->whereStatus(1)->whereTest(1)->where('mcq_sub_subject_name_id', $sub_subbj_id)
            ->with('options', 'subject', 'subSubject')
            ->get();
    }

    public function getQuizData($subSubject){
        return $this->where('mcq_sub_subject_name_id', $subSubject)
            ->with('options', 'correctOption')->get();
    }
    public function updateQuizData($data){
        $ques = $this->where('id', $data['ques_id'])->first();
        $ques->update([
            'ques' => $data['ques'],
            'status' => (isset($data['status'])) ? 1 : 0,
            'test' => (isset($data['test'])) ? 1 : 0,
        ]);
        $correct_val = $ques->correctOption[0]['correct_opt'];
        foreach($ques->options as $o){
            $opt_name = substr($o->opt_key, '4');
            $o->update([
                'opt_value' => $data['opt_'.$opt_name]
            ]);
            if($data['correct_opt'] == $o->id)
            {
                $correct_val = $data['opt_'.$opt_name];
            }
        }
        $id = $ques->correctOption[0]->id;
        McqCorrectOption::find($id)->update([
            'correct_opt' => $correct_val,
            'mcq_option_id' => $data['correct_opt'],
            'incorrect_explanation' => $data['correc_opt_explanation'],
        ]);
    }
}
