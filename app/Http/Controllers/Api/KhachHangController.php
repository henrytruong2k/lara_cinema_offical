<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KhachHang::where('TrangThai','1')->get();
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
    }

    public function Login(Request $request)
    {
        $khachhang=KhachHang::where("Email",$request->email)->first();
        
        // $khachhang->password;
        if($khachhang!=null)
        {
            if(Hash::check($request->mk,$khachhang->password))
            {
                return response()->json($khachhang);
            }
            else
            {
                
                return response()->json("false");
            }
        }
        return response()->json("false");
       
    }
    public function KhachHang_Regis(Request $request)
    {
        if($request->hoten!=null&&$request->pass!=null&&$request->sdt!=null&&$request->email!=null)
        {
            $khachhang=new KhachHang();
            $khachhang->HoTen=$request->hoten;
            $khachhang->password=bcrypt($request->pass);
            $khachhang->NgaySinh=$request->ngaysinh;
            $khachhang->Diachi=$request->diachi;
            $khachhang->SDT=$request->sdt;
            $khachhang->Email=$request->email;
            $khachhang->TrangThai=1;
            $flag=$khachhang->save();
            if($flag)
            {
                return response()->json("true");
            }
            else
            {
                return response()->json("false");
            }
        }
        return response()->json("false");

    }
}
