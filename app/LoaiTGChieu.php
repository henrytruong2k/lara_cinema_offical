<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiTGChieu extends Model
{
    //
    public $timestamp = false;
    protected $table = 'loai_tg_chieus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenLoaiTGChieu', 'Gia_TG','TrangThai'
    ];

    public function giochieu() {
        return $this->hasMany('App\GioChieu', 'loaitgchieu_id', 'id');
    }
   
}
