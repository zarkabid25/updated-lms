<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQSubject extends Model
{
    use HasFactory;

    protected $table = 'mcq_subjects';

    protected $fillable = [
      'subject_name', 'subject_image', 'mcq_category_id'
    ];

    public function category(){
        return $this->belongsTo(MCQsCategory::class, 'mcq_category_id', 'id');
    }

    public function cat(){
        return $this->hasOne(MCQsCategory::class, 'id', 'mcq_category_id');
    }

    public function subSubjects(){
        return $this->hasMany(MCQSubSubjectName::class, 'mcq_subject_id', 'id');
    }

    public function questions(){
        return $this->hasMany(McqQuestion::class, 'mcq_subject_id', 'id');
    }

    public function categ(){
        return $this->hasOne(MCQsCategory::class, 'mcq_category_id', 'id');
    }

    public function store($mcq_category_id, $sub_img, $subject_name){
        if($this->where('subject_name', $subject_name)->where('subject_image', '!=', null)->exists()){
            //dd('here');
            $res = $this->where('subject_name', $subject_name)->first('id');
        } else{
           $res = $this->updateOrCreate([
                'subject_name' => $subject_name,
                'mcq_category_id' => $mcq_category_id
            ],
                [
                    'subject_image' => $sub_img
                ]
            );
        }
        return $res;
    }

    public function getData($cat){
        return $this->where('mcq_category_id', $cat)->get();
    }

    public function updateSubject($subj_id, $sub_img, $subject_name){
        return $this->where('id', $subj_id)
            ->update([
               'subject_name' => $subject_name,
               'subject_image' => $sub_img
            ]);
    }
}
