<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkCourse extends Model
{
    use HasFactory;

    protected $table = 'bookmark_courses';

    protected $fillable = [
      'course_id', 'user_id'
    ];

    public function course(){
        return $this->belongsTo(CreateCourse::class, 'course_id', 'id');
    }

    public function store($data){
        return $this->create($data);
    }

    public function getCourses(){
        return $this->with('course')
            ->where('user_id', auth()->user()->id)
            ->get();
    }
}
