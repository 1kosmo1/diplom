<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function userProfile(){
        $userPhotos = auth()->user()->photos;

        return view('public.profile',compact('userPhotos'));
    }

    public function store(Request $request){
        $validating = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt([
            'login' => $request->get('login'),
            'password' => $request->get('password')
        ])) {
            return redirect()->intended(route('public.profile',Auth::user()));

        }

        return redirect()->intended(route('public.index'));
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('public.index');
    }
}
