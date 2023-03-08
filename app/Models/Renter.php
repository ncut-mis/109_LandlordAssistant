<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;
    public function contract(){
        return $this->hasMany(Contract::class);
    }
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
        return $this->hasMany(NowRenter::class);
    }
}
