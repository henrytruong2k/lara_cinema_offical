<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhimDienVien;
use App\DienVien;

class Phim_DienVienController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //
        $data= PhimDienVien::with('phim','dienvien')->where('TrangThai',1)->get();
        return view("manage.PhimDienVien.index")->with('list',$data);
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
        //
        $dv = new DienVien();
        $dv->TenDienVien = $request->TenDienVien;
        $dv->save();

        //thêm vào chi tiêt
        $ct = new PhimDienVien();
        $ct->phim_id = $request->phim_id;
        $ct->dienvien_id = $dv->id;
        $flag= $ct->save();
        
        $data= PhimDienVien::with('phim','dienvien')->where('TrangThai',1)->get();
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = PhimDienVien::with('dienvien')->find($id);
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
        $ct = PhimDienVien::find($id);      

        $dv = DienVien::find($ct->dienvien_id);
        $dv->TenDienVien = $request->TenDienVien;
        $dv->save();

        //
        $ct->phim_id = $request->phim_id;
        $flag= $ct->save();

        $data= PhimDienVien::with('phim','dienvien')->where('TrangThai',1)->get();
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
        //
        $data= PhimDienVien::find($id);
        $data->TrangThai=0;
        $flag=$data->save();    
        return json_encode($data);
    }
}
