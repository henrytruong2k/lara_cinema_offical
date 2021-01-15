<?php

use Illuminate\Database\Seeder;

class LoaiTGChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('loai_tg_chieus')->insert([
            ['TenLoaiTGChieu' => 'Buổi sáng','Gia_TG'=>10000,'TrangThai'=>1],
            ['TenLoaiTGChieu' => 'Buổi trưa','Gia_TG'=>20000,'TrangThai'=>1],
            ['TenLoaiTGChieu' => 'Buổi chiều','Gia_TG'=>30000,'TrangThai'=>1],
            ['TenLoaiTGChieu' => 'Buổi tối','Gia_TG'=>40000,'TrangThai'=>1],
          
        ]);
    }
}
