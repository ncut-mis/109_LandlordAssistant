<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function system_posts(){
        return $this->hasMany(SystemPost::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
