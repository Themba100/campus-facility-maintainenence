<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Details;
use App\Models\Fault;
use App\Models\Role;

use Image;
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
      $details = Details::all();
    return view('myprofile',compact('details'));
    }

    public function myprofile1(){
        return view('myprofile1');
    }

    // public function update_avatar(Request $request)
    // {
    //             //  handle image requests
    //     if ($request->hasFile('avatar'))
    //     {
    //         $avatar = $request->file('avatar');
    //         $filename = time() . '.' .$avatar->getOriginalExtension();
    //         Image::make($avatar)->resize(300, 300)->save( public_path('/images' . $filename));
    //
    //         $user = Auth::user();
    //         $user->avatar = $filename;
    //        $user->save();
    // }
    // return view('account',  array('user' => Auth::user()));
    // }
        public function user(){
            $user = new Role;
            $user->name = Auth::user()->name;
            $user->email = Auth::user()->email;
            $user->save();
            return back()->with('success');
        }
        public function report(Request $request,$role_id,$user_id,$user_type)
        {

            $user = Role::find($role_id,$user_id,$user_type);
            $fault = new Fault;
            $fault->fault_name = $request->fault_name;
            $fault->category = $request->category;
            $fault->location = $request->location;
            $fault->description = $request->description;
            $user->faults()->save($fault);

       if($save){

        return back()->with('Fault Reported','The fault was reported successifully');
        }
        else{
            return back()->with('Failed to report','The fault was not reported');
        }
    
    }



}
