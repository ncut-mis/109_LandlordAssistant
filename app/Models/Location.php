<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    public function post(){
        return $this->hasMany(Post::class);
    }
    public function manager_list(){
        return $this->hasMany(ManagerList::class);
    }
    public function owner(){
        return $this->belongsTo(Owner::class);
    }
    protected $fillable = [
        'id',
       
        'name',

    ];
}
