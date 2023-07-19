<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
    use HasFactory;

    protected $table = 'payment_plans';

    protected $fillable = [
      'user_id', 'payment_plan', 'price', 'status', 'request_product', 'course_id', 'teacher_id', 'notification_id'
    ];

    public function storePlan($data){
        return $this->create($data);
    }
}
