<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Post;

class IndexController extends Controller
{
    public function index(){
        $posts = Post::all();

        return view('public.main',compact('posts'));
    }

    public function show($id){

        $post = Post::find($id);

        return view('public.show',compact('post'));
    }
}
