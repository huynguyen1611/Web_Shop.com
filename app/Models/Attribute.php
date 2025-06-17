<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'value',
        'image',
    ];

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }

    public function variantAttributes()
    {
        return $this->hasMany(ProductVariantAttribute::class);
    }
}
