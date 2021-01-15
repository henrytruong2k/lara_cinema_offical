<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhimDienVienController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('manage.home');
})->middleware('login');

Route::get('/home', function () {
    return view('manage.home');
})->middleware('login');

Route::get('/login', function () {
    return view('manage.login');
});
Route::post('login','BackController@Login_post');
Route::post('logout','BackController@Logout_post');
Route::get('/register', function () {
    return view('manage.register');
});

Route::post('/register', 'Admin\AccountController@register')->middleware('login');

Route::get('/table', function () {
    return view('manage.table');
})->middleware('login');

Route::resource('employees', 'Admin\NhanVienController')->middleware('login');

Route::resource('positions', 'Admin\ChucVuController')->middleware('login');

Route::resource('customers', 'Admin\KhachHangController')->middleware('login');


Route::group(['prefix' => 'SuatChieu'], function() {
    Route::get('/index','SuatChieuController@index')->name('SuatChieu.index');
    Route::get('/create','SuatChieuController@create');
    Route::post('/create','SuatChieuController@store')->name('SuatChieu.add');
    Route::get('/edit/{id}','SuatChieuController@edit');
    Route::get('/get','SuatChieuController@get');
    Route::post('/update/{id}','SuatChieuController@update');
    Route::post('/getPhong','SuatChieuController@getPhong')->name('SuatChieu.getPhong');
    Route::get('/delete/{id}','SuatChieuController@destroy');
});

Route::group(['prefix' => 'Phim_DienVien','middleware'=>'login'], function() {
    Route::get('/index','Phim_DienVienController@index')->name('Phim_DienVien.index');
    Route::get('/create','Phim_DienVienController@create');
    Route::post('/create','Phim_DienVienController@store')->name('Phim_DienVien.add');
    Route::get('/edit/{id}','Phim_DienVienController@edit');
    Route::post('/update/{id}','Phim_DienVienController@update');
    Route::get('/delete/{id}','Phim_DienVienController@destroy');
});

Route::group(['prefix' => 'Phim','middleware'=>'login'], function() {
    Route::get('/index','PhimController@index');
    Route::get('/create','PhimController@create');
    Route::get('/get','PhimController@get');
    Route::post('/create','PhimController@store')->name('Phim.add');
    Route::get('/details/{id}','PhimController@show');
    Route::post('/create/add_theloai/{id}','PhimController@add_theloai');
    Route::get('/edit/{id}','PhimController@edit');
    Route::post('/update/{id}','PhimController@update');
    Route::get('/delete/{id}','PhimController@destroy');
});

Route::group(['prefix' => 'LoaiPhim','middleware'=>'login'], function() {
    Route::get('/index','LoaiPhimController@index')->name('LoaiPhim.index');
    Route::get('/create','LoaiPhimController@create');
    Route::get('/get','LoaiPhimController@get');
    Route::post('/create','LoaiPhimController@store')->name('LoaiPhim.add');
    Route::get('/edit/{id}','LoaiPhimController@edit');
    Route::post('/update/{id}','LoaiPhimController@update');
    Route::get('/delete/{id}','LoaiPhimController@destroy');
});

Route::group(['prefix' => 'GioChieu','middleware'=>'login'], function() {
    Route::get('/index','GioChieuController@index')->name('GioChieu.index');
    Route::get('/create','GioChieuController@create');
    Route::post('/create','GioChieuController@store')->name('GioChieu.add');
    Route::get('/edit/{id}','GioChieuController@edit');
    Route::get('/get','GioChieuController@get');
    Route::get('/getId/{id}','GioChieuController@getId');
    Route::get('/getGioChieuID/{id}','GioChieuController@getGioChieuID');
    Route::get('/getGioChieu','GioChieuController@getGioChieu');
    Route::post('/update/{id}','GioChieuController@update');
    Route::get('/delete/{id}','GioChieuController@destroy');
});



Route::group(['prefix' => 'LoaiTGChieu','middleware'=>'login'], function() {
    Route::get('/index','LoaiTGChieuController@index')->name('LoaiTGChieu.index');
    Route::get('/create','LoaiTGChieuController@create');
    Route::post('/create','LoaiTGChieuController@store')->name('LoaiTGChieu.add');
    Route::get('/edit/{id}','LoaiTGChieuController@edit');
    Route::post('/update/{id}','LoaiTGChieuController@update');
    Route::get('/delete/{id}','LoaiTGChieuController@destroy');
});

