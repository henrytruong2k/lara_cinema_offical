<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    public $timestamp = false;
    protected $table = 'binh_luans';
    protected $primaryKey = 'id';
    protected $fillable = [
        'khachhang_id', 'phim_id', 'NgayBinhLuan', 'NoiDung','TrangThai',
    ];

    public function phim() {
        return $this->belongsTo('App\Phim', 'phim_id', 'id');
    }

    public function khachhang() {
        return $this->belongsTo('App\KhachHang', 'khachhang_id', 'id');
    }
}
