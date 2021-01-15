<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chuc_vus')->insert([
            ['TenCV'=>'Quản lí','TrangThai'=>1],
            ['TenCV'=>'Nhân viên bán vé','TrangThai'=>1],
            ['TenCV'=>'Nhân viên bán đồ ăn','TrangThai'=>1],
            ['TenCV'=>'Nhân viên vệ sinh','TrangThai'=>1],
            ['TenCV'=>'Nhân viên phòng chiếu','TrangThai'=>1],

        ]);
    }
}
