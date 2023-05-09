<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
