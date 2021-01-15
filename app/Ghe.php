<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    public $timestamp = false;
    protected $table = 'ghes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'phong_id', 'GiaGhe', 'TrangThai',
    ];

    
    public function phong() {
        return $this->belongsTo('App\Phong', 'phong_id', 'id');
    }
    
}
