<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'evaluate',
        'status',
        'price_sale',
        'price_nomal',
        'sale',
        'price_save',
        'color',
        'capacity',
        'describe',
        'images'
    ];

    protected $casts = [
        'color' => 'array',
        'capacity' => 'array',
        'images' => 'array',
    ];
}
