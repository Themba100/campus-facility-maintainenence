<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Details;
use App\Models\Fault;
use App\Models\Role;
use App\Models\User;

use Image;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->hasRole('student'))
        {
            return view('student.dashboard');
        }
        elseif(Auth::user()->hasRole('staff'))
        {
            return view('staff.staffdashboard');
        }
        elseif(Auth::user()->hasRole('admin')){
            return view('admin.dashboard');
        }
    }
    
        public function getData(){
             $issues = Fault::all();
            return view('admin.dashboard',compact('issues'));    
        }

    public function myprofile(){
      $details = Details::all();
    return view('myprofile',compact('details'));
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
  
        public function notify()
        {
            $notification = auth()->user()->unreadNotifications;
            return view('admin.dashboard',compact('notification'));
        }
        public function markNotification(Request $request){
            auth()->user()->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request){
                return $query->where('id',$request->input('id'));
            })
            ->markAsRead();

            return response()->noContent();
        }
        // if($save){

        //     return back()->with('Fault Reported','The fault was reported successifully');
        //     }
        //     else{
        //         return back()->with('Failed to report','The fault was not reported');
        //     }
        
    
// staff pages
public function stafffault()
{
    return view('staff.stafffault');
}
public function staffNotification()
{
    return view('staff.staffnotification');
}
public function staffProf()
{
    return view('staff.profile');
}
public function staffSettings()
{
    return view('staff.settings');
}
// admin pages
public function adminFault()
{
    return view('admin.faultmanagement');
}
public function adminNotification()
{
    $user = User::find(1);
    return view('admin.notification',compact('user'));
}
public function adminSettings()
{
    return view('admin.settings');
}

public function studentFault()
{
    return view('student.faults');
}
public function studentNotification()
{
    return view('student.notification');
}
public function studentSettings()
{
    return view('student.settings');
}


}



