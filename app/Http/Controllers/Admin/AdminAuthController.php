<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminAuthController extends Controller
{
    public function index(){

    }

    public function auth(){
        return redirect()->route('admin.check');
    }
}
