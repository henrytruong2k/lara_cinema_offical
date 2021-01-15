<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DienVien extends Model
{
    public $timestamp = false;
    protected $table = 'dien_viens';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenDienVien', 'TrangThai'
    ];

    public function phims()
    {
        return $this->belongsToMany('App\Phim', 'phim_dienvien', 'phim_id', 'dienvien_id');
    }
    
}
