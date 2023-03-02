<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    use HasFactory;

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    public function contract(){
        return $this->belongsTo(Contract::class);
    }
    public function contract_detail(){
        return $this->hasMany(ContractDetail::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
    public function repair(){
        return $this->hasMany(Repair::class);
    }
    public function pack(){
        return $this->hasMany(Pack::class);
    }
    public function cost(){
        return $this->hasMany(Cost::class);
    }
    public function image(){
        return $this->hasMany(Image::class);
    }

    public function feature(){
        return $this->hasMany(Feature::class);
    }
    public function device(){
        return $this->hasMany(Device::class);
    }

}
