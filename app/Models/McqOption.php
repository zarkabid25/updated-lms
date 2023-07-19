<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class McqOption extends Model
{
    use HasFactory;

    protected $fillable = [
      'opt_key', 'opt_value', 'mcq_question_id'
    ];

    protected $table = 'mcq_options';

    public function question(){
        return $this->belongsTo(McqQuestion::class);
    }

    public function store($ques_id, $reco){
        foreach ($reco as $key=>$val){
              $data =  $this->create([
                   'opt_key' => $key,
                   'opt_value' => $val,
                   'mcq_question_id' => $ques_id
              ]);
        }

        return $data;
    }

    public function getCorrectOptId($correct_opt){
        return $this->where('opt_value', $correct_opt)->first('id');
    }
}
