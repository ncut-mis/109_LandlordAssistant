<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public function expense(){
        return $this->belongsTo(Expense::class);
    }

    public function renter(){
        return $this->belongsTo(Renter::class);
    }
}
