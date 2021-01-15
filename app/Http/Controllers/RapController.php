<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rap;
use Session;

class RapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Rap::where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
        
        return view('manage.rap.index', compact('list'));
    }
    public function getId($id)
    {
        return response()->json(Rap::find($id));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.rap.create');
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
        //     'TenRap.required' => 'Vui lòng nhập tên rạp',
        //     'TenRap.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
        //     'TenRap.max' => 'Vui lòng nhập tối đa 255 kí tự',

        //     'DiaChi.required' => 'Vui lòng nhập địa chỉ',

        //     'SDT.required' => 'Vui lòng nhập số điện thoại liên hệ của rạp',
        //     'SDT.numeric' => 'Vui lòng chỉ nhập số'
        // ];
        // $validate = $request->validate([
        //     'TenRap' => 'required|min:5|max:255',
        //     'DiaChi' => 'required',
        //     'SDT' => 'required|numeric'
        // ], $arr_validate);
        
        $r = new Rap();
        $r->TenRap = $request->TenRap;
        $r->DiaChi = $request->DiaChi;
        $r->SDT = $request->SDT;
        $flag = $r->save();

        $data = Rap::where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
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
        $data = Rap::with('phongs')->where('id', $id)->where('TrangThai', '<>', '-1')->first();
        
        return view('manage.rap.details', compact('data'));
    }
    public function get()
    {
        $list = Rap::where('TrangThai', '<>', '-1')->get();
        return json_encode($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = Rap::findOrFail($id);
        // return view('manage.rap.edit', compact('data'));
        $data = Rap::find($id);
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

        $r = Rap::find($id);
        $r->TenRap = $request->eTenRap;
        $r->DiaChi = $request->eDiaChi;
        $r->SDT = $request->eSDT;           
        $r->TrangThai = 1;
        $flag = $r->save();

        $data = Rap::where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
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
        // $data = Rap::findOrFail($id);
        // $data->TrangThai = -1;
        // $data->save();
        // if($data->count() > 0) {
        //     return redirect('/rap/');
        // }

        $r = Rap::find($id);
        $r->TrangThai=-1;
        $r->save();
        return response()->json($r);
    }
    public function inactive($id) 
    {
        $data = Rap::findOrFail($id);
        $data->TrangThai = 0;
        $data->save();
        if($data->count() > 0) {
            return redirect('/rap/');
        }
    }
    public function active($id) 
    {
        $data = Rap::findOrFail($id);
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/rap/');
        }
    }

}
