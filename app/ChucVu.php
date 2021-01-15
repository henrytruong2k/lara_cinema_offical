<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChucVu extends Model
{
    protected $fillable = [

        'TenCV',
       'TrangThai'
    ];

    protected $primaryKey = 'MaCV';

    public function ChucVu()
    {
        return $this->hasMany('App\NhanVien');
    }
}
