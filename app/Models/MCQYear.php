<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCQYear extends Model
{
    use HasFactory;

    protected $table = 'mcq_years';

    protected $fillable = [
      'year'
    ];

    public function store($data){
        return $this->create($data);
    }
}
