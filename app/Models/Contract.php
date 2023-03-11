<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    public function renter(){
        return $this->belongsTo(Renter::class);
    }
    public function house(){
        return $this->belongsTo(House::class);
    }
}
