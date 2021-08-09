<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeController extends Controller
{
    public function accountSettings()
    {
        return view('settings');

    }
    public function insertData(Request $request)
    {
    $details =  DB::table('details')->insert([
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

}
