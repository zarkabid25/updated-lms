<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if(Session::has('url.mcqs'))
        {
            $path = Session::get('url.mcqs');
            Session::remove('url.mcqs');
            // dd($path);
            return redirect($path);
        }
        
        if(auth()->user()->roles()->first()->name == 'Admin'){
            return redirect()->route('admin.dashboard');
        }
        elseif (auth()->user()->roles()->first()->name == 'Teacher'){
            return redirect()->route('teacher.dashboard');
        }
        else{
            return redirect()->route('student.dashboard');
        }
    }
}
