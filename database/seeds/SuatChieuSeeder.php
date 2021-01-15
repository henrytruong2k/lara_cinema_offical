<?php

use Illuminate\Database\Seeder;

class SuatChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suat_chieus')->insert([
            ['phim_id' => '1','giochieu_id'=>1,'phong_id'=>1,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '1','giochieu_id'=>2,'phong_id'=>2,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '2','giochieu_id'=>1,'phong_id'=>3,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '2','giochieu_id'=>2,'phong_id'=>4,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '3','giochieu_id'=>3,'phong_id'=>5,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '3','giochieu_id'=>3,'phong_id'=>6,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '4','giochieu_id'=>1,'phong_id'=>7,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
            ['phim_id' => '4','giochieu_id'=>3,'phong_id'=>8,'GiaSuatChieu'=>10000,'NgayChieu'=>'2020-01-16'],
           
        ]);
    }
}
