<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Phim_GetFive', 'Api\PhimController@getFiveFilm');
Route::apiResource('/Phim', 'Api\PhimController');
Route::apiResource('/LoaiPhim', 'Api\LoaiPhimController');

//Route::apiResource('/GioiHanTuoi', 'Api\GioiHanTuoiController');
Route::apiResource('KhachHang','Api\KhachHangController');
Route::post('/KhachHang_Login','Api\KhachHangController@Login');
Route::apiResource('/DienVien', 'Api\DienVienController');

Route::apiResource('/GioChieu', 'Api\GioChieuApi');
Route::apiResource('/SuatChieu', 'Api\SuatChieuController');
Route::post('/SuatChieu/getGioChieu','Api\SuatChieuController@getGioChieu');

//Đánh giá
Route::apiResource('/DanhGia', 'Api\DanhGiaController');
Route::post('/DanhGia/create','Api\DanhGiaController@store');
Route::get('/DanhGia/delete/{id}','Api\DanhGiaController@destroy');
Route::get('/DanhGia/phim/{id}','Api\DanhGiaController@avgPhim');


//Bình luận
Route::apiResource('/BinhLuan', 'Api\BinhLuanController');
Route::post('/BinhLuan/create','Api\BinhLuanController@store');
Route::get('/BinhLuan/delete/{id}','Api\BinhLuanController@destroy');

Route::get('/BinhLuan/get/{id}','Api\BinhLuanController@get');
Route::get('/BinhLuan/getFive/{id}','Api\BinhLuanController@getFive');


//vé
Route::apiResource('/Ve', 'Api\VeController');

//api rạp, phòng, ghế
Route::apiResource('/Ghe', 'Api\GheController');
Route::apiResource('/Phong', 'Api\PhongController');
Route::apiResource('/Rap', 'Api\RapController');

Route::apiResource('NhanVien','Api\NhanVienController');
Route::apiResource('/Tinh','Api\TinhController');

// dang ky khach hàng
Route::post("/KhachHang_Dk",'Api\KhachHangController@KhachHang_Regis');

Route::get("/Ve_LichSu/{id_kh}","Api\VeController@GetLichSu");


