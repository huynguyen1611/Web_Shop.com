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
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function thumbnail()
    {
        return $this->hasOne(Image::class)->where('is_thumbnail', true);
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function subCategories()
    {
        return $this->belongsToMany(Category::class, 'product_sub_category', 'product_id', 'category_id');
    }
    // Nếu Product có nhiều Attribute qua bảng trung gian
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attribute', 'product_id', 'attribute_id');
    }
}
