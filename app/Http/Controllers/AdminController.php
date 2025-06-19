<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function login(Request $request){
        $admin = Admin::where('name', $request->admin)->where('password',$request->password)->first();
        if($admin){
            return view('admin',['name'=>$request->admin]);
        }
        else{
            return "empty";
        }
       
    }
}
