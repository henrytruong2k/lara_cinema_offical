<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ghe;
use App\Phong;

class GheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Ghe::with('phong')->where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
        return view('manage.Ghe.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $day = ['A', 'B', 'C', 'D'];
        // $vitri = ['1', '2', '3', '4', '5'];
        // $phong = Phong::where('TrangThai', '<>', '-1')->get();
        // return view('manage.Ghe.create', compact('day', 'vitri', 'phong'));
    }
    public function getDay() {
        $list = ['A', 'B', 'C', 'D'];
        return json_encode($list);
    }
    public function getSort() {
        $vitri = ['1', '2', '3', '4', '5'];
        return json_encode($vitri);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = new Ghe();
        // $data->phong_id = $request->phong_id;
        // $data->GiaGhe = $request->GiaGhe;
        // $data->Day = $request->Day;
        // $data->sort = $request->sort;
        // $data->TrangThai = 1;

        // $data->save();
        // if($data->count() > 0) {
        //     return redirect('/ghe/');
        // }


        $g = new Ghe();
        $g->Day = $request->Day;
        $g->sort = $request->sort;
        $g->phong_id = $request->phong_id;
        $g->GiaGhe = $request->GiaGhe;
        $g->TrangThai = 1;
        $flag = $g->save();

        $data = Ghe::with('phong')->where('TrangThai', '<>', '-1')->orderBy('id', 'desc')->get();
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
        $day = ['A', 'B', 'C', 'D'];
        $vitri = ['1', '2', '3', '4', '5'];
        $phong = Phong::where('TrangThai', '<>', '-1')->get();
        $data = Ghe::findOrFail($id);
        return view('manage.Ghe.edit', compact('data', 'day', 'vitri', 'phong'));
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
        $data = Ghe::findOrFail($id);
        $data->phong_id = $request->phong_id;
        $data->GiaGhe = $request->GiaGhe;
        $data->Day = $request->Day;
        $data->sort = $request->sort;
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/ghe/');
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
        // $data = Ghe::findOrFail($id);
        // $data->TrangThai = -1;
        // $data->save();
        // if($data->count() > 0) {
        //     return redirect('/ghe/');
        // }

        $g = Ghe::find($id);
        $g->TrangThai=-1;
        $g->save();
        return response()->json($g);
    }

    public function inactive($id) 
    {
        $data = Ghe::findOrFail($id);
        $data->TrangThai = 0;
        $data->save();
        if($data->count() > 0) {
            return redirect('/ghe/');
        }
    }
    public function active($id) 
    {
        $data = Ghe::findOrFail($id);
        $data->TrangThai = 1;
        $data->save();
        if($data->count() > 0) {
            return redirect('/ghe/');
        }
    }
}
