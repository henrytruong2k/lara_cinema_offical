<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Phim;

class PhimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Phim::with('theloais')->where('TrangThai',1)->get();
        return response()->json($data);
    }

    public function getFiveFilm()
    {
       $data = Phim::with('theloais')->where('TrangThai',1)->get();
       $list = array();
       for( $i=0; $i < 5;$i++)
       {
           array_push($list, $data[$i]);
       }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function search($key)
    {
        $list =  Phim::where('TrangThai',1)->get();
        $data = array();
       foreach($list as $item)
        {
            if($item->TenPhim==$key)
            {
                array_push($data, $item);
            }
        }
        return json_encode($data);
    }
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
}
