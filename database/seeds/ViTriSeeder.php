<?php

use Illuminate\Database\Seeder;

class ViTriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vitris')->insert([
            ['Hang' => 1, 'Cot' => 1, 'ghe_id' => 1],
            ['Hang' => 1, 'Cot' => 2, 'ghe_id' => 2],
            ['Hang' => 1, 'Cot' => 3, 'ghe_id' => 3],
            ['Hang' => 1, 'Cot' => 4, 'ghe_id' => 4],
        ]);
    }
}
