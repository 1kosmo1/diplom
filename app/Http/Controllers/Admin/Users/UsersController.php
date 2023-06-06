<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }

    public function userInfo($id){
        $user = User::find($id);

        return view('admin.user-info',compact('user'));
    }

    public function update(Request $request,$id){
        $user = User::find($id);

        $request->validate([
           'login' => 'string|min:6',
            'email' => 'email:rfc,dns',
        ]);

        $user->update([
           'login' => $request->login,
           'email' => $request->email,
        ]);

        return redirect()->route('admin.users.index');
    }
}
