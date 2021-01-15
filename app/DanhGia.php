<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    //
    public $timestamp = false;
    protected $table = 'danh_gias';
    protected $primaryKey = 'id';
    protected $fillable = [
        'khachhang_id','phim_id','DanhGia','TrangThai',
    ];
    public function phim() {
        return $this->belongsTo('App\Phim', 'phim_id', 'id');
    }

    public function khachhang() {
        return $this->belongsTo('App\KhachHang', 'khachhang_id', 'id');
    }
}
