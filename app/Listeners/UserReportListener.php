<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use\App\Models\Fault;
use App\Events\UserReport;


class UserReportListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }
       
    

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserReport $event,Request $request)
    {      
                 
        



    //     public function joinTables() {

    //     $data = Fault::join('faults','faults.user_id','=','users.user_id')
    //     ->join('faults','faults.role_id','=','roles.role_id')
    //     ->get(['users.name','faults.fault_name','faults.category','faults.location']);

    //     return view('admin.dashboard',compact('data'));
    //         }
    //         return back();
    // }
}
