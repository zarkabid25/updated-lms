<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EntryTestType;
use App\Models\McqCorrectOption;
use App\Models\McqOption;
use App\Models\McqQuestion;
use App\Models\MCQsCategory;
use App\Models\MCQSubject;
use App\Models\MCQSubSubjectName;
use App\Models\MCQYear;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class McqsController extends Controller
{

    public function index($id){
        $cats_data = MCQSubSubjectName::find(decrypt($id));
        $questions = $cats_data->questions;
        $s = $cats_data->id;
        return view("admin.mcq's.categories-mcqs", compact('questions','s'));
    }

    public function store(Request $request){
        try{
            if($request->has('uni') && $request->has('category_name') && !empty($request->category_name) ){

                if($request->has('cat_img') && !empty($request->cat_img)){
                    $cat_img = $request->cat_img;
                    $res = (new MCQsCategory())->store($cat_img, $request->category_name, $request->testType, $request->uni);
                } else{
                    $cat_img = null;
                    $res = (new MCQsCategory())->store($cat_img, $request->category_name, $request->testType, $request->uni);
                }

                if($request->has('subject_name') && !empty($request->subject_name)) {
                    $mcq_category_id = $res->id;

                    if($request->has('subject_img') && !empty($request->subject_img)) {
//                        $sub_img = compressImagePHP($request, 'subject_img');
                        $res = (new MCQSubject())->store($mcq_category_id, $request->subject_img, $request->subject_name);
                    } else{
                        $sub_img = null;
                        $res = (new MCQSubject())->store($mcq_category_id, $sub_img, $request->subject_name);
                    }

                    if($request->has('sub_subject_name') && !empty($request->sub_subject_name) && !empty($request->paper_time)){
                        $mcq_subject_id = $res->id;

                        if($request->has('sub_subject_img') && !empty($request->sub_subject_img)) {
                            $sub_subject_img = $request->sub_subject_img;
                        } else{
                            $sub_subject_img = null;
                        }

                        $time = $request->paper_time . ':00';
                        $res = (new MCQSubSubjectName())->store($request->sub_subject_name, $sub_subject_img, $mcq_subject_id, $time);
                    }
                }
            }

//        if($request->has('year') && !empty($request->year)){
//            $data = [
//                'year' => $request->year,
//            ];
//
//            $res = (new MCQYear())->store($data);
//
//            if(empty($res)){
//                return redirect()->back()->with('error', 'Year is incorrect.');
//            }
//        }

            if(!$request->has('category_name')) {
                return redirect()->back()->with('error', 'Something went wrong.');
            } else{
                return redirect()->back()->with('success', 'Data stored successfully.');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function getCategoryData(Request $request){
        //dd($request->all());
        try{
            if($request->type == 'category'){
                $subjects = (new MCQSubject())->getData($request->category);
//dd($subjects);
                $html = view("admin.mcq's.render_subjects", compact('subjects'))->render();
//dd($html);
                return response()->json(['subject', $html]);
            }

            if($request->type == 'subject'){
                $sub_subjects = (new MCQSubSubjectName())->getData($request->subject);

                $html = view("admin.mcq's.render_sub_subjects", compact('sub_subjects'))->render();

                return response()->json(['sub_subject',$html]);
            }
        } catch (\Exception $exception){
            return response()->json($exception->getMessage());
        }
    }

    public function createMcqs(Request $request) {
// dd($request->all());
        try{
            $this->validate($request, [
               'subject' => 'required',
               'ques' => 'required'
            ]);


            $cats_data = MCQSubSubjectName::find(decrypt($request->subject));
            $request->request->add([
                'category' => $cats_data->subj->cat->id,
                'subject' => $cats_data->subj->id,
                'sub_subject' => $cats_data->id
            ]);
            $ques_data = [
              'ques' => $request->ques,
              'mcq_category_id' => $request->category,
              'mcq_subject_id' => $request->subject,
              'mcq_sub_subject_name_id' => $request->sub_subject,
              'status' => ($request->has('status')) ? 1 : 0,
              'test' => ($request->has('test')) ? 1 : 0,
            ];

            $res = (new McqQuestion())->store($ques_data);

            $data = array($request->post());
            $reco = $data[0];
            if(isset($reco['_token']) || isset($reco['category']) || isset($reco['subject']) || isset($reco['sub_subject']) || isset($reco['ques']) || isset($reco['correct_opt']) || isset($reco['correc_opt_explanation']) || isset($reco['status']) || isset($reco['test'])) {
                foreach ($reco as $key=>$record){
                    if($key == '_token' || $key == 'category' || $key == 'subject' || $key == 'sub_subject' || $key == 'status' || $key == 'test' || $key == 'ques' || $key == 'correct_opt' || $key == 'correc_opt_explanation'){
                        unset($reco[$key]);
                    }
                }
            }
            (new McqOption())->store($res->id, $reco);

            $correct_opt = $request->correct_opt;
            $opt_id = (new McqOption())->getCorrectOptId($correct_opt);

            $data = [
                'correct_opt' => $correct_opt,
                'mcq_option_id' => $opt_id->id,
                'mcq_question_id' => $res->id
            ];

            if($request->has('correc_opt_explanation') && !empty($request->correc_opt_explanation)){

                $data['incorrect_explanation'] = $request->correc_opt_explanation;

            }

            $correc_opt = (new McqCorrectOption())->store($data);

             if(!empty($correc_opt)){
                 return redirect()->route('admin.cats-ques',['id'=>encrypt($request->sub_subject)])->with('success', 'MCQ created succesfully.');
             } else{
                 return redirect()->back()->with('error', 'Something went wrong.');
             }
        } catch (\Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function editQuizQues($id){
        $question = McqQuestion::find(decrypt($id));
        return view("admin.mcq's.categories-mcqs-edit",compact('question'));
    }
    public function updateQuizQues(Request $request,$id){
        // dd($request->all());
        $question = McqQuestion::find(decrypt($id));
        $rules=[
            "ques" => "required",
          ];
          foreach($question->options as $q)
          {
            $rules[$q->opt_key]='required';
          }
        $v = Validator::make($request->all(), $rules);

        if($v->fails())
        {
            toastr()->error($v->errors()->first());
            return redirect()->back();
        }
        $data=$request->all();
        $data['ques_id']=decrypt($id);
        $mcqsData = (new McqQuestion())->updateQuizData($data);

        toastr()->success("Mcq updated successfully!");
        return redirect()->route('admin.cats-ques',['id'=>encrypt($question->subSubject->id)]);
    }

    public function allCategories(){
        $cats_data = (new MCQSubSubjectName())->getAllData();
    // return $cats_data;
        return view("admin.mcq's.all-categories", compact('cats_data'));
    }

    public function editCategory($id){
        $sub_subj = decrypt($id);
        $subSubject = (new MCQSubSubjectName())->getSubSubj($sub_subj);

        return view("admin.mcq's.edit-categories", compact('subSubject'));
    }

    public function updateCategory(Request $request){

        try{
            $test_id = $request->test_name;
            $uni_id = $request->uni_name;
            $cat_id = $request->cat_id;
            $subj_id = $request->subj_id;
            $subSubj_id = $request->subSubj_id;

            if($request->has('cat_img') && !empty($request->cat_img)){
                $cat_img = compressImagePHP($request, 'cat_img');
                $res = (new MCQsCategory())->updateCat($cat_img, $request->category_name, $cat_id, $test_id, $uni_id);
            } else{
                $cat_img = null;
                $res = (new MCQsCategory())->updateCat($cat_img, $request->category_name, $cat_id, $test_id, $uni_id);
            }

            if($request->has('subject_name') && !empty($request->subject_name)) {
                if($request->has('subj_img') && !empty($request->subj_img)){
                    $sub_img = compressImagePHP($request, 'subj_img');
                    $res = (new MCQSubject())->updateSubject($subj_id, $sub_img, $request->subject_name);
                } else{
                    $sub_img = null;
                    $res = (new MCQSubject())->updateSubject($subj_id, $sub_img, $request->subject_name);
                }
            }

            if($request->has('sub_subject_name') && $request->sub_subject_name){

                if($request->has('subSubj_img') && $request->subSubj_img){
                    $sub_subject_img = compressImagePHP($request, 'subSubj_img');
                } else{
                    $sub_subject_img = null;
                }

                (new MCQSubSubjectName())->updateSubSubj($request->sub_subject_name, $sub_subject_img, $subSubj_id);
            }

            return redirect()->back()->with('success', 'Data updated successfully.');

        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function testUni(){
        $test_types = (new EntryTestType())->all();
        return view("admin.mcq's.create-testType-universities", compact('test_types'));
    }

    public function storeTestUni(Request $request){

        try{
            if($request->has('test_type') && !empty($request->test_type)){
                $res = (new EntryTestType())->store($request->test_type);

                if($request->has('uni_name') && !empty($request->uni_name)){
                    $res = (new University())->store($request->uni_name, $res->id);
                }

                if(!empty($res)){
                    return redirect()->back()->with('success', 'Data stored successfully');
                } else{
                    return redirect()->back()->with('error', 'Something went wrong');
                }
            } else{
                return redirect()->back()->with('error', 'Test Type field is required.');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function allTestType() {
        $test_types = (new University())->getTestData();
        return view("admin.mcq's.all-testType", compact('test_types'));
    }

    public function editTestUni($id, $uni_id){
        $test_id = decrypt($id);
        $univers_id = decrypt($uni_id);

        $test_data = (new EntryTestType())->getTestData($test_id);
        $uni_data = (new University())->getUniData($univers_id);
        $test_types = (new EntryTestType())->all();

        return view("admin.mcq's.edit-testType", compact('test_data', 'test_types', 'uni_data'));
    }

    public function updateTestUni(Request $request){
        try{
            if($request->has('test_type') && !empty($request->test_type)){
                $testTpye_id = $request->testTpye_id;
                $res = (new EntryTestType())->updateTestType($request->test_type, $testTpye_id);

                if($request->has('uni_name') && !empty($request->uni_name) && !empty($request->uni_id)){
                    $uni_id = $request->uni_id;
                    $res = (new University())->updateUni($request->uni_name, $uni_id);
                }

                if(!empty($res) || $res == 1){
                    return redirect()->back()->with('success', 'Data updated successfully');
                } else{
                    return redirect()->back()->with('error', 'Something went wrong');
                }
            } else{
                return redirect()->back()->with('error', 'Test Type field is required.');
            }
        } catch (\Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    public function getUni(Request $request){
        $testType = $request->testType;
        $universities = (new University())->getUni($testType);

        $html = view("admin.mcq's.render-universities", compact('universities'))->render();
        return response()->json(['university' => $html]);
    }
}
