<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChiNhanh;

class ChiNhanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = ChiNhanh::where('TrangThai', '<>', '-1')->paginate(3);
        
        return view('manage.ChiNhanh.index')->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.chinhanh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr_validate = [
            'TenChiNhanh.required' => 'Vui lòng nhập tên chi nhánh',
            'TenChiNhanh.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
            'TenChiNhanh.max' => 'Vui lòng nhập tối đa 255 kí tự',

            'DiaChi.required' => 'Vui lòng nhập địa chỉ chi nhánh',

            'SDT.required' => 'Vui lòng nhập số điện thoại chi nhánh',
            'SDT.numeric' => 'Vui lòng chỉ nhập số'
        ];
        $validate = $request->validate([
            'TenChiNhanh' => 'required|min:5|max:255',
            'DiaChi' => 'required',
            'SDT' => 'required|numeric'
        ], $arr_validate);
        
        $data = new ChiNhanh();
        $data->TenChiNhanh = $request->TenChiNhanh;
        $data->DiaChi = $request->DiaChi;
        $data->SDT = $request->SDT;
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/chinhanh/');
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
        $data = ChiNhanh::where('id', $id)->with('raps')->first();
        
        return view('manage.ChiNhanh.details')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ChiNhanh::findOrFail($id);
        return view('manage.ChiNhanh.edit')->with('data', $data);
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
        $arr_validate = [
            'TenChiNhanh.required' => 'Vui lòng nhập tên chi nhánh cần sửa',
            'TenChiNhanh.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
            'TenChiNhanh.max' => 'Vui lòng nhập tối đa 255 kí tự',

            'DiaChi.required' => 'Vui lòng nhập địa chỉ chi nhánh cần sửa',

            'SDT.required' => 'Vui lòng nhập số điện thoại chi nhánh cần sửa',
            'SDT.numeric' => 'Vui lòng chỉ nhập số'
        ];
        $validate = $request->validate([
            'TenChiNhanh' => 'required|min:5|max:255',
            'DiaChi' => 'required',
            'SDT' => 'required|numeric'
        ], $arr_validate);

        $data = ChiNhanh::findOrFail($id);
        $data->TenChiNhanh = $request->TenChiNhanh;
        $data->DiaChi = $request->DiaChi;
        $data->SDT = $request->SDT;
        $data->TrangThai = 1;
        $data->save();

        if($data->count() > 0) {
            return redirect('/chinhanh/');
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
        $data = ChiNhanh::findOrFail($id);
        $data->TrangThai = -1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/chinhanh/');
        }
    }
    public function inactive($id) 
    {
        $data = ChiNhanh::findOrFail($id);
        $data->TrangThai = 0;
        $data->save();
        if($data->count() > 0) {
            return redirect('/chinhanh/');
        }
    }
    public function active($id) 
    {
        $data = ChiNhanh::findOrFail($id);
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/chinhanh/');
        }
    }
}
