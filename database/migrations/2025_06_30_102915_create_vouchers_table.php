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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Mã voucher
            $table->string('name');           // Tên sự kiện giảm giá (VD: Noel 24/12)
            $table->enum('type', ['percent', 'fixed']); // Kiểu giảm: % hay số tiền
            $table->unsignedInteger('value'); // Giá trị giảm (VD: 50 hoặc 50000)
            $table->unsignedInteger('max_discount')->nullable(); // Giảm tối đa (chỉ dùng khi giảm theo %)
            $table->unsignedInteger('quantity')->default(0);     // Số lượng còn lại
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->timestamps();
            // $table->boolean('status')->default(true); // true = còn hoạt động, false = bị tắt
            //status chưa thêm vào
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
