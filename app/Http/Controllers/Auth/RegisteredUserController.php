<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
      // $data = DB::table('users')->insert([
      //     'reg_number' => $request->reg_number,
      //     'contact' => $request->contact_no,
      //     'gender' => $request->gender,
      //     'program_of_study' =>$request->program_of_study
      // ]);

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $path = 'users/images/';
        $fontPath =public_path('fonts/Oliciy.ttf');
        $char = strtoupper($request->name[0]);
        $newAvatarName = rand(12,34353).time().'_avatar.png';
        $dest =$path.$newAvatarName;

        $createAvatar = makeAvatar($fontPath, $dest, $char);
        $picture = $createAvatar ==  true ? $newAvatarName : '';

        $user = new User();
        $user->name = $request->name;
        $user->email= $request->email;
        $user->role = Auth::user()->role;
        $user->password = \Hash::make($request->password);
        $user->avatar = $picture;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role_id);
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
