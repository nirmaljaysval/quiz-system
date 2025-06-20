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
       
           
       if(!$admin){
          $validation = $request->validate([
            'user'=>'required'
          ],["user.required"=>"user does not exit"]);
       }
         Session::put('admin',$admin);
        return redirect('dashboard');
       
       
    }

     function dashboard(){
      $admin = Session::get('admin');
      
       if($admin){
         return view('admin',['name'=>$admin->name]);
       }
       else{
        return redirect('admin-login');
       }
     }
}
