<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\ChucVu;
use App\NhanVien;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChucVuRequest;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Validation\Validator;
class ChucVuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $chucvus = DB::table('chuc_vus')->where('TrangThai','1')->orderBy('created_at','desc')->get();

       return view('manage.ChucVu.index',['chucvus' => $chucvus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChucVuRequest $request)
    {
     if($request->TenCV ==null)
     { return response()->json([ 'error' => true, 'messages' => "Lỗi", ], 422); }

    $chucvu = new ChucVu();
    $chucvu->TenCV = $request->TenCV;
    $chucvu->TrangThai = 1;
    $chucvu->save();
    $chucvus = DB::table('chuc_vus')->where('TrangThai','1')->orderBy('created_at','desc')->get();
    return json_encode($chucvus);
 }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $chucvu = ChucVu::find($id); return response()->json([ 'error' => false, 'chucvu' => $chucvu, ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chucvu = ChucVu::find($id);
        return view('manage.ChucVu.edit',compact('chucvu'));
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

        // $chucvu = ChucVu::find($id);
        // $chucvu->TenCV = $request->TenCV;
        // $chucvu->save();
        // return redirect()->route('positions.index');
        $chucvu = ChucVu::find($id);
        if($request->TenCV ==null)
        { return response()->json([ 'error' => true, 'messages' => "Lỗi", ], 422); }

         $chucvu->TenCV = $request->input('TenCV');

         $chucvu->save();
         $chucvus = DB::table('chuc_vus')->where('TrangThai','1')->orderBy('created_at','desc')->get();
         return json_encode($chucvus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $chucvu = ChucVu::find($id);
        if($chucvu->TrangThai == 0)
        $chucvu->TrangThai = 1;
        else
        if($chucvu->TrangThai == 1)
        $chucvu->TrangThai = 0;
        $chucvu->save();
        $chucvus = DB::table('chuc_vus')->where('TrangThai','1')->orderBy('created_at','desc')->get();
        return json_encode($chucvus);

    }
}
