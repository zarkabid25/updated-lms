<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CreateClass;
use App\Models\PurchaseCourse;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CreateClass $createClass)
    {
        return view('admin.class.index',['classes' => $createClass->getAdminAllClasses()]);
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
    public function show($id,PurchaseCourse $purchaseCourse)
    {
        $id = decrypt($id);
        $users = $purchaseCourse->getAllStudents($id);
        return view('admin.class.students',compact('users','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request,PurchaseCourse $purchaseCourse)
    {
        $std_id = decrypt($request->id);
        $status = $request->status;
        $reason = $request->reason;
        $class_id = $request->class_id;
        $res = $purchaseCourse->editStatus($std_id,$status,$reason,$class_id);
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
    public function destroy($id,CreateClass $createClass)
    {
        $std_id = decrypt($id);
        $res = $createClass->deleteClass($std_id);
        if($res == '1'){
            return redirect()->back()->with('success', 'Record deleted successfully');
        } else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
