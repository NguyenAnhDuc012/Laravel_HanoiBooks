<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TacGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tacGias = [
            ['TenTacGia' => 'Nguyễn Nhật Ánh', 'NgaySinh' => '1955-10-07', 'NgayMat' => null, 'created_at' => now(), 'updated_at' => now()],
            ['TenTacGia' => 'J.K. Rowling', 'NgaySinh' => '1965-07-31', 'NgayMat' => null, 'created_at' => now(), 'updated_at' => now()],
            ['TenTacGia' => 'Albert Einstein', 'NgaySinh' => '1879-03-14', 'NgayMat' => '1955-04-18', 'created_at' => now(), 'updated_at' => now()],
            ['TenTacGia' => 'Vũ Trọng Phụng', 'NgaySinh' => '1912-10-20', 'NgayMat' => '1963-05-01', 'created_at' => now(), 'updated_at' => now()],
            ['TenTacGia' => 'Haruki Murakami', 'NgaySinh' => '1949-01-12', 'NgayMat' => null, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('tac_gia')->insert($tacGias);
    }
}
