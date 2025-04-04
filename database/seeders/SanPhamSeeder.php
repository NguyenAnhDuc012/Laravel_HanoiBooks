<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SanPhamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sanPhams = [
            [
                'MaTheLoai' => 1,
                'MaTacGia' => 1,
                'MaNhaXuatBan' => 1,
                'TenSanPham' => 'Sách Kinh Tế 1',
                'GiaBan' => 200000,
                'TonKho' => 50,
                'MoTa' => 'Sách về Kinh tế',
                'NgayXuatBan' => '2023-01-01',
                'HinhAnh' => '01.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'MaTheLoai' => 2,
                'MaTacGia' => 2,
                'MaNhaXuatBan' => 2,
                'TenSanPham' => 'Sách Lịch Sử 1',
                'GiaBan' => 150000,
                'TonKho' => 30,
                'MoTa' => 'Sách về Lịch sử',
                'NgayXuatBan' => '2022-05-15',
                'HinhAnh' => '02.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            // Các sản phẩm khác...
        ];

        DB::table('san_pham')->insert($sanPhams);
    }
}
