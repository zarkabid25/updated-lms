<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TestMcqs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'mcq_sub_subject_name_id', 'data','status'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $table = 'test_mcqs';

    public function create($mcq_sub_subject_name_id){
        $ss = MCQSubSubjectName::find($mcq_sub_subject_name_id);
        $data = $this->where('mcq_sub_subject_name_id',$mcq_sub_subject_name_id)
        ->where('user_id',Auth::id())->where('status',0)->first();
                            // dd($data);
        if(!$data && $ss)
        {
            \DB::table('test_mcqs')->insert([
                'user_id' => Auth::id(),
                'mcq_sub_subject_name_id' => $mcq_sub_subject_name_id,
                'data' => json_encode([]),
            ]);
        }
        return true;
    }

    public function fetch($mcq_sub_subject_name_id){

        $data = $this->where('mcq_sub_subject_name_id',$mcq_sub_subject_name_id)
                            ->where('user_id',Auth::id())->where('status',0)->first();
        if($data)
        {
            return $data;
        }else{
            return [];
        }
    }

    public function store($data){
        $user_data = $this->where('mcq_sub_subject_name_id',$data['mcq_sub_subject_name_id'])
                            ->where('user_id',$data['user_id'])->where('status',0)->first();
        if($user_data)
        {
             $qs = $user_data->data;
             $qs[$data['ques_id']] = $data['opt_id'];
             if(count($qs) == 2)
             {
                $user_data->update([
                    'status' => 1,
                    'data' => $qs
                ]);
             }else{
                $user_data->update([
                    'data' => $qs
                ]);
             }
             return $user_data;
        // dd($qs);

        }else{
            $qs = [];
        //    $qs[$data['ques_id']] = $data['opt_val'];
        $user_data = $this->create([
                'user_id' => $data['user_id'],
                'mcq_sub_subject_name_id' => $data['mcq_sub_subject_name_id'],
                'data' => $qs,
            ]);
            return $user_data;
        }
    }

    public function subSubject(){
        return $this->belongsTo(MCQSubSubjectName::class, 'mcq_sub_subject_name_id', 'id');
    }

}
