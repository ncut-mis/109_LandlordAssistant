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
}
