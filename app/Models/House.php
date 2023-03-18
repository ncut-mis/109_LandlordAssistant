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

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function repairs(){
        return $this->hasMany(Repair::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    public function image(){
        return $this->hasMany(Image::class);
    }

    public function features(){
        return $this->hasMany(Feature::class);
    }

    public function furnishings(){
        return $this->hasMany(Furnish::class);
    }

    public function signatories(){
        return $this->hasMany(Signatory::class);
    }

	protected $fillable = [
        'id',
        'address',
        'lease_status',
        'introduce',
        'name',
        'furnish',
        'amount',
        'feature',
		'location_id',
		'owner_id',
		'house_id',
		'image',
		'num_renter',
		'min_period',
		'pattern',
		'size',
		'type',
		'floor',
    ];
}
