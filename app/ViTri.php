<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViTri extends Model
{
    public $timestamp = false;
    protected $table = 'vitris';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ghe_id', 'TrangThai'
    ];

    public function ghe()
    {
        return $this->belongsTo('App\ViTri', 'ghe_id', 'id');
    }
}
