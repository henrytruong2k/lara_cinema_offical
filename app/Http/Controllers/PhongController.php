<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phong;
use App\Rap;
use App\Ghe;

class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $list = Phong::with('rap', 'ghes')->where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
        
        return view('manage.Phong.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Rap::where('TrangThai', '<>', '-1')->get();
        // return view('manage.Phong.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $arr_validate = [
        //     'TenPhong.required' => 'Vui lòng nhập tên phòng',
        //     'TenPhong.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
        //     'TenPhong.max' => 'Vui lòng nhập tối đa 255 kí tự',
        // ];
        // $validate = $request->validate([
        //     'TenPhong' => 'required|min:5|max:255',
            
        // ], $arr_validate);
        
        // $data = new Phong();
        // $data->TenPhong = $request->TenPhong;
        // $data->rap_id = $request->rap_id;
        // $data->TrangThai = 1;
        // $data->save();
        // if($data->count() > 0) {
        //     return redirect('/phong/');
        // } 



        $p = new Phong();
        $p->TenPhong = $request->TenPhong;
        
        $p->rap_id = $request->Rap;
        
        $flag = $p->save();

        $data = Phong::with('rap', 'ghes')->where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $rap = Rap::where('TrangThai', '<>', '-1')->get();
        // $data = Phong::findOrFail($id);
        // return view('manage.Phong.edit', compact('data', 'rap'));
        $data = Phong::find($id);
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
        // $arr_validate = [
        //     'TenPhong.required' => 'Vui lòng nhập tên phòng',
        //     'TenPhong.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
        //     'TenPhong.max' => 'Vui lòng nhập tối đa 255 kí tự',
        // ];
        // $validate = $request->validate([
        //     'TenPhong' => 'required|min:5|max:255',
            
        // ], $arr_validate);
        // $data = Phong::findOrFail($id);
        // $data->TenPhong = $request->TenPhong;
        // $data->rap_id = $request->rap_id;
        // $data->TrangThai = 1;
        // $data->save();
        // if($data->count() > 0) {
        //     return redirect('/phong/');
        // }

        $p = Phong::find($id);
        $p->TenPhong = $request->TenPhong;
        $p->rap_id = $request->Rap;
        $flag = $p->save();

        $data = Phong::with('rap', 'ghes')->where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
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
        $p = Phong::find($id);
        $p->TrangThai=-1;
        $p->save();
        return response()->json($p);
    }
    public function inactive($id) 
    {
        $data = Phong::findOrFail($id);
        $data->TrangThai = 0;
        $data->save();
        if($data->count() > 0) {
            return redirect('/phong/');
        }
    }
    public function active($id) 
    {
        $data = Phong::findOrFail($id);
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/phong/');
        }
    }

    public function get()
    {
        $list = Phong::where('TrangThai', '<>', '-1')->get();
        return json_encode($list);
    }
}
