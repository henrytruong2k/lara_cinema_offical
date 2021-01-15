<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhimDienVien extends Model
{
    public $timestamp = true;
    protected $table = 'phim_dienvien';
    protected $primaryKey = 'id';
    protected $fillable = [
        'phim_id','dienvien_id','TrangThai'
    ];

    public function phim() {
        return $this->belongsTo('App\Phim', 'phim_id', 'id');
    }

    public function dienvien() {
        return $this->belongsTo('App\DienVien', 'dienvien_id', 'id');
    }

}
