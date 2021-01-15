<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $khachhangs = KhachHang::where('TrangThai','1')->orderBy('created_at','desc')->paginate(5);

    return view('manage.KhachHang.index',compact('khachhangs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('manage.KhachHang.create');



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $khachhang = new KhachHang();

        $khachhang->HoTen = $request->HoTen;
        $khachhang->TenTK = $request->TenTK;
        $khachhang->password = $request->password;
        $khachhang->DiaChi = $request->DiaChi;
        $khachhang->SDT = $request->SDT;
        $khachhang->Email = $request->Email;
        $khachhang->TrangThai = 1;

        $khachhang->save();

        return redirect()->route('customers.index');
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
      $khachhang = KhachHang::find($id);

      return view('manage.KhachHang.edit',compact('khachhang'));
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


       $khachhang = KhachHang::find($id);
       $khachhang->HoTen = $request->HoTen;
       $khachhang->DiaChi = $request->DiaChi;
       $khachhang->SDT = $request->SDT;
       $khachhang->Email = $request->Email;


       $khachhang->save();

       return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $khachhang = KhachHang::find($id);

        $khachhang->TrangThai = 0;

        $khachhang->save();

        return redirect()->route('customers.index');
    }
}
