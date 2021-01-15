<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DanhGia;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DanhGia::with('phim','khachhang')->where('TrangThai',1)->get();
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
        $danhgia = new DanhGia();
        $danhgia->phim_id = $request->phim_id;
        $danhgia->khachhang_id = $request->khachhang_id;
        $danhgia->DanhGia = $request->DanhGia;
        $flag = $danhgia->save();
        if($flag)
        {
            return json_encode(1);
        }
        else
        {
            return json_encode(2);
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
        //
    }
    public function avgPhim($id)
    {
        $danhgias =  DanhGia::where('phim_id',$id)->get();
        $avg = 0;
        foreach($danhgias as $item)
        {
            $avg+= $item->DanhGia;
        }
        return json_encode($avg/sizeof($danhgias));
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
        $danhgia = DanhGia::find($id);
        $danhgia->TrangThai=0;
        $flag = $danhgia->save();
        if($flag)
        {
            return json_encode(1);
        }
        else
        {
            return json_encode(2);
        }
    }
}
