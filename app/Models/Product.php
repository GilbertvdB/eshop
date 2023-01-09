<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Product extends Pivot
{
    protected $fillable = [

        'name', 'price', 'description', 'image'

    ];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id');
    }
}
