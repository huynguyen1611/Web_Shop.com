<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'short_description',
        'content',
        'origin',
        'main_sku',
        'price',
        'sale_price',
        'discount_percent',
        'warranty_months',
        'has_variants'
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}
