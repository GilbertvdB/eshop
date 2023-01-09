<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [

        'product_id', 'title', 'stars', 'name', 'review', 'likes', 'dislikes', 'flagged'

    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
