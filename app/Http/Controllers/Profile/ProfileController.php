<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\Moderation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function addImage(Request $request){
        $this->validate($request,[
            'image.*'=> 'mimes:jpeg,jpg,png'
        ]);

        $path = $request->file('image')->store('images','public');

        $photo = Moderation::create([
            'image'=> $path,
            'user_id'=>auth()->user()->id,
            'status'=>'waiting',
        ]);

        return redirect()->route('public.index');
    }

    public function sendMessage(){
        $mm = new SendMail();

        Mail::to('lukashevich.deniska@bk.ru')->send(new SendMail());

        return redirect()->route('public.index');
    }
}
