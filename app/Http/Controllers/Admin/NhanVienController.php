<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Hash;
use App\ChucVu;
use Illuminate\Support\Facades\DB;
use App\NhanVien;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NhanVienRequest;
class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhanviens = DB::table('nhan_viens as nv')
        ->join('chuc_vus as cv','nv.ChucVu_ID', 'cv.MaCV')->where('nv.status','1')->orderBy('cv.MaCV','asc')
        ->paginate(5);

        $chucvus = DB::table('chuc_vus')->where('TrangThai','1')->get();

            return view('manage.NhanVien.index',['nhanviens' => $nhanviens, 'chucvus'=>$chucvus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $chucvus = ChucVu::where('TrangThai','1')->get();
        return view('manage.NhanVien.create',compact('chucvus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $nhanvien = new NhanVien();

        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->TenTK = $request->TenTK;
        $nhanvien->password = Hash::make($request->password);

        
        $nhanvien->ChucVu_ID = $request->ChucVu;
        $nhanvien->NgSinh = $request->NgSinh;
        $nhanvien->DiaChi = $request->DiaChi;
        $nhanvien->SDT = $request->SDT;
        $nhanvien->Email = $request->Email;

        $nhanvien->status = 1;

        if($request->Anh !=null)

        {   $tennv = $nhanvien->TenTK;

        $extension = $request->Anh->extension();
        $imageName = $tennv.'.'.$extension;


        $request->Anh->move(public_path('images/nhanviens'), $imageName);

        $nhanvien->Anh = $imageName;
      }
     else $nhanvien->Anh = null;

     $nhanvien->save();

     return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $nhanvien = NhanVien::find($id);

        $chucvu = ChucVu::find($nhanvien->ChucVu_ID);

            return view('manage.NhanVien.show',compact('nhanvien','chucvu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nhanvien = NhanVien::find($id);

        $chucvus = ChucVu::where('TrangThai','1')->get();
        return view('manage.NhanVien.edit',compact('nhanvien','chucvus'));
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
        $nhanvien = NhanVien::find($id);

        $nhanvien->HoTen = $request->HoTen;
        $nhanvien->ChucVu_ID = $request->ChucVu;

        $nhanvien->NgSinh = $request->NgSinh;
        $nhanvien->DiaChi = $request->DiaChi;
        $nhanvien->SDT = $request->SDT;
        $nhanvien->Email = $request->Email;


        if($request->Anh !=null)
        {

            $tennv = ($nhanvien->TenTK);

            $extension = $request->Anh->extension();
            $imageName = $tennv.'.'.$extension;

        $request->Anh->move(public_path('images/nhanviens'), $imageName);

        $nhanvien->Anh = $imageName;
        }

        if($nhanvien->save())

        return redirect()->route('employees.index');

        else
        return redirect()->route('employees.edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nhanvien = NhanVien::find($id);
        if($nhanvien->status == 0)
        $nhanvien->status = 1;
        else
        if($nhanvien->status == 1)
        $nhanvien->status = 0;


        $nhanvien->save();


      return redirect()->route('employees.index');
    }
}


