<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhaXuatBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nhaXuatBans = [
            ['TenNhaXuatBan' => 'Nhà Xuất Bản Trẻ', 'DiaChi' => '123 đường ABC, TP.HCM', 'SoDienThoai' => '0987654321', 'created_at' => now(), 'updated_at' => now()],
            ['TenNhaXuatBan' => 'Nhà Xuất Bản Kim Đồng', 'DiaChi' => '456 đường DEF, Hà Nội', 'SoDienThoai' => '0912345678', 'created_at' => now(), 'updated_at' => now()],
            ['TenNhaXuatBan' => 'Nhà Xuất Bản Phụ Nữ', 'DiaChi' => '789 đường GHI, Đà Nẵng', 'SoDienThoai' => '0922334455', 'created_at' => now(), 'updated_at' => now()],
            ['TenNhaXuatBan' => 'Nhà Xuất Bản Hồng Đức', 'DiaChi' => '101 đường JKL, TP.HCM', 'SoDienThoai' => '0933445566', 'created_at' => now(), 'updated_at' => now()],
            ['TenNhaXuatBan' => 'Nhà Xuất Bản Thế Giới', 'DiaChi' => '202 đường MNO, Hà Nội', 'SoDienThoai' => '0944556677', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('nha_xuat_ban')->insert($nhaXuatBans);
    }
}
