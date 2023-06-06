<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Region;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create(){
        $regions = Region::all();

        return view('admin.posts.create',compact('regions'));
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'string',
            'text' => 'string',
            'region_id' => 'integer',
            'dol' => 'decimal:0,8',
            'shir' => 'decimal:0,8',
        ]);

        $this->validate($request,[
            'images.*'=>'mimes:jpeg,jpg,png'
        ]);


        $post = Post::create([
           'title' => $request->input('title'),
           'text' => $request->input('text'),
           'region_id' => $request->input('region_id'),
            'dol' => $request->input('dol'),
            'shir' => $request->input('shir'),
        ]);

        foreach ($request->images as $image) {
            $path = $image->store('images','public');

            Photo::create([
                'image' => $path,
                'post_id' => $post->id
            ]);
        }


        return redirect()->route('admin.posts.index');
    }

    public function edit($id){
        $post = Post::find($id);
        $regions = Region::all();
        return view('admin.posts.edit',compact(['post','regions']));
    }

    public function destroy(Request $request){
        Post::find($request->id)->delete();

        return redirect()->route('admin.posts.index');
    }

    public function show($id){
        $post = Post::find($id);
        return view('admin.posts.show',compact('post'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'string',
            'text' => 'string',
            'region_id' => 'integer',
            'dol' => 'decimal:0,8',
            'shir' => 'decimal:0,8',
        ]);

        $this->validate($request,[
            'images.*'=>'mimes:jpeg,jpg,png'
        ]);

        $post = Post::find($id);

        $post->update([
           'title' => $request->input('title'),
            'text' => $request->input('text'),
            'region_id' => $request->input('region_id'),
            'dol' => $request->input('dol'),
            'shir' => $request->input('shir'),
        ]);

        foreach ($request->images as $image) {
            $path = $image->store('images','public');

            Photo::create([
                'image' => $path,
                'post_id' => $post->id
            ]);
        }

        return redirect()->route('admin.posts.show',$id);
    }

    public function addComment(Request $request){
        $post = Post::find($request->post_id);
        if(Auth::check()){
            $comment = Comment::create([
               'text' => $request->text,
               'user_id' => $request->user()->id,
                'post_id' => $request->post_id
            ]);

            return view('public.show',compact('post'));
        }
        else{
            return redirect()->route('public.show',$request->post_id);
        }
    }
}
