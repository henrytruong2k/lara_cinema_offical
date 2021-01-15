<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    public $timestamp = true;
    protected $table = 'ves';
    protected $primaryKey = 'id';
    protected $fillable = [
         'suatchieu_id', 'ghe_id','kh_id','GiaVe','TrangThai'
    ];

    public function ghe() {
        return $this->belongsTo('App\Ghe', 'ghe_id', 'id');
    }
    public function suatchieu() {
        return $this->belongsTo('App\SuatChieu', 'suatchieu_id', 'id');
    }
    public function khachhang() {
        return $this->belongsTo('App\KhachHang', 'kh_id', 'id');
    }
}
