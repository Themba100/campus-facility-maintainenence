<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Fault;
use App\Models\User;
use App\Events\UserReport;
use App\Notifications\FaultReport;
use Illuminate\Support\Facades\Notification;

class HandleController extends Controller
{
     public function report(Request $request)
        {   
            $user = User::all();
            $fault = new Fault;
            $fault->fault_name = $request->fault_name;
            $fault->category = $request->category;
            $fault->location = $request->location;
            $fault->user_id = Auth::user()->id;
            $fault->email = Auth::user()->email;
            $fault->username= Auth::user()->name;
            $fault->description = $request->description;
            event(new UserReport($fault->save()));
           return back()->with('Fault reported','The fault has been reported successifully!!');
        }
        public function index()
        {
            $notifications = auth()->user()->unreadNotifications;
            return view('admin.notification',compact('notifications'));
        }
        public function markNotification()
            {
                auth()->user()
                    ->unreadNotifications
                    ->when($request->input('id'), function ($query) use ($request) {
                        return $query->where('id',$request->input('id'));
                    })
                    ->markAsRead();
                    return response()->noContent();
            }
        
        
        
        }

        
