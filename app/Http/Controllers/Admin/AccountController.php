<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\NhanVien;

class AccountController extends Controller
{
    public function register(Request $request) {
        $arr_validate = [
            'HoTen.required' => 'Vui lòng nhập họ tên',
            'HoTen.min' => 'Vui lòng nhập tối thiểu 5 kí tự',
            'HoTen.max' => 'Vui lòng nhập tối đa 255 kí tự',

            'Email.required' => 'Vui lòng nhập email',
            'Email.unique' => 'Email này đã tồn tại trong hệ thống',

            'Email.required' => 'Vui lòng nhập tên tài khoản',
            'TenTK.unique' => 'Tên tài khoản này đã tồn tại trong hệ thống',

            'SDT.required' => 'Vui lòng nhập số điện thoại',
            'SDT.numeric' => 'Vui lòng chỉ nhập số',
            'SDT.unique' => 'SĐT này đã tồn tại trong hệ thống',
        ];
        $validate = $request->validate([
            'HoTen' => 'required|min:5|max:255',
            'Email' => 'required|unique:nhan_viens',
            'TenTK' => 'required|min:3|unique:nhan_viens',
            'SDT' => 'required|numeric|unique:nhan_viens',
        ], $arr_validate);

        $nhanvien = new NhanVien();

        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->TenTK = $request->TenTK;
        $nhanvien->password = Hash::make($request->password);
        $nhanvien->Email = $request->Email;
        $nhanvien->SDT = $request->SDT;

        $nhanvien->ChucVu_ID = 2;
        $nhanvien->NgSinh = null;
        $nhanvien->DiaChi = null;
        
        

        $nhanvien->status = 1;

        if($request->Anh !=null)
        {   
            $tennv = $nhanvien->TenTK;

            $extension = $request->Anh->extension();
            $imageName = $tennv.'.'.$extension;


            $request->Anh->move(public_path('images/nhanviens'), $imageName);

            $nhanvien->Anh = $imageName;
        }
        else $nhanvien->Anh = null;

        $nhanvien->save();

        return redirect('home');
        }
}
