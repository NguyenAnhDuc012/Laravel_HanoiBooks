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
        Schema::create('don_hang', function (Blueprint $table) {
            $table->id('MaDonHang');
            $table->unsignedBigInteger('MaNguoiDung');
            $table->decimal('TongTien', 10, 2);
            $table->string('TrangThai');
            $table->timestamps();

            $table->foreign('MaNguoiDung')->references('MaNguoiDung')->on('nguoi_dung')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hang');
    }
};
