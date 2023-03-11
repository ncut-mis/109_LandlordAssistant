<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signatory extends Model
{
    use HasFactory;
    public function house(){
        return $this->belongsTo(House::class);
    }

    public function renter(){
        return $this->belongsTo(Renter::class);
    }
}
