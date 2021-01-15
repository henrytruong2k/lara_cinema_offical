<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuatChieu extends Model
{
    //
    public $timestamp = true;
    protected $table = 'suat_chieus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'phim_id', 'phong_id', 'giochieu_id','rap_id','phong_id', 'GiaSuatChieu','NgayChieu', 'TrangThai'
    ];

    public function phim()
    {
        return $this->belongsTo('App\Phim', 'phim_id', 'id');
    }

    public function giochieu()
    {
        return $this->belongsTo('App\GioChieu', 'giochieu_id', 'id')->with('loaitgchieu');
    }
    public function phong()
    {
        return $this->belongsTo('App\Phong', 'phong_id', 'id')->with('rap');
    }

    
    // public function rap()
    // {
    //     return $this->belongsTo('App\Rap', 'rap_id', 'id');
    // }

}
