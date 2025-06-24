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
        Schema::table('products', function (Blueprint $table) {
            // Đổi cột price và sale_price thành unsignedBigInteger
            $table->unsignedBigInteger('price')->change();
            $table->unsignedBigInteger('sale_price')->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Trả về decimal (nếu rollback)
            $table->decimal('price', 15, 2)->change();
            $table->decimal('sale_price', 15, 2)->change();
        });
    }
};
