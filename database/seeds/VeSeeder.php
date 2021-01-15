<?php

use Illuminate\Database\Seeder;

class VeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ves')->insert([
            ['GiaVe' => 10000, 'suatchieu_id' => 1,'ghe_id'=>1,'kh_id'=>1,'TrangThai'=>1],
        
           
        ]);
    }
}
