<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemPost extends Model
{
    protected $fillable = [
        'id',
        'admin_id',
        'title',
        'content',
    ];
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
