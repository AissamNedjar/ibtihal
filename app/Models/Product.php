<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'price',
        'quantity',
        'description',
        'images',
        'is_accepted',
    ];

    public function farmer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
