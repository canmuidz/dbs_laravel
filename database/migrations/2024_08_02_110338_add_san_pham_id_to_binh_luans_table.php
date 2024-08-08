<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSanPhamIdToBinhLuansTable extends Migration
{
    public function up()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->unsignedBigInteger('san_pham_id')->nullable(); // Thêm cột san_pham_id
            $table->foreign('san_pham_id')->references('id')->on('san_phams')->onDelete('cascade'); // Thêm ràng buộc khóa ngoại
        });
    }

    public function down()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->dropForeign(['san_pham_id']); // Xóa ràng buộc khóa ngoại
            $table->dropColumn('san_pham_id'); // Xóa cột san_pham_id
        });
    }
}

