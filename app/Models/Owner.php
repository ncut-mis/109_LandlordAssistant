<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    public function house(){
        return $this->hasMany(House::class);
    }
    public function location(){
        return $this->hasMany(Location::class);
    }

    //public function user(){
    //    return $this->belongsTo(User::class);
    //}

    public function post(){
        return $this->hasMany(Post::class);
    }

    public function user(){
        return $this->morphMany(User::class,'carry_on'); //繼承(子)
    }
}
