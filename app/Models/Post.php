<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'location_id',
        'user_id',
        'title',
        'content',
        'date'
    ];

    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
