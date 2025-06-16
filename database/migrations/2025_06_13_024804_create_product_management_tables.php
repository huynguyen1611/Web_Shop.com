<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductManagementTables extends Migration
{
    public function up()
    {
        // 1. Tạo bảng categories: quản lý danh mục cha và con
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->string('name'); // tên danh mục
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade');
            // parent_id liên kết đến chính bảng categories (danh mục cha), có thể null nếu là danh mục gốc
            $table->timestamps(); // created_at và updated_at
        });

        // 2. Tạo bảng products: quản lý thông tin chung sản phẩm
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Khóa chính
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Danh mục phụ
            $table->string('name'); // Tên sản phẩm
            $table->text('short_description')->nullable(); // Mô tả ngắn
            $table->longText('content')->nullable(); // Nội dung chi tiết
            $table->string('origin')->nullable(); // Xuất xứ
            $table->string('main_sku')->nullable(); // Mã sản phẩm
            $table->decimal('price')->default(0); // Giá gốc
            $table->decimal('sale_price')->nullable(); // Giá đã giảm
            $table->integer('discount_percent')->nullable(); // Phần trăm tiết kiệm (ví dụ 7%)
            $table->integer('warranty_months')->nullable(); // Bảo hành
            $table->boolean('has_variants')->default(false); // Có nhiều phiên bản không
            $table->timestamps(); // created_at & updated_at
        });

        // 3. Tạo bảng images: quản lý ảnh đại diện và album ảnh sản phẩm
        Schema::create('images', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // liên kết với sản phẩm
            $table->string('file_path'); // đường dẫn hoặc tên file ảnh
            $table->boolean('is_thumbnail')->default(false);
            // đánh dấu ảnh đại diện (true) hoặc ảnh trong album (false)
            $table->timestamps(); // created_at và updated_at
        });

        // 4. Tạo bảng attributes: quản lý nhóm thuộc tính (ví dụ: màu sắc, dung lượng)
        Schema::create('attributes', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->string('name', 100); // tên thuộc tính
            $table->timestamps(); // created_at và updated_at
        });

        // 5. Tạo bảng attribute_values: giá trị cụ thể của từng thuộc tính
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->foreignId('attribute_id')->constrained('attributes')->onDelete('cascade');
            // liên kết với nhóm thuộc tính
            $table->string('value', 100); // giá trị thuộc tính (ví dụ: đỏ, 256GB)
            $table->timestamps(); // created_at và updated_at
        });

        // 6. Tạo bảng product_variants: quản lý từng phiên bản cụ thể của sản phẩm
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            // liên kết với sản phẩm chính
            $table->string('sku', 100)->unique(); // SKU riêng của phiên bản
            $table->decimal('price', 15, 2)->default(0); // giá của phiên bản (có thể khác giá gốc)
            $table->integer('stock_quantity')->default(0); // số lượng tồn kho phiên bản
            $table->string('variant_image')->nullable(); // ảnh riêng của phiên bản, có thể null
            $table->timestamps(); // created_at và updated_at
        });

        // 7. Tạo bảng product_variant_attributes: liên kết phiên bản với giá trị thuộc tính cụ thể
        Schema::create('product_variant_attributes', function (Blueprint $table) {
            $table->id(); // id tự tăng, khóa chính
            $table->foreignId('product_variant_id')->constrained('product_variants')->onDelete('cascade');
            // liên kết với phiên bản sản phẩm
            $table->foreignId('attribute_id')->constrained('attributes')->onDelete('cascade');
            // liên kết với nhóm thuộc tính (ví dụ: Màu sắc)
            $table->foreignId('attribute_value_id')->constrained('attribute_values')->onDelete('cascade');
            // liên kết với giá trị thuộc tính (ví dụ: Trắng)
            $table->timestamps(); // created_at và updated_at
            // đảm bảo mỗi phiên bản chỉ có 1 giá trị thuộc tính cho mỗi thuộc tính
            $table->unique(['product_variant_id', 'attribute_id'], 'variant_attribute_unique');
        });
    }

    public function down()
    {
        // Xóa các bảng theo thứ tự ngược lại để tránh lỗi ràng buộc khóa ngoại
        Schema::dropIfExists('product_variant_attributes');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('attribute_values');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('images');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
    }
}
