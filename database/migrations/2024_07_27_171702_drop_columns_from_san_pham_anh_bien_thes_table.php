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
        Schema::table('san_pham_anh_bien_thes', function (Blueprint $table) {
            // Xóa các cột
            $table->dropColumn(['anh_1_bien_the', 'anh_2_bien_the', 'anh_3_bien_the']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham_anh_bien_thes', function (Blueprint $table) {
            // Thêm lại các cột nếu cần rollback
            $table->string('anh_1_bien_the')->nullable();
            $table->string('anh_2_bien_the')->nullable();
            $table->string('anh_3_bien_the')->nullable();
        });
    }
};
