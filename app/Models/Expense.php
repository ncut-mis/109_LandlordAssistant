<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public function payments(){
        return $this->hasMany(Payment::class);
    }
    public function houses(){
        return $this->hasMany(House::class);
    }
	protected $fillable = [
        'id',
        'house_id',
        'type',
        'amount',
        'start_date',
        'end_date',
        'remark',
	];
}
