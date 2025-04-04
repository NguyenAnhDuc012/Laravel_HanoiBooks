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
        Schema::create('san_pham', function (Blueprint $table) {
            $table->id('MaSanPham');
            $table->unsignedBigInteger('MaTheLoai');
            $table->unsignedBigInteger('MaTacGia');
            $table->unsignedBigInteger('MaNhaXuatBan');
            $table->string('TenSanPham');
            $table->decimal('GiaBan', 10, 2);
            $table->integer('TonKho');
            $table->text('MoTa')->nullable();
            $table->date('NgayXuatBan');
            $table->string('HinhAnh')->nullable();
            $table->timestamps();

            $table->foreign('MaTheLoai')->references('MaTheLoai')->on('the_loai')->onDelete('cascade');
            $table->foreign('MaTacGia')->references('MaTacGia')->on('tac_gia')->onDelete('cascade');
            $table->foreign('MaNhaXuatBan')->references('MaNhaXuatBan')->on('nha_xuat_ban')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_pham');
    }
};
