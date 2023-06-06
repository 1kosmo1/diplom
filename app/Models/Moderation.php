<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderation extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'user_id',
        'status'
    ];

    public $timestamps = false;
    protected $table = 'moderations';

    public function user(){
        return $this->belongsTo(User::class);
    }
}
