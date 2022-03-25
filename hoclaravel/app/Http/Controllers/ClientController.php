<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

session_start();
class ClientController extends Controller
{
    public function register(){
        return view('register_client');
    }
    public function login(){
        return view('login_client');
    }

    public function store_client(Request $request){
        $data=array();
        $data['username_kh'] = $request->username;
        $data['ht_kh'] = $request->fullname;
        $data['sdt_kh'] = $request->phone;	
        $data['email_kh'] = $request->email;	
        $data['matkhau_kh'] = md5($request->pass);
        $result=DB::table('khachhang')->insert($data);
        if($result){
            return redirect('login-client');
        }
        else return redirect('register-client');
    }

    public function handle_login(Request $request){
        $username = $request->username;
        $pass = md5($request->pass);
        //echo $username .", pass: ".$pass;
        $result=DB::table('khachhang')->where('username_kh',$username)->where('matkhau_kh',$pass)->first();
        //print_r($result);
        if($result){
            Session::put('client',$result->username_kh);
            Session::put('id_client',$result->id_kh);
            $list_brands=DB::table('thuonghieu')->get();
            $products=DB::table('sanpham')->get();
            return view('all_products')->with('list_brands',$list_brands)->with('products',$products);
        }
        else return redirect('login-client');
    }

    public function logout(){
        Session::forget('client',null);
        Session::forget('id_client',null);
        return view('login_client');
    }
}
