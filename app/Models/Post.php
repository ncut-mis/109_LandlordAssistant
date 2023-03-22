<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'id',
        'location_id',
        'user_id',
        'title',
        'content',
        'date'
    ];
    protected $casts = [
        'title' => 'string',
        'content' => 'string',
        'date'=>'date',
    ];
    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    public function location(){
        return $this->belongsTo(Location::class);
    }
}
