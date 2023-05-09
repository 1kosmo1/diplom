<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderation;

class AdminController extends Controller
{
    public function index(){
        $photos = Moderation::all();

        return view('admin.moderation',compact('photos'));
    }
}
