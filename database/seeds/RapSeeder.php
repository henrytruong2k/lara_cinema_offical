<?php

use Illuminate\Database\Seeder;

class RapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('raps')->insert([
            ['TenRap' => 'CGV Lý Chính Thắng', 'DiaChi' => 'Lý Chính Thắng TP HCM', 'SDT' => '11111', 'TrangThai' => 1],
            ['TenRap' => 'CGV Nam Kỳ Khởi Nghĩa', 'DiaChi' => 'Nam Kỳ Khởi Nghĩa, TP HCM', 'SDT' => '22222', 'TrangThai' => 1],
            ['TenRap' => 'CGV Huỳnh Thúc Kháng', 'DiaChi' => 'Huỳnh Thúc Kháng, TP HCM', 'SDT' => '33333', 'TrangThai' => 1],
            ['TenRap' => 'CGV Hàm Nghi', 'DiaChi' => 'Hàm Nghi, TP HCM', 'SDT' => '444444', 'TrangThai' => 1],
           
        ]);
    }
}
