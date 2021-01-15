<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('khach_hangs')->insert([
            ['HoTen' => 'Huỳnh Văn Bình',
            'password'=>Hash::make('914614144'),
             'DiaChi'=>'Tây Ninh city',
             'SDT'=>'0914614143',
             'NgaySinh'=>'2000-12-01',
             'Email'=>'vanbinh@gmail.com',
             'TrangThai'=>1,
            ],

            ['HoTen' => 'Nguyễn Trọng Cần',
            'password'=>Hash::make('386688890'),
             'DiaChi'=>'Tây Ninh city',
             'SDT'=>'0386688890',
             'NgaySinh'=>'2000-12-01',
             'Email'=>'trongcan@gmail.com',
             'TrangThai'=>1,
            ],

            ['HoTen' => 'Nguyễn Hồng Trọng',
            'password'=>Hash::make('491712585'),
             'DiaChi'=>'Tây Ninh city',
             'SDT'=>'0491712585',
             'NgaySinh'=>'2000-12-01',
             'Email'=>'hongtrong@gmail.com',
             'TrangThai'=>1,
            ],
            ['HoTen' => 'Nguyễn Minh Anh',
                'password'=>Hash::make('rose'),
                'DiaChi'=>'Ho Chi Minh city',
                'SDT'=>'0123456789',
                'NgaySinh'=>'2000-10-04',
                'Email'=>'minhanh@gmail.com',
                'TrangThai'=>1,
            ],
       ]);
    }
}
