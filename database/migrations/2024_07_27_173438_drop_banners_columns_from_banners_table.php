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
        Schema::table('banners', function (Blueprint $table) {
            // Xóa các cột banner_1, banner_2, banner_3
            $table->dropColumn(['banner_1', 'banner_2', 'banner_3']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            // Thêm lại các cột nếu cần rollback
            $table->string('banner_1')->nullable();
            $table->string('banner_2')->nullable();
            $table->string('banner_3')->nullable();
        });
    }
};
