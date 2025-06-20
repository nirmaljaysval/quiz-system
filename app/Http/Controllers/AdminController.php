<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\Category;

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

     function categories(){
      $category = Category::get();
      $admin = Session::get('admin');
      if($admin){
         return view('categories',['name'=>$admin->name],['categories'=>$category]);
       }
       else{
        return redirect('admin-login');
       }
     }

     function logout(){
      Session::forget('admin');
     return redirect('admin-login');
     }

     function addCategory(Request $request){
      //return $request;
      $validation = $request->validate(['category'=>'required | min:3 | unique:categories,name']);
        $admin= Session::get('admin');
        $category = new Category();
        $category->name= $request->category;
        $category->creator = $admin->name;
        $category->save();
        if($category->save()){
         Session::flash('message',"Successful: category ".$request->category. " added");
        }
        return back();

     }
     function deleteCategory($id){
         // return $id;
          $isDeleted = Category::find($id)->delete();
          if($isDeleted){
            Session::flash('message',"Category deleted");
            return back();
          }

     }
}
