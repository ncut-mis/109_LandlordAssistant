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
	protected $fillable = [
        'id',
        'house_id',
        'amount',
	];
}
