<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTGChieu;

class LoaiTGChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = LoaiTGChieu::where('TrangThai',1)->get();
        return view('manage.LoaiTGChieu.index')->with('list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.LoaiTGChieu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'TenLoaiTGChieu' => 'required|min:3|max:255',
            
        ]);

        $data = new LoaiTGChieu();
        $data->TenLoaiTGChieu = $request->TenLoaiTGChieu;
        $data->Gia_TG = $request->Gia_TG;
        $flag = $data->save();
        $list= LoaiTGChieu::where('TrangThai', 1)->get();

        
        if($flag){
            return json_encode($list);
        }
        else
        {
            return view('manage.LoaiTGChieu.create');
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
      $data = LoaiTGChieu::find($id);
      return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LoaiTGChieu=LoaiTGChieu::find($id);
        return response()->json($LoaiTGChieu);
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
        $validated = $request->validate([
            'TenLoaiTGChieu' => 'required|min:3|max:255',
            
        ]);

        $data = LoaiTGChieu::find($id);
        $data->TenLoaiTGChieu=$request->TenLoaiTGChieu;
        $data->Gia_TG=$request->Gia_TG;
        $flag = $data->save();
        $list= LoaiTGChieu::where('TrangThai', 1)->get();

        if($flag){
            return json_encode($list);
        }
        else
        {
            return view('manage.LoaiTGChieu.edit');
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
        $data = LoaiTGChieu::find($id);
        $data->TrangThai=0;
        $flag=$data->save();    
        $list= LoaiTGChieu::where('TrangThai', 1)->get();
        return json_encode($list);
    }
}
