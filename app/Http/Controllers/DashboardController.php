<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Events\FautEvent;
use App\Models\Details;
use App\Models\Fault;
use App\Models\Role;
use App\Models\User;

use Image;

class DashboardController extends Controller
{   
// verifying the user and redirecting the user to the specified page according to the role type
    public function index()
    {
        if(Auth::user()->hasRole('student'))
        {
            $studentdata = Fault::all()->where('user_id','=',Auth::user()->id);
            return view('student.dashboard',compact('studentdata'));
        }
        elseif(Auth::user()->hasRole('staff'))
        {
             $staffdata = Fault::all()->where('user_id','=',Auth::user()->id);
             
            return view('staff.staffdashboard',compact('staffdata'));
        }
        elseif(Auth::user()->hasRole('admin')){
            $issues = Fault::all();
            return view('admin.dashboard',compact('issues'));
        }
    
     }
    //  retrievin the fault by id in the database
     public function getFaultById($id){
         $staffdata = Fault::all()->where('id',$id)->first();
         return view('staff.staffdashboard',compact('fault'));
        }
        // deleting the reported fault
     public function deleteFaultStaff($id)
     {
        // calling the delete function where the id matches the id in the database
           $staffdata = Fault::find($id);
           $staffdata->delete();    
        // showing the user that the fault has been deleted successifully
        return back()->with('Fault_deleted', 'fault has been deleted successifully');
    }
      public function deleteFaultStudent($id)
     {
        // calling the delete function where the id matches the id in the database
           $staffdata = Fault::find($id);
           $staffdata->delete();    
        // showing the user that the fault has been deleted successifully
        return back()->with('Fault_deleted', 'fault has been deleted successifully');
    }
    //Getting data from database and displaying it on the admins panel   
//   public function getData(){
             
//             return view('admin.issues',compact('issues'));    
//         }
        public function fixFault($id)
        {
          $fault  = Fault::where("id", $id)->first();
            if($fault){
                $fault->status = 'fixed';
                event(new FaultEvent($fault->user_id));
                $fault->save();
                return response()->json([
                    "message" => "fault fixed"
                ]);
                
            }
            else{
             return back()->with('Error','Something went wrong');

            }
        }

    public function myprofile(){
      $details = Details::all();
    return view('myprofile',compact('details'));
    }
        // creating a notification notification
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
public function studentProf()
{
    return view('student.profile');
}


}



