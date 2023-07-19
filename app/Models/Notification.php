<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $table = 'notifications';

    protected $fillable = [
      'user_id', 'title', 'description', 'role', 'p_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paymPlan(){
        return $this->hasOne(PaymentPlan::class, 'notification_id', 'id');
    }

    public function store($userID, $title, $description, $role, $p_id){
        return $this->create([
           'user_id' => $userID,
           'title' => $title,
           'description' => $description,
           'p_id' => $p_id,
           'role' => $role,
           'status' => '0',
        ]);
    }
}
