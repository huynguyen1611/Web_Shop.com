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
        Schema::table('vouchers', function (Blueprint $table) {
            $table->boolean('status')->default(true)->after('end_date'); // true = kích hoạt, false = tắt
        });
    }

    public function down()
    {
        Schema::table('vouchers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
