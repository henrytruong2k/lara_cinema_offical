<?php

use Illuminate\Database\Seeder;

class Phim_DienVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phim_dienvien')->insert([
            ['phim_id' => 1, 'dienvien_id' => '1'],
            ['phim_id' => 1, 'dienvien_id' => '3'],
            ['phim_id' => 1, 'dienvien_id' => '4'],

            ['phim_id' => 2, 'dienvien_id' => '2'],
            ['phim_id' => 2, 'dienvien_id' => '3'],
            ['phim_id' => 2, 'dienvien_id' => '5'],

            ['phim_id' => 3, 'dienvien_id' => '2'],
            ['phim_id' => 3, 'dienvien_id' => '3'],
            ['phim_id' => 3, 'dienvien_id' => '5'],

            ['phim_id' => 4, 'dienvien_id' => '2'],
            ['phim_id' => 4, 'dienvien_id' => '3'],
            ['phim_id' => 4, 'dienvien_id' => '5'],

            ['phim_id' => 5, 'dienvien_id' => '2'],
            ['phim_id' => 5, 'dienvien_id' => '3'],
            ['phim_id' => 5, 'dienvien_id' => '5'],

            ['phim_id' => 6, 'dienvien_id' => '2'],
            ['phim_id' => 6, 'dienvien_id' => '3'],
            ['phim_id' => 6, 'dienvien_id' => '5'],

            ['phim_id' => 7, 'dienvien_id' => '2'],
            ['phim_id' => 7, 'dienvien_id' => '3'],
            ['phim_id' => 7, 'dienvien_id' => '5'],

            ['phim_id' => 8, 'dienvien_id' => '2'],
            ['phim_id' => 8, 'dienvien_id' => '3'],
            ['phim_id' => 8, 'dienvien_id' => '5'],

            ['phim_id' => 9, 'dienvien_id' => '2'],
            ['phim_id' => 9, 'dienvien_id' => '3'],
            ['phim_id' => 9, 'dienvien_id' => '5'],

            ['phim_id' => 10, 'dienvien_id' => '2'],
            ['phim_id' => 10, 'dienvien_id' => '3'],
            ['phim_id' => 10, 'dienvien_id' => '5'],

            ['phim_id' => 11, 'dienvien_id' => '2'],
            ['phim_id' => 11, 'dienvien_id' => '3'],
            ['phim_id' => 11, 'dienvien_id' => '5'],

            ['phim_id' => 12, 'dienvien_id' => '2'],
            ['phim_id' => 12, 'dienvien_id' => '3'],
            ['phim_id' => 12, 'dienvien_id' => '5'],

            ['phim_id' => 13, 'dienvien_id' => '2'],
            ['phim_id' => 13, 'dienvien_id' => '3'],
            ['phim_id' => 13, 'dienvien_id' => '5'],

            ['phim_id' => 14, 'dienvien_id' => '2'],
            ['phim_id' => 14, 'dienvien_id' => '3'],
            ['phim_id' => 14, 'dienvien_id' => '5'],

            ['phim_id' => 15, 'dienvien_id' => '2'],
            ['phim_id' => 15, 'dienvien_id' => '3'],
            ['phim_id' => 15, 'dienvien_id' => '5'],

        ]); 
    }
}
