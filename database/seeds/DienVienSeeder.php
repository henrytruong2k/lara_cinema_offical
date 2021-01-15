<?php

use Illuminate\Database\Seeder;

class DienVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dien_viens')->insert([
            ['TenDienVien' => 'Dien vien 1', 'TrangThai' => 1],
            ['TenDienVien' => 'Dien vien 2', 'TrangThai' => 1],
            ['TenDienVien' => 'Dien vien 3', 'TrangThai' => 1],
            ['TenDienVien' => 'Dien vien 4', 'TrangThai' => 1],
            ['TenDienVien' => 'Dien vien 5', 'TrangThai' => 1],
        ]);
    }
}
