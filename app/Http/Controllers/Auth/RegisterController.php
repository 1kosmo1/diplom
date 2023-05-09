<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function store(Request $request){
        $request->validate([
           'login' => 'required|string|min:6|unique:users',
           'password' => 'required|confirmed|min:8',
        ]);



        $user = User::create([
           'login' => $request->login,
           'password' => $request->password,
        ]);

        Auth::login($user);

        return redirect()->route('public.profile',compact('user'));
    }
}
