<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaultController extends Controller
{
    public function fault(){
        return view('faults');
    }

}
