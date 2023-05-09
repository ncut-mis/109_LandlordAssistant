<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    public function repairs(){
        return $this->hasMany(Repair::class);
    }

    public function signatories(){ //租客有可能同時租兩間房 故擁有多筆signatories
        return $this->hasMany(Signatory::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    //public function user(){
    //    return $this->morphMany(User::class,'carry_on'); //繼承(子)
    //}
    protected $fillable = [
        'id',
        'user_id',
    ];
}
