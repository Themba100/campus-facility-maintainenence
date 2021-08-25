<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeController extends Controller
{
  public function profile()
  {
      return view('myprofile1', array('user'=> Auth::user()));
  }
  public function student_prof()
  {
    return view('myprofile');
  }
  public function studentFault()
  {
     return view('studentfault');
  }
  public function Notify(){
    return view('notification');
  }
    public function accountSettings()
    {
        return view('settings');

    }

        public function accountSettings1()
        {
            return view('settings1');

        }
    public function insertData(Request $request)
    {
     DB::table('details')->insert([
        "first_name" => $request->first_name,
        "last_name" => $request->last_name,
        "gender" => $request->gender,
        "reg_number" => $request->reg_number,
        "contact" => $request->contact,
        "image" => $request->image,
        "program_of_study" => $request->p_of_study
        ]);
        return back()->with('Account updated successifully');
    }
    public function fetchUsers(){
       $users =  DB::table('details')->get();
          return view('myprofile',compact('users'));
      }

}
