<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuatChieu;
use App\Phim;
use App\GioChieu;
use App\Phong;

class SuatChieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuatChieu::with('phim','giochieu')->where('TrangThai',1)->get();
        return view('manage.SuatChieu.index')->with('list',$data);
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
        $sc = new SuatChieu();

        $phim = Phim::find($request->Phim);
        $giochieu = GioChieu::find($request->GioChieu);

        $sc->GiaSuatChieu = $phim->GiaPhim + $giochieu->loaitgchieu->Gia_TG ;
        $sc->giochieu_id = $request->GioChieu;
        $sc->phim_id = $request->Phim;
        $sc->phong_id = $request->Phong;
        $sc->NgayChieu = $request->NgayChieu;
      
        $flag = $sc->save();
        $data = SuatChieu::with('phim','phong','giochieu')->where('TrangThai',1)->get();
        if($flag)
        {
            return json_encode($data);
        }     
    }

    public function getPhong(Request $request)
    {
        $phongs = Phong::where('rap_id',$request->Rap)->get(); 
        $resultPhongs = Phong::where('rap_id',$request->Rap)->get(); 

        $suatchieus = SuatChieu::where('TrangThai',1)->get(); 

        if($suatchieus==null)
        {
            return json_encode($phongs);
            
        }

        for($i = 0; $i < sizeof($phongs); $i++)
        {
                foreach($suatchieus as $item)
                {
                    if($phongs[$i]->id != $item->phong_id)
                    {
                                                  
                    }
                    else
                    {                  
                        if( $item->giochieu_id == $request->GioChieu && $item->NgayChieu == $request->NgayChieu)
                        {
                          $resultPhongs[$i]=null;                         
                        }
                        else
                        {
                        
                        }    
                    }                                
                }                 
        }
        $temp=0;
        foreach($resultPhongs as $item)
        {
           if($item == "")
           {
               $temp++;
           }
        }
        if($temp == sizeof($resultPhongs))
        {
            return json_encode(1);
        }
        else  
            return json_encode($resultPhongs);
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
        //
        $data = SuatChieu::find($id);
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
        $sc = SuatChieu::find($id);

        $phim = Phim::find($request->Phim);
        $giochieu = GioChieu::find($request->GioChieu);
   
        $sc->GiaSuatChieu = $phim->GiaPhim + $giochieu->loaitgchieu->Gia_TG;
        $sc->phim_id = $request->Phim;
        $sc->giochieu_id = $request->GioChieu;
        $sc->phong_id = $request->Phong;
        $sc->NgayChieu = $request->NgayChieu;
       
        $flag = $sc->save();

        $data = SuatChieu::with('phim','phong','giochieu')->where('TrangThai',1)->get();
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
        $sc = SuatChieu::find($id);
        $sc->TrangThai=0;
        $sc->save();
        return response()->json($sc);
    }
    public function getGioChieu (Request $request){
        $rap_id=(int)$request->rap_id;
        $phim_id=(int)$request->phim_id;

        //return json_encode($request->NgayChieu);
        $list = SuatChieu::join('gio_chieus', 'suat_chieus.giochieu_id', '=', 'gio_chieus.id')->select('giochieu_id','gio_chieus.GioBatDau')->where('rap_id',$rap_id)->where('phim_id',$phim_id)->where('NgayChieu',"2021-01-07")->get();
        return json_encode($list);
    }
}
