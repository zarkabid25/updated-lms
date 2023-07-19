<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseTeacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'teacher_id',
    ];

    public function getCourse($data)
    {
        return $this->where($data)->exists();
    }

    public function createCourse($data)
    {
        return $this->create($data);
    }

}
