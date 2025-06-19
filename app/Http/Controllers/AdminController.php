<?php

namespace App\Http\Controllers;
use App\Models\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    function login(Request $request){
        $validation = $request->validate([
            'admin'=>'required',
            'password'=>'required'
        ]);
        $admin = Admin::where('name', $request->admin)->where('password',$request->password)->first();
       if($admin){
          return redirect('dashboard');
        //   return view('admin',['name'=>$request->admin]);
        Session::put('admin',$admin);
       }
           
       if(!$admin){
          $validation = $request->validate([
            'user'=>'required'
          ],["user.required"=>"user does not exit"]);
       }
       
    }

     function dashboard(){
      return Session::get('admin');
     // return $admin;
         //return view('admin');
     }
}
