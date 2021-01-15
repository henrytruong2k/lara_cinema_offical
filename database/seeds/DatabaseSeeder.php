<?php

use App\Rap;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([



  
            // seed rạp, phòng, ghế
            RapSeeder::class,
            PhongSeeder::class,
            GheSeeder::class,

            KhachHangSeeder::class,
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            
            LoaiPhimSeeder::class,
            PhimSeeder::class,
            DienVienSeeder::class,
            Phim_DienVienSeeder::class,
           
            LoaiTGChieuSeeder::class,
            GioChieuSeeder::class,
            SuatChieuSeeder::class,

            VeSeeder::class,

            TinhSeeder::class,
            
        ]);
    }
}
