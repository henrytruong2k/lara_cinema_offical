<?php

use Illuminate\Database\Seeder;

class LoaiPhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('loai_phims')->insert([
            ['TenLoaiPhim' => 'Hành động','TrangThai'=>1],
            ['TenLoaiPhim' => 'Tình cảm','TrangThai'=>1],
            ['TenLoaiPhim' => 'Kinh dị','TrangThai'=>1],
            ['TenLoaiPhim' => 'Viễn tưởng','TrangThai'=>1],
        ]);
    }
}
