<?php

namespace App\Models;

use App\Casts\JsonCast;
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

    protected function casts(): array
    {
        return [
            'images' => JsonCast::class,
        ];
    }

    public function farmer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
