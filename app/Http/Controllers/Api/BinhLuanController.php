<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BinhLuan;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BinhLuan::with('phim','khachhang')->where('TrangThai',1)->get();
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
        $binhluan = new BinhLuan();
        $binhluan->phim_id = $request->phim_id;
        $binhluan->khachhang_id = $request->khachhang_id;
        //$binhluan->NgayBinhLuan  = $request->NgayBinhLuan;
        $binhluan->NoiDung = $request->NoiDung;
        $flag = $binhluan->save();
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

    public function get($phim_id)
    {
        $data = BinhLuan::with('phim','khachhang')->where('TrangThai',1)->where('phim_id', $phim_id)->get();  
        return json_encode($data);
    }

    public function getFive($phim_id)
    {
//         $data = BinhLuan::with('phim','khachhang')->where('TrangThai',1)->where('phim_id', $phim_id)->get();
//         $list = array();
//         for( $i = 0; $i < 5; $i++)
//         {
//             array_push($list, $data[$i]);
//         }
//         return json_encode($data);
        $data = BinhLuan::with('phim','khachhang')->where('TrangThai',1)->where('phim_id', $phim_id)
        ->where("TrangThai",1)->limit(5)->get();
    
        return json_encode($data);
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
        $binhluan = BinhLuan::find($id);
        $binhluan->TrangThai=0;
        $flag = $binhluan->save();
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
