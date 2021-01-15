<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nhan_viens')->insert([
             ['HoTen' => 'Tô Minh Hải',
             'Anh'=>'minhhai.jpg',
             'ChucVu_ID'=>1,
             'TenTK'=>'minhhaizzz98',
             'password'=>Hash::make('minhhai'),
              'NgSinh'=>'2000-12-01',
              'DiaChi'=>'Củ Chi city',
              'SDT'=>'0123456721',
              'Email'=>'minhhai@gmail.com',
              'status'=>1,
             ],

             ['HoTen' => 'Nguyễn Minh Anh',
             'Anh'=>'minhanh.jpg',
             'ChucVu_ID'=>2,
             'TenTK'=>'minhanh',
             'password'=>Hash::make('minhanh'),
              'NgSinh'=>'2000-10-04',
              'DiaChi'=>'quận 12',
              'SDT'=>'0123456788',
              'Email'=>'minhanh@gmail.com',
              'status'=>1,
             ],

             ['HoTen' => 'Nguyễn Quốc Trọng',
             'Anh'=>'quoctrong.jpg',
             'ChucVu_ID'=>2,
             'TenTK'=>'quoctrong',
             'password'=>Hash::make('quoctrong'),
              'NgSinh'=>'2000-06-01',
              'DiaChi'=>'quận 8',
              'SDT'=>'0123456787',
              'Email'=>'quoctrong@gmail.com',
              'status'=>1,
             ],

             ['HoTen' => 'Trương Quang Huy',
             'Anh'=>'quanghuy.jpg',
             'ChucVu_ID'=>3,
             'TenTK'=>'quanghuy',
             'password'=>Hash::make('quanghuy'),
              'NgSinh'=>'2000-12-27',
              'DiaChi'=>'Tân Phú',
              'SDT'=>'0123456555',
              'Email'=>'quanghuy@gmail.com',
              'status'=>1,
             ],

             ['HoTen' => 'Lương Cao Chấn Huy',
             'Anh'=>'chanhuy.jpg',
             'ChucVu_ID'=>1,
             'TenTK'=>'chanhuy',
             'password'=>Hash::make('chanhuy'),
              'NgSinh'=>'2000-12-05',
              'DiaChi'=>'quận 5',
              'SDT'=>'0123456779',
              'Email'=>'chanhuy@gmail.com',
              'status'=>1,
             ],

             ['HoTen' => 'Bùi Đình Đức',
             'Anh'=>'dinhduc.png',
             'ChucVu_ID'=>1,
             'TenTK'=>'dinhduc',
             'password'=>Hash::make('dinhduc'),
              'NgSinh'=>'2000-02-21',
              'DiaChi'=>'Quận 12',
              'SDT'=>'0243342422',
              'Email'=>'dinhduc@gmail.com',
              'status'=>1,
             ],

        ]);
    }

}
