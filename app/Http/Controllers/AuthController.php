<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function loginCheck(Request $request){
        $request->validate([
            'email' =>'required|email',
            'password' =>'required'
        ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->with('error','Invalid credentials');
    }

    $token = $user->createToken('API Token')->plainTextToken;
    Session::put('auth_token', $token);
    return redirect('/admin/dashboard')->with('success', 'Login Successful');;
    }

    public function logout(Request $request)
{
    session()->forget('auth_token'); 
    return redirect('/login')->with('success', 'Logged out successfully.');
}
}
