<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $photos = Photo::limit(3)->get();
        $regions = Region::all();
        return view('public.main',compact('photos', 'regions'));
    }

    public function posts(Request $request){
        $regions = Region::all();
        $postsUrl = $request->path();
        if(isset($request->search)){
            $posts = Post::where('title','LIKE',"%{$request->search}%")->paginate(9);
        }
        else if(isset($request->filter)){
            $posts = Post::where('region_id','=',$request->filter)->paginate(9);
            $filterId = $request->filter;
            return view('public.posts',compact('posts','regions','filterId','postsUrl'));
        }
        else if(isset($request->alfavit)){
            if($request->alfavit === 'a'){
                $posts = Post::orderBy('title','asc')->paginate(9);
                return view('public.posts',compact('posts','regions','postsUrl'));
            }
            else{
                $posts = Post::orderBy('title','desc')->paginate(9);
                return view('public.posts',compact('posts','regions','postsUrl'));
            }
        }
        else{
            $posts = Post::paginate(9);
        }

        return view('public.posts',compact('posts','regions','postsUrl'));
    }

    public function gallery(Request $request){
        $gallery = $request->path();

        if(isset($request->date_filter)){
            if($request->date_filter === 'up'){
                $photos = DB::table('photos')->latest()->where('user_id','!=','null')->get();
            }
            else{
                $photos = DB::table('photos')->oldest()->where('user_id','!=','null')->get();
            }
        }
        else{
            $photos = Photo::where('user_id','!=','null')->get();
        }
        return view('public.gallery',compact('photos','gallery'));
    }

    public function show($id){

        $post = Post::find($id);

        return view('public.show',compact('post'));
    }
}
