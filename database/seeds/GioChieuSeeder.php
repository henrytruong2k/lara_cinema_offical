<?php

use Illuminate\Database\Seeder;

class GioChieuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('gio_chieus')->insert([
            ['loaitgchieu_id' => '1','GioBatDau'=>'7:00:00','TrangThai'=>1],
            ['loaitgchieu_id' => '2','GioBatDau'=>'12:00:00','TrangThai'=>1],
            ['loaitgchieu_id' => '3','GioBatDau'=>'5:00:00','TrangThai'=>1],
            ['loaitgchieu_id' => '4','GioBatDau'=>'7:00:00','TrangThai'=>1],        
        ]);
    }
}
