<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }
    public function show_dashboard(){
        if(!Session::has('username_nv')){
            return redirect('admin');
        }
        else return view('admin.admin_index');
    }
    public function show_register(){
        return view('admin.admin_register');
    }

    public function store_member(Request $request){
        $data = array();	
        $data['username_nv'] = $request->input('name');
        $data['fullname_nv'] = $request->input('fname');	
        $data['email_nv'] = $request->input('email');
        $data['password_nv'] = md5($request->input('pass'));	
        $data['phone_nv'] = $request->input('phone');	
        //$data ->save();
        $result= DB::table('nhanvien')->insert($data);
        if($result){
            return redirect('admin_login');
        }
        else{
            return redirect('admin_register');
        }
    }

    public function login(Request $request){
        $email = $request->email;
        $pass = md5($request->pass);

        $result=DB::table('nhanvien')->where('email_nv',$email)->where('password_nv',$pass)->first();
       if($result){
           Session::put('username_nv',$result->username_nv);
           Session::put('id_nv',$result->id_nv);
           return redirect('/dashboard');
       }
       else{
           Session::put('message','Email or password is wrong. Please re-fill !!');
           return redirect('admin');
       } 
    }

    public function logout(){
        Session::forget('username_nv',null);
        Session::forget('id_nv',null);
        return redirect('admin');
    }

    public function revenue(){
        if(Session::has('username_nv')){
            return view('admin.revenue');
        }
        else return redirect('admin');
    }
}
