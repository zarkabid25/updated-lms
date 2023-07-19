<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCourse extends Model
{
    use HasFactory;


    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(CreateCourse::class, 'course_id', 'id');
    }

    public function class()
    {
        return $this->belongsTo(CreateClass::class, 'class_id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id', 'id');
    }
    public function get_meeting()
    {
        return $this->hasMany(meeting::class, 'user_id', 'teacher_id');
    }
//    public function class()
//    {
//        return $this->belongsTo(CreateClass::class, 'teacher_id', 'user_id');
//    }
    public function studentuser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function getStudentId(){
        return $this->where('teacher_id', auth()->user()->id)
            ->get()
            ->unique('user_id');
    }
    public function getAllStudents($id){
        $users = $this->where('course_id', $id)
            ->pluck('user_id');
        return User::whereIn('id',$users)->get();
    }
    public function getTeacherId(){
        return $this->where('user_id', auth()->user()->id)
            ->get()
            ->unique('teacher_id');
    }

    public function createCourse(){
        return $this->belongsTo(CreateCourse::class, 'course_id');
    }

    
    public function editStatus($id,$status,$reason,$class_id){
        return $this->where('class_id', $class_id)->where('user_id', $id)
            ->update([
                'status' => $status,
                'reason' => $reason,
            ]);
    }
}
