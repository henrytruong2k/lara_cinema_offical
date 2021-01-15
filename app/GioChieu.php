<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioChieu extends Model
{
    //
    public $timestamp = true;
    protected $table = 'gio_chieus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'loaitgchieu_id', 'GioBatDau', 'TrangThai'
    ];

    public function loaitgchieu()
    {
        return $this->belongsTo('App\LoaiTGChieu', 'loaitgchieu_id', 'id');
    }
}
