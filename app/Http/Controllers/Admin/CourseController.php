<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreateCourse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CreateCourse $createCourse)
    {
        return view('admin.course.index',['courses' => $createCourse->getAllCourses()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,CreateCourse $createCourse)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,CreateCourse $createCourse)
    {
        $std_id = decrypt($request->id);
        $status = $request->status;
        $reason = $request->reason;
        $res = $createCourse->editStatus($std_id,$status,$reason);
        if($res == '1'){
            return response()->json(['success' => true]);
        } else{
            return response()->json(['success' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,CreateCourse $createCourse)
    {
        $std_id = decrypt($id);
        $res = $createCourse->deleteCourse($std_id);
        if($res == '1'){
            return redirect()->back()->with('success', 'Record deleted successfully');
        } else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
