<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairReply extends Model
{
    use HasFactory;
    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }
    protected $fillable = [
        'repair_id',
        'content',
        'date',
    ];
}