Route::group(['prefix' => 'DienVien','middleware'=>'login'], function() {
    Route::get('/index','DienVienController@index');
    Route::get('/create','DienVienController@create');
    Route::post('/create','DienVienController@store');
    Route::get('/edit/{id}','DienVienController@edit');
    Route::post('/update/{id}','DienVienController@update');
    Route::get('/delete/{id}','DienVienController@destroy');
});




//ghe
// Route::group(['prefix' => 'ghe'], function() {
//     Route::get('/','GheController@index');
//     Route::get('/index','GheController@index');
//     Route::get('/create','GheController@create');
//     Route::post('/create','GheController@store');
//     Route::get('/details/{id}','GheController@show');
//     Route::get('/edit/{id}','GheController@edit');
//     Route::post('/update/{id}','GheController@update');
//     Route::get('/delete/{id}','GheController@destroy');
//     Route::get('/inactive/{id}','GheController@inactive');
//     Route::get('/active/{id}','GheController@active');

// });
Route::group(['prefix' => 'ghe'], function() {
    Route::get('/', 'GheController@index');
    Route::get('/index','GheController@index')->name('Ghe.index');
    Route::get('/create','GheController@create');
    Route::post('/create','GheController@store')->name('Ghe.add');
    Route::get('/edit/{id}','GheController@edit');
    Route::get('/get','GheController@get');
    Route::get('/getDay','GheController@getDay');
    Route::get('/getSort','GheController@getSort');
    Route::post('/update/{id}','GheController@update');
    Route::get('/delete/{id}','GheController@destroy');
});



//phong
// Route::group(['prefix' => 'phong'], function() {
//     Route::get('/','PhongController@index');
//     Route::get('/index','PhongController@index');
//     Route::get('/create','PhongController@create');
//     Route::post('/create','PhongController@store');
//     Route::get('/details/{id}','PhongController@show');
//     Route::get('/edit/{id}','PhongController@edit');
//     Route::post('/update/{id}','PhongController@update');
//     Route::get('/delete/{id}','PhongController@destroy');
//     Route::get('/inactive/{id}','PhongController@inactive');
//     Route::get('/active/{id}','PhongController@active');

// });


Route::group(['prefix' => 'phong'], function() {
    Route::get('/', 'PhongController@index');
    Route::get('/index','PhongController@index')->name('Phong.index');
    Route::get('/create','PhongController@create');
    Route::post('/create','PhongController@store')->name('Phong.add');
    Route::get('/edit/{id}','PhongController@edit');
    Route::get('/get','PhongController@get');
    Route::post('/update/{id}','PhongController@update');
    Route::get('/delete/{id}','PhongController@destroy');
});
//rap
// Route::group(['prefix' => 'rap'], function() {
//     Route::get('/','RapController@index');
//     Route::get('/index','RapController@index');
//     Route::get('/create','RapController@create');  
//     Route::get('/get','RapController@get');  
//     Route::get('/getId/{id}','RapController@getId');  
//     Route::get('/create','RapController@create');
//     Route::post('/create','RapController@store');
//     Route::get('/details/{id}','RapController@show');
//     Route::get('/edit/{id}','RapController@edit');
//     Route::post('/update/{id}','RapController@update');
//     Route::get('/delete/{id}','RapController@destroy');
//     Route::get('/inactive/{id}','RapController@inactive');
//     Route::get('/active/{id}','RapController@active');
// });

Route::group(['prefix' => 'rap'], function() {
    Route::get('/', 'RapController@index');
    Route::get('/index','RapController@index')->name('Rap.index');
    Route::get('/getId/{id}','RapController@getId');
    Route::get('/get','RapController@get');
    Route::get('/create','RapController@create');
    Route::post('/create','RapController@store')->name('Rap.add');
    Route::get('/edit/{id}','RapController@edit');
    Route::post('/update/{id}','RapController@update');
    Route::get('/delete/{id}','RapController@destroy');
});

