<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    public $timestamp = false;
    protected $table = 'phongs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'TenPhong','rap_id', 'TrangThai',
    ];
    public function ghes()
    {
        return $this->hasMany('App\Ghe', 'phong_id', 'id');
    }
    public function rap()
    {
        return $this->belongsTo('App\Rap', 'rap_id', 'id');
    }
}
