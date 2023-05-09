<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function userProfile(){
        return view('public.profile');
    }

    public function store(Request $request){
        $validating = $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($validating)) {
            $request->session()->regenerate();

            return redirect()->intended('public.profile',Auth::user());
        }

        return redirect()->route('public.index');
    }
}
