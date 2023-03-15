<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;
    public function house(){
        return $this->belongsTo(House::class);
    }

    public function renter(){
        return $this->belongsTo(Renter::class);
    }

    public function repair_replies(){
        return $this->hasMany(RepairReply::class);
    }
    protected $fillable = [
        'renter_id',
        'house_id',
        'status',
        'content',
        'date',
    ];
}
