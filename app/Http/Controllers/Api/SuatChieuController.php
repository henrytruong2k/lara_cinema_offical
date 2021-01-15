<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SuatChieu;

class SuatChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuatChieu::with('phim','phong','giochieu')->where('TrangThai', 1) ->get();
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
        //
    }
    public function getGioChieu(Request $request)
    {
        $rap_id=(int)$request->rap_id;
        $phim_id=(int)$request->phim_id;
        $ngay=$request->NgayChieu;
        //return json_encode($request->NgayChieu);
        $list = SuatChieu::join('gio_chieus', 'suat_chieus.giochieu_id', '=', 'gio_chieus.id')
        ->join('phongs', 'phongs.id', '=', 'suat_chieus.phong_id')
        ->select('giochieu_id','gio_chieus.GioBatDau','suat_chieus.id','suat_chieus.phong_id')
        ->where('phongs.rap_id',$rap_id)->where('phim_id',$phim_id)->where('NgayChieu',$ngay)->get();
        return json_encode($list);    
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function test()
    {
        $list = SuatChieu::join('gio_chieus', 'suat_chieus.giochieu_id', '=', 'gio_chieus.id')->select('giochieu_id','gio_chieus.GioBatDau')->where('phim_id',1)->where('NgayChieu','2021-01-01')->get();
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
}
