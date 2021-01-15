<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class TinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tinhs')->insert([
            ['Ten' => 'An Giang', 'Code' =>'805'],
            ['Ten' => 'Bà Rịa - Vũng Tầu', 'Code' =>'717'],
            ['Ten' => 'Bình Dương', 'Code' =>'711'],
            ['Ten' => 'Bình Phước', 'Code' =>'707'],
            ['Ten' => 'Bình Thuận', 'Code' =>'715'],
            ['Ten' => 'Bình Định', 'Code' =>'507'],
            ['Ten' => 'Bắc Giang', 'Code' =>'221'],
            ['Ten' => 'Bắc Kạn', 'Code' =>'207'],
            ['Ten' => 'Bắc Ninh', 'Code' =>'223'],
            ['Ten' => 'Bến Tre', 'Code' =>'811'],
            ['Ten' => 'Cao Bằng', 'Code' =>'203'],
            ['Ten' => 'Cà Mau', 'Code' =>'823'],
            ['Ten' => 'Cần Thơ', 'Code' =>'815'],
            ['Ten' => 'Gia Lai', 'Code' =>'603'],
            ['Ten' => 'Hà Giang', 'Code' =>'201'],
            ['Ten' => 'Hà Nam', 'Code' =>'111'],
            ['Ten' => 'Hà Nội', 'Code' =>'101'],
            ['Ten' => 'Hà Tây', 'Code' =>'105'],
            ['Ten' => 'Hà Tĩnh', 'Code' =>'405'],
            ['Ten' => 'Hòa Bình', 'Code' =>'305'],
            ['Ten' => 'Hưng Yên', 'Code' =>'109'],
            ['Ten' => 'Hải Dương', 'Code' =>'107'],
            ['Ten' => 'Hải Phòng', 'Code' =>'103'],
            ['Ten' => 'Hồ Chí Minh', 'Code' =>'701'],
            ['Ten' => 'Khánh Hòa', 'Code' =>'511'],
            ['Ten' => 'Kiên Giang', 'Code' =>'813'],
            ['Ten' => 'Kon Tum', 'Code' =>'601'],
            ['Ten' => 'Lai Châu', 'Code' =>'301'],
            ['Ten' => 'Long An', 'Code' =>'801'],
            ['Ten' => 'Lào Cai', 'Code' =>'205'],
            ['Ten' => 'Lâm Đồng', 'Code' =>'703'],
            ['Ten' => 'Lạng Sơn', 'Code' =>'209'],
            ['Ten' => 'Nam Định', 'Code' =>'113'],
            ['Ten' => 'Nghệ An', 'Code' =>'403'],
            ['Ten' => 'Ninh Bình', 'Code' =>'117'],
            ['Ten' => 'Ninh Thuận', 'Code' =>'705'],
            ['Ten' => 'Phú Thọ', 'Code' =>'217'],
            ['Ten' => 'Phú Yên', 'Code' =>'509'],
            ['Ten' => 'Quảng Bình', 'Code' =>'407'],
            ['Ten' => 'Quảng Nam', 'Code' =>'503'],
            ['Ten' => 'Quảng Ngãi', 'Code' =>'505'],
            ['Ten' => 'Quảng Ninh', 'Code' =>'225'],
            ['Ten' => 'Quảng Trị', 'Code' =>'409'],
            ['Ten' => 'Sơn La', 'Code' =>'303'],
            ['Ten' => 'Thanh Hóa', 'Code' =>'401'],
            ['Ten' => 'Thái Bình', 'Code' =>'115'],
            ['Ten' => 'Thái Nguyên', 'Code' =>'215'],
            ['Ten' => 'Thừa Thiên - Huế', 'Code' =>'411'],
            ['Ten' => 'Tiền Giang', 'Code' =>'807'],
            ['Ten' => 'Trà Vinh', 'Code' =>'817'],
            ['Ten' => 'Tuyên Quang', 'Code' =>'211'],
            ['Ten' => 'Tây Ninh', 'Code' =>'709'],
            ['Ten' => 'Vĩnh Long', 'Code' =>'809'],
            ['Ten' => 'Vĩnh Phúc', 'Code' =>'104'],
            ['Ten' => 'Yên Bái', 'Code' =>'213'],
            ['Ten' => 'Đà Nẵng', 'Code' =>'501'],
            ['Ten' => 'Đắk Lắk', 'Code' =>'605'],
            ['Ten' => 'Đồng Nai', 'Code' =>'713'],
            ['Ten' => 'Đồng Tháp', 'Code' =>'803'],
            ['Ten' => 'Bạc Liêu', 'Code' =>'821'],
            ['Ten' => 'Sóc Trăng', 'Code' =>'819'],
            ['Ten' => 'Hậu Giang', 'Code' =>'825'],
            ['Ten' => 'Đắk Nông', 'Code' =>'607']
       ]);
    }
}
