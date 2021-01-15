<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class BackController extends Controller
{
    //
    public function Login_post(Request $request)
    {

         if(Auth::attempt(['TenTK' =>$request->name , 'password' => $request->pass]))
         {
             return redirect("/home");
         }
         else
         {
             return redirect("/login");
         }

    }
    public function Logout_post(Request $request)
    {
        Auth::logout();
        return redirect("/login");

    }
}
