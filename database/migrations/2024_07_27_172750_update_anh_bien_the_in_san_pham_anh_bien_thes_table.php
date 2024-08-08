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
            //
            $table->string('anh_bien_the')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('san_pham_anh_bien_thes', function (Blueprint $table) {
            //
            $table->string('anh_bien_the')->nullable();
            
        });
    }
};
