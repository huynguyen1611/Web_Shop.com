<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Cho phép gán dữ liệu hàng loạt
    protected $fillable = [
        'name',
        'parent_id',
    ];
    // Danh mục cha (quan hệ belongsTo)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Danh mục con (quan hệ hasMany)
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Nếu cần: Liên kết với sản phẩm
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
