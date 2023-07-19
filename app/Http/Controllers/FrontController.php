<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('home.index');
    }
    public function price()
    {
        return view('user/price');
    }
}
