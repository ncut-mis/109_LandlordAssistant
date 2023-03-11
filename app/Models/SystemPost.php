<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemPost extends Model
{
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
