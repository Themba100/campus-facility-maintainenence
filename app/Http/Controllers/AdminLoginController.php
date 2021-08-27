<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Session;
class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function register()
    {
        return view('admin.register');
    }
    public function save(Request $request)
    {
        // return $request->input();

        // validate the data in the database
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>  ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        
        // insert data into the database
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password =Hash::make($request->password);
        $save = $admin->save();
        
        if($save){
            return back()->with('success','User Successifully created');
        }
        else{
            return back()->with('Fail','Something went wrong');
        }
  
    }
    public function check(Request $request)
    {
        // return $request->input();
        //validate the form 
        $request->validate([
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $UserInfo = Admin::where('email', '=',$request->email)->first();

        if(!$UserInfo)
        {
            return back()->with('Authentication Failed','We could not recognise your email address');
        }
        else{
            // check password
            if(Hash::check($request->password, $UserInfo->password)){
                $request->session()->put('LoggedUser',$UserInfo->id);
                return redirect('admin/admindashboard');
            }   
            else{
                return back()->with('Authentication Failed','Incorrect password');
            }
        }

    }
}
