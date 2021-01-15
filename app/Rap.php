<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rap extends Model
{
    public $timestamp = false;
    protected $table = 'raps';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenRap', 'DiaChi', 'SDT','TrangThai'
    ];


    public function phongs()
    {
        return $this->hasMany('App\Phong', 'rap_id', 'id');
    }
    public function suatchieu()
    {
        return $this->hasMany('App\SuatChieu', 'rap_id', 'id');
    }
    
}
