<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioChieu;
use App\LoaiTGChieu;

class GioChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = GioChieu::with('loaitgchieu')->where('TrangThai',1)->get();
        return view('manage.GioChieu.index')->with('list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $g= new GioChieu();  
       $g->loaitgchieu_id = $request->loaitgchieu_id;
       $g->GioBatDau = $request->GioBatDau;
       $flag = $g->save();
       $data = GioChieu::with('loaitgchieu')->where('TrangThai',1)->get();
       if($flag)
        {
             return json_encode($data);
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
    public function getGioChieuID($id)
    {
        $data = GioChieu::find($id);
       return response()->json($data);
    }
    public function getGioChieu()
    {
        $data = GioChieu::where('TrangThai',1)->get();
        return json_encode($data);
    }

    public function getId($id)
    {
        $data = LoaiTGChieu::find($id);
        return response()->json($data);
    }

    public function kiemtratrung($giochieu)
    {
         $list = GioChieu::with('loaitgchieu')->where('TrangThai',1)->get();  
         foreach($list as $item)
         {
             if($item->GioBatDau==$giochieu)
             {
                 return true;
             }
         }
         return false;
    }

    public function get()
    {
        $data = LoaiTGChieu::where('TrangThai',1)->get();
        return json_encode($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = GioChieu::find($id);
        return response()->json($data);
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
        $g = GioChieu::find($id);
        $g->GioBatDau= $request->GioBatDau;
        $g->loaitgchieu_id= $request->loaitgchieu_id;
        $flag = $g->save();
        $data = GioChieu::with('loaitgchieu')->where('TrangThai',1)->get();
        if($flag)
        {
            return json_encode($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $giochieu= GioChieu::find($id);
        $giochieu->TrangThai=0;
        $flag=$giochieu->save();    
        return json_encode($giochieu);
    }
}
