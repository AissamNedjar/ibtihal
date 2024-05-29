<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'images',
        'is_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
