<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('student'))
        {
            return view('studentdashboard');
        }
        elseif(Auth::user()->hasRole('staff'))
        {
            return view('staffdashboard');
        }
        elseif(Auth::user()->hasRole('admin')){
            return view('admindashboard');
        }
    }
    public function myprofile(){
        return view('myprofile');
    }
    public function myprofile1(){
        return view('myprofile1');
    }
}
