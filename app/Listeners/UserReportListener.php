<?php

namespace App\Listeners;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use\App\Models\Fault;
use App\Models\User;
use App\Events\UserReport;
use Illuminate\Support\Facades\Notification;
use App\Notification\FaultReport;


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
    public function handle($event)
    {      
        $admin = User::whereHas('roles',function ($query){
            $query->where('id',1);
        })->get();
        Notification::send($admin, new FaultReport($event->fault));
                 
        
        }
}
