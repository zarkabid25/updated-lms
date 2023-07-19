<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQSubSubjectName extends Model
{
    use HasFactory;

    protected $table = 'mcq_sub_subject_name';

    protected $fillable = [
        'sub_subject_name', 'mcq_subject_id','time', 'sub_subject_image'
    ];

    public function subject(){
        return $this->belongsTo(MCQSubject::class, 'mcq_subject_id', 'id');
    }

    public function getquestions(){
        return $this->hasMany(McqQuestion::class, 'mcq_sub_subject_name_id', 'id');
    }

    public function questions(){
        return $this->getquestions()->whereStatus(1);
    }

    public function subj(){
        return $this->hasOne(MCQSubject::class, 'id', 'mcq_subject_id');
    }

//    public function uni(){
//        return $this->hasOneThrough(University::class, MCQsCategory::class, 'uni_id', 'id');
//    }

    public function store($subSubject_name, $sub_subject_img, $mcq_subject_id, $time){
        return $this->updateOrCreate([
            'sub_subject_name' => $subSubject_name,
            'mcq_subject_id' => $mcq_subject_id,

        ],
            [
                'sub_subject_image' => $sub_subject_img,
                'time' => $time
            ]
        );
    }

    public function getData($subject){
        return $this->where('mcq_subject_id', $subject)->get();
    }

    public function getImg($sub_subbj_id){
        return $this->where('id', $sub_subbj_id)
            ->whereHas('subject')
            ->first();
    }

   public function getAllData(){
       return $this->orderBy('id', 'DESC')->get();
   }

   public function getSubSubj($sub_subj){
        return $this->where('id', $sub_subj)
            ->with('subject.category')
            ->first();
   }

   public function updateSubSubj($sub_subject_name, $sub_subject_img, $subSubj_id){
        return $this->where('id', $subSubj_id)
            ->update([
               'sub_subject_name' => $sub_subject_name,
               'sub_subject_image' => $sub_subject_img
            ]);
   }
}
