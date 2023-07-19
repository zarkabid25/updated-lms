<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqCorrectOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'correct_opt', 'mcq_option_id', 'mcq_question_id', 'incorrect_explanation'
    ];

    protected $table = 'mcq_correct_options';

    public function question(){
        return $this->belongsTo(McqQuestion::class, 'mcq_question_id', 'id');
    }

    public function store($data){
        return $this->create($data);
    }

    public function getCorrecOpt($ques_id, $opt_val){
//        dd($ques_id);
        return $this->where('mcq_question_id', $ques_id)
            ->first();
    }
}
