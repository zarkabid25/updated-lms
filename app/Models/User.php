<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'status',
        'bio',
        'linkedin_url',
        'stripe_secret_key',
        'stripe_public_key',
        'subscription_expiry_date',
        'remaining_vids',
        'zoom_api',
        'zoom_secret',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications(){
        return $this->hasMany(Notification::class, 'user_id', 'id');
    }

    public function getData(){
        return $this->where('id', auth()->user()->id)
            ->first();
    }


    public function getStatData(){
        $quizes = UserMcqs::where('user_id', auth()->user()->id)
            ->get();
            $attempted = 0;
            $options = [];
            $avg = [];
        foreach($quizes as $v){

        // foreach($v as $o){
        //     $options[$v->mcq_sub_subject_name_id] = $o->opt_val;
        //     $avg[$v->mcq_sub_subject_name_id] = count($v->data) / ;
        // }
            $attempted += count($v->data);
        }
        $all = McqQuestion::count();
        if($all > 0)
        {
            $all = $all * 2;
        }
        // $data = [
        //     'correct_percentage' =>
        // ];
        return [
            'subjects' => MCQSubject::all(),
            'all' => $all,
            'attempted' => $attempted
        ];

    }

    public function updateProfile($data, $id){
        return $this->where('id', $id)
            ->update($data);
    }

    public function getUser(){
        return $this->role('Student')->get();
    }

    public function getPurchasedCourse($id){
        return PurchaseCourse::where('course_id',$id)->where('user_id',$this->id)->first();
    }

    public function getTechers(){
        return $this->role('Teacher')->get();
    }

    public function updateTeacher($data, $id){
        //dd($data);
        return $this->where('id', $id)
                ->update($data);
    }

    public function teacherDel($id){
        return $this->where('id', $id)
            ->delete();
    }

    public function updateStudent($data, $id){
        return $this->where('id', $id)
                ->update($data);
    }

    public function studentDel($id){
        return $this->where('id', $id)
            ->delete();
    }

    public function getProfileData(){
        return $this->where('id', auth()->user()->id)
            ->first();
    }

    public function updateMyProfile($data){

        return $this->where('id', auth()->user()->id)
            ->update($data);
    }

    public function delUser($id){
        return $this->where('id', $id)
            ->delete();
    }

    public function storeExpiry($data){
        return $this->where('id', auth()->user()->id)
            ->update($data);
    }

    public function course()
    {
        return $this->belongsTo(CreateCourse::class, 'id', 'teacher_id');
    }

    public function class()
    {
        return $this->belongsTo(CreateClass::class, 'id', 'user_id');
    }

    public function getStudent($id){
        return $this->where('id', $id)
            ->get(['id','name', 'image']);
    }

    public function studentChats(){
        return $this->hasMany(Chat::class, 'to_id');
    }

    public function teacherChats(){
        return $this->hasMany(Chat::class, 'from_id');
    }

    public function getUserPassword(){
        return $this->where('id', auth()->user()->id)
            ->first('password');
    }

    public function getTestMcqs(){
        return $this->hasOne(TestMcqs::class);
    }

    public function resetPassword($data){
        return $this->where('id', auth()->user()->id)
            ->update($data);
    }

    public function subscription(){
        return $this->hasOne(Subscription::class);
    }

    public function getExpiry(){
        return $this->where('id', auth()->user()->id)
            ->first('subscription_expiry_date');
    }

    public function checkVids(){
        return $this->where('id', auth()->user()->id)
            ->first(['remaining_vids', 'subscription_expiry_date']);
    }

    public function updateRemainingVids($vids_left){
        return $this->where('id', auth()->user()->id)
            ->update([
               'remaining_vids' => $vids_left
            ]);
    }
    public function meets(){
        return $this->hasMany(meeting::class, 'user_id');
    }

    public function getRemainVids(){
        return $this->where('id', auth()->user()->id)
            ->first('remaining_vids');
    }

    public function balance($teacher_id, $payment_amount){
        $balnc = $this->where('id', $teacher_id)
            ->first('balance');
        if(!empty($balnc)){
           $my_balnc = $balnc->balance + $payment_amount;
        }else{
            $my_balnc = $payment_amount;
        }
        return $this->where('id', $teacher_id)
            ->update(['balance' => $my_balnc]);
    }

//    public function getBalnc($id){
//        return $this->where('id', $id)
//            ->first('balance');
//    }

    public function updateBalnc($new_balnc){
        return $this->where('id', auth()->user()->id)
            ->update(['balance' => $new_balnc]);
    }

    public function getTeacherData(){
        return $this->where('id', auth()->user()->id)
            ->first();
    }
}
