<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DaoDien;

class Phim extends Model
{
    public $timestamp = true;
    protected $table = 'phims';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenPhim','NgayDKChieu','loaiphim_id','GiaPhim','NgayKetThuc','ThoiLuong','HinhAnh','MoTa', 'TrangThai'
    ];

    public function dienviens() {
        return $this->belongsToMany('App\DienVien', 'phim_dienvien', 'phim_id', 'dienvien_id');
    }

    public function theloais() {
        return $this->belongsTo('App\LoaiPhim', 'loaiphim_id', 'id');
    }


    public function lichchieus()
    {
        return $this->hasMany('App\LichChieu', 'phim_id', 'id');
    }
}
