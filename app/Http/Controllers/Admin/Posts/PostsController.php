<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Region;
use App\Models\Photo;
use Illuminate\Http\Request;

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
        ]);

        foreach ($request->images as $image) {
            $request->validate([
                $image => 'mimes:jpeg,jpg,png',
            ]);
        }


        $post = Post::create([
           'title' => $request->input('title'),
           'text' => $request->input('text'),
           'region_id' => $request->input('region_id'),
        ]);

        foreach ($request->images as $image) {
            Photo::create([
                'image' => $image,
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
        ]);

        foreach ($request->images as $image) {
            $request->validate([
                $image => 'mimes:jpeg,jpg,png',
            ]);
        }

        $post = Post::find($id);

        $post->update([
           'title' => $request->input('title'),
            'text' => $request->input('text'),
            'region_id' => $request->input('region_id')
        ]);

        foreach ($post->photos()->get() as $item){
            foreach ($request->images as $image) {
                if (!$item->image === $image) {
                    Photo::create([
                        'image'=> $image,
                        'post_id' => $id
                    ]);
                }
                else if(!in_array($item->image,$request->images)){
                    $item->delete();
                }
            }
        }

        return redirect()->route('admin.posts.show',$id);
    }
}
