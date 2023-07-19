<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\McqCorrectOption;
use App\Models\McqQuestion;
use App\Models\MCQsCategory;
use App\Models\MCQSubSubjectName;
use App\Models\TestMcqs;
use App\Models\UserMcqs;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class McqsController extends Controller
{
    public function mcqs(){
        if(auth()->user()->can('Mcqs'))
        {
            return redirect()->route('student.categories');
        }

        return view('student.mcqs');
    }

    public function getMcqs($id){
        if(!auth()->user()->can('Mcqs'))
        {
            return redirect()->route('student.mcqs');
        }

        $cat_id = decrypt($id);

        $mcq_categories_data = (new MCQsCategory())->getData($cat_id);

        $cat_name = $mcq_categories_data[0]->category_name;

        return view('user.mcqs.mcqs-cats', compact('mcq_categories_data', 'cat_name'));
    }

    function getTestCategories(){
        if(!auth()->check())
        {
            Session::put('url.mcqs',URL::full());
            return redirect('/register');
        }
        Session::remove('url.mcqs');

        if($this->TestMcqs())
        {
            return redirect('/payment_methods');
        }
        return view("student.test-quiz-cats");
    }

    public function getTestMcqs($id){
        $cat_id = decrypt($id);

        $mcq_categories_data = (new MCQsCategory())->getData($cat_id);

        $cat_name = $mcq_categories_data[0]->category_name;


        if(!auth()->check())
        {
            Session::put('url.mcqs',URL::full());
            return redirect('/register');
        }
        Session::remove('url.mcqs');

        if($this->TestMcqs())
        {
            return redirect('/payment_methods');
        }

        return view('user.mcqs.test-mcqs-cats', compact('mcq_categories_data', 'cat_name'));
    }

    public function getMCQsQuest(Request $request){
//        dd($request->all());
        if(!auth()->user()->can('Mcqs'))
        {
            return redirect()->route('student.mcqs');
        }

        $sub_subbj_id = $request->sub_subj_id;
        $paper_type = $request->paper_type;
        $questions = (new McqQuestion())->getQuestions($sub_subbj_id);
//        $total = $questions->total();
//       return $questions;
        if($request->has('activity') && $request->get('activity') == 'start' && $request->has('mcqs'))
        {
            $um = UserMcqs::find($request->get('mcqs'));
            if($um)
            {
                $um->delete();
            }
        }
        $quiz = (new UserMcqs())->create($sub_subbj_id,$paper_type);
        $answers = (new UserMcqs())->fetch($sub_subbj_id,$paper_type);

//        $data = [
//            'questions' => $questions,
//            'sub_subbj_id' => $sub_subbj_id,
//            'paper_type' => $paper_type,
//            'answers' => $answers,
//        ];

        //$j = json_encode($data);
//        Session::forget('mcqs');
//        Session::put('mcqs', serialize($data));
//        return redirect()->route('student.my-questions');
        return view('user.mcqs.mcqs-ques', compact('questions','sub_subbj_id', 'paper_type','answers'));
    }

    public function TestMcqs(){

        $res = 0;
        $TestMcqs = auth()->user()->getTestMcqs;
        if($TestMcqs)
        {
            $questions = (new McqQuestion())->getTestQuestions($TestMcqs->mcq_sub_subject_name_id);

            if(count($TestMcqs->data) == count($questions))
            return true;
        }
        return false;
    }

    public function getTestMCQsQuest(Request $request,$id, $name){
        if(!auth()->check())
        {
            Session::put('url.mcqs',URL::full());
            return redirect('/register');
        }
        Session::remove('url.mcqs');
        if($this->TestMcqs())
        {
            return redirect('/payment_methods');
        }


        $sub_subbj_id = decrypt($id);
        $sub_subbj_name = decrypt($name);
        $paper_type = $request->paper_type;

        $questions = (new McqQuestion())->getTestQuestions($sub_subbj_id);

        $quiz = (new TestMcqs())->create($sub_subbj_id);
        $answers = (new TestMcqs())->fetch($sub_subbj_id);

        return view('user.mcqs.test-mcqs-ques', compact('questions','sub_subbj_id', 'paper_type','answers'));
    }

    public function instructionPage(Request $request){
        if(!auth()->user()->can('Mcqs'))
        {
            return redirect()->route('student.mcqs');
        }

        $sub_subbj_id = $request->id;
//        dd($sub_subbj_id);
//        $sub_subbj_name = decrypt($name);

        $count = (new McqQuestion())->getCount($sub_subbj_id);
        $sub_subj = (new MCQSubSubjectName())->getImg($sub_subbj_id);
        $cat_name = $sub_subj->subject->category->category_name;
        $test_name = $sub_subj->subject->category->entryTest->name;

        $html = view('user.mcqs.mcqs-instructions', compact('count','sub_subj', 'test_name', 'cat_name'))->render();

        return response()->json($html);
//        return view('user.mcqs.mcqs-instructions', compact('count', 'sub_subbj_id', 'img', 'test_name', 'cat_name'));
    }

    public function pauseTimer(Request $request){
        $paper_type = $request->paper_type;
        $ss = UserMcqs::where('mcq_sub_subject_name_id',$request->sub_subbj_id)
                            ->where('user_id',Auth::id())->where('status',0)->where('paper_type',$paper_type)->first();
        if($ss)
        {
            $data = ['pause' => 1];

            if($paper_type == 'premium')
            {
                $min = Carbon::now()->diffInSeconds(Carbon::parse($ss->time));
                $data['min_left'] = ($min > 0) ? $min : 0;
            }
            $ss->update($data);
            return true;
        }
    }

    public function completeQuiz(Request $request){
        $paper_type = $request->paper_type;
        $ss = UserMcqs::where('mcq_sub_subject_name_id',$request->sub_subbj_id)
                            ->where('user_id',Auth::id())->where('status',0)->where('paper_type',$paper_type)->first();
        if($ss)
        {
            $data['status']=1;
            if($paper_type == 'premium')
            {
                $min = Carbon::now()->diffInSeconds(Carbon::parse($ss->time));
                $data['min_left'] = ($min > 0) ? $min : 0;
            }
            $ss->update($data);
            return true;
        }
    }

    public function getCorrecOpt(Request $request){
        $ques_id = $request->ques_id;
        $opt_val = $request->opt_val;
        $opt_id = $request->opt_id;
        $sub_subbj_id = $request->sub_subbj_id;
        $paper_type = $request->paper_type;
        $data = [
            'user_id' => Auth::id(),
            'ques_id' => $ques_id,
            'opt_val' => $opt_val,
            'opt_id' => $opt_id,
            'mcq_sub_subject_name_id' => $sub_subbj_id,
        ];
        $res = (new McqCorrectOption())->getCorrecOpt($ques_id, $opt_val);
        $answers = (new UserMcqs())->store($data,$paper_type);

        return response()->json($res);
    }


    public function getCorrecStat(Request $request){
        $paper_type = $request->paper_type;
        $tt = MCQSubSubjectName::find($request->sub_subbj_id);
        $ss = UserMcqs::where('mcq_sub_subject_name_id',$request->sub_subbj_id)
                            ->where('user_id',Auth::id())->where('status',0)->where('paper_type',$paper_type)->first();
        if($ss && $tt)
        {

            $time = $tt->time;
            $a = explode(':',$time);
            $m = ($a[0]) * 60 + ($a[1]);
            $time = Carbon::now()->addMinutes($m)->toDateTimeString();

            $s = Carbon::now()->diffInSeconds(Carbon::parse($time));
            $min = Carbon::now()->diffInSeconds(Carbon::parse($ss->time));

            $dis = $s - $min;

            $correct = 0;
            $incorrect = 0;
            $total = count($ss->data);
            foreach ($ss->data as $key => $value) {
            $c = \App\Models\McqCorrectOption::where('mcq_option_id',$value)->first();
            if($c)
            {
                $correct += 1;
            }else{
                $incorrect += 1;
            }
            }
            return response()->json([
                'success' => true,
                'correct' => $correct,
                'incorrect' => $incorrect,
                'total' => $total,
                'time' => $dis,
            ]);
        }else{
            return response()->json([
                'success' => false,
                'correct' => 0,
                'incorrect' => 0,
                'total' => 0,
                'time' => '',
            ]);
        }
    }

    public function getTestCorrecOpt(Request $request){
        $ques_id = $request->ques_id;
        $opt_val = $request->opt_val;
        $opt_id = $request->opt_id;
        $sub_subbj_id = $request->sub_subbj_id;
        $paper_type = $request->paper_type;
        $data = [
            'user_id' => Auth::id(),
            'ques_id' => $ques_id,
            'opt_val' => $opt_val,
            'opt_id' => $opt_id,
            'mcq_sub_subject_name_id' => $sub_subbj_id,
        ];
        $res = (new McqCorrectOption())->getCorrecOpt($ques_id, $opt_val);
        $answers = (new TestMcqs())->store($data);

        $questions = (new McqQuestion())->getTestQuestions($sub_subbj_id);

        $res['redirect'] = (count($answers->data) == count($questions)) ? true : false;
        return response()->json($res);
    }

    public function mcqsTypeRecord($id, $testType){
        $testId = decrypt($id);
        $test_name = decrypt($testType);

        $cates = (new \App\Models\MCQSubject())
            ->with('category', 'subSubjects')
            ->whereHas('category', function($q) use($testId) {
                $q->where('testType_id', '=', $testId);
            })
            ->orderBy('id', 'DESC')
            ->get();

        $arr = [
          'id' => $id,
          'test_name' => $test_name,
          'cates' => $cates,
        ];

        return view('student.quiz-cats', $arr);
    }
}
