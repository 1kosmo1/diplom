<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Posts\PostsController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Regions\RegionsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Public\IndexController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->name('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('.moderation');

    Route::prefix('posts')->name('.posts')->group(function (){
        Route::get('/',[PostsController::class,'index'])->name('.index');
        Route::get('/create',[PostsController::class,'create'])->name('.create');
        Route::post('/',[PostsController::class,'store'])->name('.store');
        Route::get('/{post}',[PostsController::class,'show'])->name('.show');
        Route::get('/{post}/edit',[PostsController::class,'edit'])->name('.edit');
        Route::put('/{post}',[PostsController::class,'update'])->name('.update');
        Route::post('/{post}',[PostsController::class,'destroy'])->name('.destroy');
    });

    Route::prefix('regions')->name('.regions')->group(function (){
        Route::get('/',[RegionsController::class,'index'])->name('.index');
        Route::get('/create',[RegionsController::class,'create'])->name('.create');
        Route::post('/',[RegionsController::class,'store'])->name('.store');
        Route::get('/{region}/edit',[RegionsController::class,'edit'])->name('.edit');
        Route::put('/{region}',[RegionsController::class,'update'])->name('.update');
        Route::post('/{region}',[RegionsController::class,'destroy'])->name('.destroy');
    });

    Route::prefix('users')->name('.users')->group(function (){
        Route::get('/',[UsersController::class,'index'])->name('.index');
    });

    Route::prefix('gallery')->name('.gallery')->group(function (){
        Route::get('/',[GalleryController::class,'index'])->name('.index');
    });

});

Route::name('public')->group(function (){
   Route::get('/',[IndexController::class,'index'])->name('.index');
   Route::get('/show/{post}',[IndexController::class,'show'])->name('.show');
   Route::get('/profile/{user}', [AuthController::class,'userProfile'])->middleware('auth')->name('.profile');
   Route::post('/register',[RegisterController::class,'store'])->name('.register');
   Route::post('/login',[AuthController::class,'store'])->name('.login');
});

