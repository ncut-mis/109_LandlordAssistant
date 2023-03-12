<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Furnish extends Model
{
    use HasFactory;
    public function house(){
        return $this->belongsTo(House::class);
    }
	
	protected $table = 'furnishings';
	
	protected $fillable = [
        'id',
		'house_id',
		'furnish'
	];
}
