<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function contract_detail(){
        return $this->hasMany(ContractDetail::class);
    }

    public function repair(){
        return $this->hasMany(Repair::class);
    }

    public function now_renter(){
        return $this->belongsToMany(House::class,'now_renter','renter_id','house_id');
    }

    public function user(){
        return $this->morphMany(User::class,'carry_on'); //繼承(子)
    }
}
