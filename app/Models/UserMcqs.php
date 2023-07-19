<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserMcqs extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'mcq_sub_subject_name_id', 'data','time','min_left','pause','status','paper_type'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    protected $table = 'users_mcqs';

    public function create($mcq_sub_subject_name_id,$paper_type){
        $ss = MCQSubSubjectName::find($mcq_sub_subject_name_id);
        $data = $this->where('mcq_sub_subject_name_id',$mcq_sub_subject_name_id)
        ->where('user_id',Auth::id())->where('status',0)->where('paper_type',$paper_type)->first();
                            // dd($data);
        if(!$data && $ss)
        {
            // dd($ss);
            $time = $ss->time;
            $a = explode(':',$time);
            $m = ($a[0]) * 60 + ($a[1]);
            $time = Carbon::now()->addMinutes($m)->toDateTimeString();
            $qs = [];
            \DB::table('users_mcqs')->insert([
                'user_id' => Auth::id(),
                'mcq_sub_subject_name_id' => $mcq_sub_subject_name_id,
                'data' => json_encode($qs),
                'time' => $time,
                'paper_type' => $paper_type
            ]);
        }
        return true;
    }

    public function fetch($mcq_sub_subject_name_id,$paper_type){

        $data = $this->where('mcq_sub_subject_name_id',$mcq_sub_subject_name_id)
                            ->where('user_id',Auth::id())->where('status',0)->where('paper_type',$paper_type)->first();
        if($data)
        {
            $res = ['pause' => 1];
            if($data->pause == 1 && $data->min_left > 0 && $data->status == 0 && $paper_type == 'premium')
            {
                $time = Carbon::now()->addSeconds($data->min_left)->toDateTimeString();
                $res['time'] = $time;
                $res['min_left'] = 0;
            }
            $data->update($res);
            return $data;
        }else{
            return [];
        }
    }

    public function store($data,$paper_type){
        $user_data = $this->where('mcq_sub_subject_name_id',$data['mcq_sub_subject_name_id'])
                            ->where('user_id',$data['user_id'])->where('status',0)->where('paper_type',$paper_type)->first();
        if($user_data)
        {
             $qs = $user_data->data;
             $qs[$data['ques_id']] = $data['opt_id'];

            $user_data->update([
                'data' => $qs
            ]);
        }else{
            $qs = [];

            $this->create([
                'user_id' => $data['user_id'],
                'mcq_sub_subject_name_id' => $data['mcq_sub_subject_name_id'],
                'data' => $qs,
            ]);
        }
        return true;
    }

    public function subSubject(){
        return $this->belongsTo(MCQSubSubjectName::class, 'mcq_sub_subject_name_id', 'id');
    }

}
