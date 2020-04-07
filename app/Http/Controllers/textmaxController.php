<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class textmaxController extends Controller
{
    public function showform(){
        return view('login'); // แสดงหน้า login
     }
     //validatetion สำหรับ login
     public function validateform(Request $request){ 
        print_r($request->all());
        $this->validate($request,[
           'username'=>'required',
           'password'=>'required',
           'phone'=>'required|max:13',
        ]);
     }
}
