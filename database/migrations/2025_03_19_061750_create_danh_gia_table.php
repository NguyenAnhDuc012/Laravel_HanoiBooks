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
        Schema::create('danh_gia', function (Blueprint $table) {
            $table->id('MaDanhGia');
            $table->unsignedBigInteger('MaNguoiDung');
            $table->unsignedBigInteger('MaSanPham');
            $table->integer('DanhGia');
            $table->text('NhanXet')->nullable();
            $table->date('NgayDanhGia');
            $table->timestamps();

            $table->foreign('MaNguoiDung')->references('MaNguoiDung')->on('nguoi_dung')->onDelete('cascade');
            $table->foreign('MaSanPham')->references('MaSanPham')->on('san_pham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gia');
    }
};
