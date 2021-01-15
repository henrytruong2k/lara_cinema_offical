<?php

use Illuminate\Database\Seeder;

class PhimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phims')->insert([

            ['TenPhim' => 'John Wick 1','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_tiger.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Trọng','loaiphim_id'=>1,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Train to busan 2','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_macay.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Trung','loaiphim_id'=>2,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Ma cây 3','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_macarong.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Quốc','loaiphim_id'=>3,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Ma cà rồng 5','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_masoi.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Minh Anh','loaiphim_id'=>1,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>20000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Đại bàng mèo 6','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_giaicuubinhnhiryan.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Anh','loaiphim_id'=>2,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Cuộc chiến chim cánh cụt 7','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_tiger.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Hải','loaiphim_id'=>3,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>30000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Tom and Jerry 8','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_masoi.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Huy','loaiphim_id'=>1,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>40000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Gà đại ka 9','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_macay.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Đức','loaiphim_id'=>2,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>50000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Thần điêu đại hiệp 10','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_spiderman.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Khải','loaiphim_id'=>3,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Cuộc chiến những vì sao 11','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_johnwick.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Vinh','loaiphim_id'=>1,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Thiên sứ mặt trăng 12','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_tiger.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Nguyên','loaiphim_id'=>2,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Gà trống nuôi con','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_giaicuubinhnhiryan.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Phúc','loaiphim_id'=>3,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Chuyến tàu sinh tử','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_masoi.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Trà','loaiphim_id'=>1,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Ma sói','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_macarong.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Anh','loaiphim_id'=>2,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh', 'TrangThai' => 1],
            ['TenPhim' => 'Spider man','NgayDKChieu'=>'2020-01-16','NgayKetThuc'=>'2020-01-16','ThoiLuong'=>120,'HinhAnh'=>'phim_macay.jpg','Trailer'=>'https://www.youtube.com/watch?v=dradHKlm5Ws&list=RDdradHKlm5Ws&start_radio=1','DaoDien'=>'Nguyễn Quốc Trọng','loaiphim_id'=>3,'QuocGia'=>'Mỹ','GioiHanTuoi'=>'18+','GiaPhim'=>10000,'MoTa'=>'Đây là bộ phim tình cảm cực mạnh','TrangThai' => 1],
        ]);
    }
}
