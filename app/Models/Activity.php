<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'numero',
        'type',
        'status',
        'date_start',
        'date_end',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
