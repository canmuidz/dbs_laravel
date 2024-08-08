<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropBaiVietIdFromBinhLuansTable extends Migration
{
    public function up()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->dropForeign(['bai_viet_id']); // Xóa ràng buộc khóa ngoại nếu có
            $table->dropColumn('bai_viet_id'); // Xóa cột bai_viet_id
        });
    }

    public function down()
    {
        Schema::table('binh_luans', function (Blueprint $table) {
            $table->unsignedBigInteger('bai_viet_id'); // Thêm lại cột bai_viet_id
            $table->foreign('bai_viet_id')->references('id')->on('bai_viets')->onDelete('cascade'); // Thêm lại ràng buộc khóa ngoại
        });
    }
}
