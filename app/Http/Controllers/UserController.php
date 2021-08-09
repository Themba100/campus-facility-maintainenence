<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function profile()
    {
        return view('myprofile1', array('user'=> Auth::user()));
    }
    public function student_prof()
    {
      return view('myprofile');
    }
}
