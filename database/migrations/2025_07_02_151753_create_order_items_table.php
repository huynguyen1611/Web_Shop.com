<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id')->nullable();  // Sản phẩm gốc
            $table->unsignedBigInteger('variant_id')->nullable();  // Biến thể sản phẩm
            $table->string('title');       // Tên sản phẩm lúc mua
            $table->string('image')->nullable(); // Ảnh sản phẩm tại thời điểm mua
            $table->integer('price');      // Giá từng sản phẩm
            $table->integer('qty');        // Số lượng
            $table->integer('total');      // Tổng tiền dòng này = qty * price
            $table->timestamps();

            // Khóa ngoại
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
