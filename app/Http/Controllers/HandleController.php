<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Fault;
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
            // $fault->role_id = Auth::user()->role_id;
            $fault->description = $request->description;
            $fault->save();
            Notification::send(new FaultReport($request->fault_name));
            return back()->with('Fault reported','The fault has been reported successifully!!');
        }

        }
