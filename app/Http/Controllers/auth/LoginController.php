<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        // dd($request->remember);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

    if(!auth()->attempt($request->only('email','password')))
        return back()->with('invalid_response','Invalid Credentials...');

    return redirect()->route('dashboard');

    }

}
