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
        Schema::create('nha_xuat_ban', function (Blueprint $table) {
            $table->id('MaNhaXuatBan');
            $table->string('TenNhaXuatBan');
            $table->string('DiaChi');
            $table->string('SoDienThoai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_xuat_ban');
    }
};
