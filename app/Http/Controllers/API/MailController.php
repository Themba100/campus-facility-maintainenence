<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        $validateData = $request->validate([
            'email' => 'required|email'
        ]);
        $details = [
          "Name" => $request->input('Name'),
          "Email" => $request->input('Email'),
          "Message" =>$request->input('Message')
        ];
        Mail::to('hopetizifa@gmail.com');
        return response()->json([
          'status' => 200,
          'message' => 'Mail sent successifully',
        ]);
    }
}
