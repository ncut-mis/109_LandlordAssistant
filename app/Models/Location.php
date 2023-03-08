<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function post(){
        return $this->hasMany(Post::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function house(){
        return $this->hasMany(House::class);
    }
    protected $fillable = [
        'id',

        'name',

    ];
}
