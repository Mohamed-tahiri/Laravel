<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use DB;

class AdminController extends Controller
{
    // Login View
    function login(){
        return view('admin.login');
    }
    
    // submit login
    function submit_admin(Request $request){
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        
        $userCheck =Admin::where(['username'=>$request->username,'password'=>$request->password])->count();
        if($userCheck>0){
            return redirect('admin/dashboard');
        }else{
            return redirect('admin')->with('error','Invalid username or password !¿');
        }
    }

    //Dashboard
    function dashboard(){

        $post = DB::table('posts')->latest()->paginate(3);
        return view('admin.dashboard',compact('post'));
    }

    function create(){
        return view('admin.create');
    }

    function addPost(Request $request){
        $data = array();
        $data['title']= $request->title;
        $data['description']= $request->description;
        
        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['logo']= $image_url;
            $post = DB::table('posts')->insert($data);
            
            return redirect('admin/dashboard')->with('success','Post Created Successfully');
        }
    }

    function edit($id){
        $post = DB::table('posts')->where('id',$id)->first();
        return view('admin.edit',compact('post'));
    }

    function editPost(Request $request,$id){
        
        $old_logo = $request->old_logo;
        $data = array();
        $data['title']= $request->title;
        $data['description']= $request->description;
        
        $image = $request->file('logo');
        if($image){
            unlink($old_logo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            $data['logo']= $image_url;
            $post = DB::table('posts')->where('id',$id)->update($data);
            
            return redirect('admin/dashboard')->with('success','Post Update Successfully');
        }
    }

    function delete($id){
        $date = DB::table('posts')->where('id',$id)->first();
        $image = $date->logo;
        unlink($image);
        $product = DB::table('posts')->where('id',$id)->delete();

        return redirect('admin/dashboard')->with('success','Post delete Successfully');

    }
}
