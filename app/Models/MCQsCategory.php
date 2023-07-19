<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQsCategory extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_name', 'category_image', 'testType_id', 'uni_id'
    ];

    protected $table = 'mcq_categories';

//    public function subjects(){
//        return $this->hasManyThrough(MCQSubSubjectName::class, MCQSubject::class, 'mcq_category_id', 'mcq_subject_id', 'id', 'id');
//    }

    public function subjects(){
        return $this->hasMany(MCQSubject::class, 'mcq_category_id', 'id');
    }

    public function uni(){
        return $this->belongsTo(University::class, 'uni_id', 'id');
    }

    public function entryTest(){
        return $this->belongsTo(EntryTestType::class, 'testType_id', 'id');
    }

    public function questions(){
        return $this->hasMany(McqQuestion::class, 'mcq_category_id', 'id');
    }

    public function store($cat_img, $category_name, $testType, $uni){
        if($this->where('category_name', $category_name)->where('category_image', '!=', null)->exists()){
            $res = $this->where('category_name', $category_name)->first('id');
        } else {
            $res = $this->updateOrCreate([
                'category_name' => $category_name,
            ],
                [
                    'category_image' => $cat_img,
                    'testType_id' => $testType,
                    'uni_id' => $uni
                ]
            );
        }
        return $res;
    }

    public function getData($cat_id){
        return $this->where('id', $cat_id)
            ->with('subjects.subSubjects')
            ->get();
    }

    public function updateCat($cat_img, $category_name, $cat_id, $test_id, $uni_id){
        return $this->where('id', $cat_id)
            ->update([
               'category_name' => $category_name,
               'testType_id' => $test_id,
               'uni_id' => $uni_id,
               'category_image' => $cat_img
            ]);
    }


}
