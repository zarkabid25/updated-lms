<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryTestType extends Model
{
    use HasFactory;

    protected $table = 'entry_test_types';

    protected $fillable = [
      'name'
    ];

    public function universities(){
        return $this->hasMany(University::class, 'entry_test_type_id', 'id');
    }

    public function categories(){
        return $this->hasMany(MCQsCategory::class, 'testType_id', 'id');
    }

    public function store($test_type){
        if($this->where('name', $test_type)->exists()){
            $res = $this->where('name', $test_type)->first('id');
        } else {
            $res = $this->create([
                'name' => $test_type
            ]);
        }

        return $res;
    }

    public function getTestData($test_id){
        return $this->where('id', $test_id)
            ->first();
    }

    public function updateTestType($test_type, $testTpye_id){
        return $this->where('id', $testTpye_id)
            ->update([
                'name' => $test_type
            ]);
    }
}
