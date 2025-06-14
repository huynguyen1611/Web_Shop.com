<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Bỏ default rỗng nếu không cần thiết
            $table->tinyInteger('evaluate')->nullable(); // Số sao đánh giá: 1-5
            $table->string('status')->nullable(); // VD: "Còn hàng", "Hết hàng"
            $table->string('price_sale')->nullable(); // Giá sau khuyến mãi
            $table->string('price_nomal')->nullable(); // Giá gốc
            $table->string('sale')->nullable(); // % giảm giá (VD: -7%)
            $table->string('price_save')->nullable(); // Số tiền tiết kiệm
            $table->json('color')->nullable(); // Mảng màu sắc
            $table->json('capacity')->nullable(); // Mảng dung lượng (256GB, 512GB...)
            $table->longText('describe')->nullable(); // Mô tả sản phẩm
            $table->json('images')->nullable(); // Mảng ảnh nếu nhiều ảnh sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
