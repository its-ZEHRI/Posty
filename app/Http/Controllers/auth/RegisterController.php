<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function registerUser(Request $request){
        // dd($request->toArray());
        // dd($request->only('email', 'password'));

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6'
        ]);
        // $user = new User;
        // $user->name = $request->input('name');
        // $user->email = $request->input('email');
        // $user->password = $request->input('password');
        // $user->save();

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password)
            ]);

        auth()->attempt($request->only('email','password'));

        return redirect()->route('dashboard');



    }
}
