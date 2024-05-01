<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'numbers_employee',
        'salary',
        'description',
        'conditions',
        'is_accepted',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
