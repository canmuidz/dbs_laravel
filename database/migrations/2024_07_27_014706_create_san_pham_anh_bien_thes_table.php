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
        Schema::create('san_pham_anh_bien_thes', function (Blueprint $table) {
            $table->id();
            $table->text('anh_1_bien_the')->nullable();
            $table->text('anh_2_bien_the')->nullable();
            $table->text('anh_3_bien_the')->nullable();
            $table->unsignedBigInteger('san_pham_id');
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham_anh_bien_thes');
    }
};
