<?php

namespace App\Http\Controllers;

use App\Models\CreateCourse;
use App\Models\History;
use App\Models\studentnote;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\CreateClass;
use App\Models\meeting;
use App\Models\PurchaseCourse;



use Auth;
use URL;
class Teacher extends Controller
{
    public function find_class(Request $req)
    {
        $data=$req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find=CreateClass::where('user_id',auth()->user()->id)
            ->where('class_title', 'LIKE', "%$data%")
            ->get();

        return view('/teacher/find_class',compact('find'));
    }

    public function teacherFindCourse(Request $req)
    {
        $data=$req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = CreateCourse::where('course_name', 'LIKE', "%$data%")
            ->whereHas('class')
            ->get();

        return view('teacher.find_course', compact('find'));
    }

    public function teacherFindStudent(Request $req)
    {
        $data=$req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = User::where('name', 'LIKE', "%$data%")
            ->whereHas('class')
            ->get();

        return view('teacher.find_student', compact('find'));
    }

    public function teacherFindNotes(Request $req)
    {
        $data=$req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = studentnote::where('title', 'LIKE', "%$data%")
            ->where('student_id', auth()->user()->id)
            ->get();

        return view('teacher.find_notes', compact('find'));
    }

    public function studentFindClass(Request $req)
    {
        $data = $req->data;

        $history = [
          'user_id' => auth()->user()->id,
          'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = CreateClass::where('class_title', 'LIKE', "%$data%")->get();

        return view('student.find_class',compact('find'));
    }

    public function studentFindCourses(Request $req)
    {
        //dd($req);
        $data=$req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = CreateCourse::where('course_name', 'LIKE', "%$data%")->get();
        $html = view('student.find_course', compact('find'))->render();

        return response()->json($html);
    }

    public function studentFindMyCourses(Request $req)
    {
        $data = $req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = CreateCourse::where('course_name', 'LIKE', "%$data%")
            ->get();

        $html = view('student.find_my_course', compact('find'))->render();
        return response()->json($html);
    }

    public function studentFindNotes(Request $req)
    {
        $data = $req->data;

        $history = [
            'user_id' => auth()->user()->id,
            'history' => $data
        ];

        (new History())->storeHistory($history);

        $find = studentnote::where('title', 'LIKE', "%$data%")
            ->where('student_id', auth()->user()->id)
            ->get();

        return view('student.find_notes', compact('find'));
        //$find = CreateClass::where('user_id',auth()->user()->id)->where('class_title', 'LIKE', "%$data%")->get();
        //return view('/teacher/find_class',compact('find'));
    }

    public function mainFindCourse(Request $req)
    {
        $data = $req->data;

        $find = CreateCourse::where('course_name', 'LIKE', "%$data%")
            ->get();

        return view('mainFindCourse', compact('find'));
    }


    public function meeting()
    {
        $meet=meeting::where('user_id',auth()->user()->id)->orderBy('id', 'DESC')->get();;

        if(request()->path() == 'student/meeting'){
            $courses = PurchaseCourse::whereUser_id(auth()->user()->id)->whereHas('course')
            ->pluck('course_id');
            $meet=meeting::whereIn('course_id',$courses)->orderBy('id', 'DESC')->get();;
            
            return view('/student/meeting',compact('meet'));
        }else{
            return view('/teacher/meeting',compact('meet'));
        }
    }
    public function create_meeting()
    {
        if(Auth::User()->zoom_api==Null || Auth::User()->zoom_secret==Null)
        {

            return redirect('teacher/upload/profile')->with('error', 'Please Enter the Zoom Credentials First!');
        }
        else{
            $res = (new CreateCourse())->getCourses();
//        dd('here');
        $data = [
            'courses' => $res
        ];
        return view('/teacher/create_meeting',$data);
        }
    }
    public function save_meeting(Request $req)
    {
        $call_url=URL::to('/').'teacher/meeting';

        return view('zoom' ,compact('req','call_url'));
    }
    public function std_meeting()
    {
        $sortDirection=auth()->user()->id;
        // $meet=PurchaseCourse::where('user_id',auth()->user()->id)
        // ->with(['get_meeting' => function ($query) use ($sortDirection) {
        //                             $query->orderBy('id', $sortDirection);
        // }])->get()->unique('teacher_id');
          $meet=meeting::with(['get_meeting' => function ($query) use ($sortDirection) {
                                    $query->where('user_id', $sortDirection);
        }])->orderBy('id', 'DESC')->get();

        return view('/student/meeting',compact('meet'));
    }


}
