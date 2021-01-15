<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiPhim;

class LoaiPhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=LoaiPhim::where('TrangThai','1')->get();
        return view ('manage.LoaiPhim.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('manage.LoaiPhim.create');
    }

    public function get()
    {
        $list = LoaiPhim::where('TrangThai','1')->get();
        return json_encode($list);
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
            'TenLoaiPhim' => 'required|min:5|max:255',
            
        ]);
        $data = new LoaiPhim();
        $data->TenLoaiPhim=$request->TenLoaiPhim;
        $flag = $data->save();
        
        $list= LoaiPhim::where('TrangThai',1)->get(); 
        if($flag){
            return json_encode($list);
        }
        else
        {
            return view('manage.LoaiPhim.create');
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
        $loaiphim=LoaiPhim::find($id);
        return response()->json($loaiphim);
        // return view('manage.LoaiPhim.edit')->with('loaiphim',$loaiphim);
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
        $validated = $request->validate([
            'TenLoaiPhim' => 'required|min:5|max:255',
            
        ]);
        $data = LoaiPhim::find($id);
        $data->TenLoaiPhim=$request->TenLoaiPhim;
        $flag = $data->save();
        $list= LoaiPhim::where('TrangThai',1)->get();

        
        if($flag){
            return json_encode($list);
        }
        else
        {
            return view('manage.LoaiPhim.create');
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
        $phim= LoaiPhim::find($id);
        $phim->TrangThai=0;
        $flag=$phim->save();    
        return redirect('/LoaiPhim/index');
    }
}
