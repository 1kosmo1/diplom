<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moderation;
use App\Models\Photo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $photos = Moderation::all();

        return view('admin.moderation',compact('photos'));
    }

    public function allow($id){
        $photo = Moderation::find($id);

        $photo->update([
           'status' => 'allow'
        ]);

        Photo::create([
           'image'=>$photo->image,
            'user_id'=>$photo->user_id,
            'post_id'=>null
        ]);

        return redirect()->route('admin.moderation');
    }

    public function notAllow($id){
        $photo = Moderation::find($id);

        $photo->update([
           'status'=>'not allow'
        ]);

        return redirect()->route('admin.moderation');
    }
}
