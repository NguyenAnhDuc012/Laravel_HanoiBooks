<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TheLoaiSeeder extends Seeder
{

    public function run(): void
    {
        $theLoais = [
            ['TenTheLoai' => 'Kinh Tế', 'created_at' => now(), 'updated_at' => now()],
            ['TenTheLoai' => 'Lịch Sử', 'created_at' => now(), 'updated_at' => now()],
            ['TenTheLoai' => 'Khoa Học', 'created_at' => now(), 'updated_at' => now()],
            ['TenTheLoai' => 'Văn Học', 'created_at' => now(), 'updated_at' => now()],
            ['TenTheLoai' => 'Tâm Lý', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('the_loai')->insert($theLoais);
    }
}
