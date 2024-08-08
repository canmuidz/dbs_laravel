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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->text('anh_san_pham')->nullable();
            $table->string('tieu_de_san_pham', 255);
            $table->text('mo_ta_san_pham');
            $table->unsignedInteger('so_luong_phong');
            $table->double('gia');
            $table->double('dien_tich');
            $table->string('dia_chi', 255);
            $table->unsignedBigInteger('danh_muc_id');
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
