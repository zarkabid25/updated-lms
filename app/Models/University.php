<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    protected $table = 'universities';

    protected $fillable = [
      'name', 'entry_test_type_id'
    ];

    public function entryTest(){
        return $this->belongsTo(EntryTestType::class, 'entry_test_type_id', 'id');
    }

    public function categories(){
        return $this->hasMany(MCQsCategory::class, 'uni_id', 'id');
    }

    public function store($uni_name, $test_id){
        $res = $this->updateOrCreate([
            'name' => $uni_name,
            'entry_test_type_id' => $test_id
        ],
            [
                'name' => $uni_name
            ]
        );
        return $res;
    }

    public function getTestData(){
        return $this->with('entryTest')
            ->get();
    }

    public function getUniData($univers_id){
        return $this->where('id', $univers_id)
            ->first();
    }

    public function updateUni($uni_name, $uni_id){
        if($this->where('id', $uni_id)->exists()){
            return $this->where('id', $uni_id)
                ->update([
                   'name' => $uni_name
                ]);
        } else{
            return $this->create([
               'name' => $uni_name
            ]);
        }
    }

    public function getUni($testType){
        return $this->where('entry_test_type_id', $testType)
            ->get();
    }
}
