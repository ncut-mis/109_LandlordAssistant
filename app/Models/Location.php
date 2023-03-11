<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function owner(){
        return $this->belongsTo(Owner::class);
    }

    public function houses(){
        return $this->hasMany(House::class);
    }
    protected $fillable = [
        'id',

        'name',

    ];
}
