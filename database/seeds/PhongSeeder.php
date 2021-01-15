<?php

use Illuminate\Database\Seeder;

class PhongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phongs')->insert([
            ['TenPhong' => 'Phòng chiếu 1', 'rap_id' => 1, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 2', 'rap_id' => 1, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 1', 'rap_id' => 2, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 2', 'rap_id' => 2, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 1', 'rap_id' => 3, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 2', 'rap_id' => 3, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 1', 'rap_id' => 4, 'TrangThai' => 1],
            ['TenPhong' => 'Phòng chiếu 2', 'rap_id' => 4, 'TrangThai' => 1],
           
        ]);
    }
}
