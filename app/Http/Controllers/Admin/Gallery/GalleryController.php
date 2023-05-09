<?php

namespace App\Http\Controllers\Admin\Gallery;

use App\Http\Controllers\Controller;
use App\Models\Photo;

class GalleryController extends Controller
{
    public function index(){
        $photos = Photo::all();

        return view('admin.gallery', compact('photos'));
    }
}
