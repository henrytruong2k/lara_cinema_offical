<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phim_LoaiPhim extends Model
{
    //
    public $timestamp = true;
    protected $table = 'phim_theloai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'phim_id','loaiphim_id'
    ];

    public function phim() {
        return $this->belongsTo('App\Phim', 'phim_id', 'id');
    }

    public function loaiphim() {
        return $this->belongsTo('App\LoaiPhim', 'loaiphim_id', 'id');
    }
}
