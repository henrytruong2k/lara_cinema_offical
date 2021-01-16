<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ve;
use App\Ghe;
use App\SuatChieu;

class VeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ve::join('khach_hangs', 'ves.kh_id', '=', 'khach_hangs.id')
        ->join('suat_chieus', 'ves.suatchieu_id', '=', 'suat_chieus.id')
        ->join('ghes', 'ves.ghe_id', '=', 'ghes.id')
        ->select('ves.id','khach_hangs.HoTen','suat_chieus.NgayChieu','ghes.Day','GiaVe')
        ->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ve = new Ve();
        $ve->suatchieu_id = $request->suatchieu_id;
        $ve->ghe_id = $request->ghe_id;
        $ve->kh_id = $request->kh_id;
        $suat=SuatChieu::find($ve->suatchieu_id);
        $ghe=Ghe::find($ve->ghe_id);

        $ve->GiaVe = $suat->GiaSuatChieu+$ghe->GiaGhe;
        $flag = $ve->save();
        if($flag)
        {
            return response()->json("1");
        }
        else
        {
            return response()->json("0");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list=Ve::join("ghes","ghes.id","ves.ghe_id")->select(
            "ghes.id","ghes.Day","ghes.sort"
        )->where("suatchieu_id",$id)->get();
        return json_encode($list);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function GetLichSu($id_kh)
    {
      
        $data = Ve::join('khach_hangs', 'ves.kh_id', '=', 'khach_hangs.id')
        ->join('suat_chieus', 'ves.suatchieu_id', '=', 'suat_chieus.id')
        ->join('ghes', 'ves.ghe_id', '=', 'ghes.id')->join('gio_chieus','gio_chieus.id',"suat_chieus.giochieu_id")->join("phims","phims.id","suat_chieus.phim_id")->where("kh_id",$id_kh)
        ->select('ves.id','khach_hangs.HoTen','suat_chieus.NgayChieu','ghes.Day','ghes.sort','GiaVe','phims.TenPhim',
        'suat_chieus.giochieu_id','gio_chieus.GioBatDau')
        ->get();
        return response()->json($data);
    }
}
