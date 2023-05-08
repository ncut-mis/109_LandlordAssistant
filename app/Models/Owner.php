<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    public function houses(){
        return $this->hasMany(House::class);
    }
    public function locations(){
        return $this->hasMany(Location::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    //public function user(){
    //    return $this->morphMany(User::class,'carry_on'); //繼承(子)
    //}
    protected $fillable = [
        'id',
        'user_id',
    ];
}
