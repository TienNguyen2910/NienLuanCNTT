<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Login;
use App\Models\Social; 
use Socialite; 
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

    //login facebook
    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();;
    }

    public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('id_kh',$account->user)->first();
            Session::put('client',$account_name->username_kh);
            Session::put('id_client',$account_name->id_KH);
            return redirect('/')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $hieu = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
            ]);

            $orang = Login::where('email_kh',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'username_kh' => $provider->getName(),
                    'email_kh' => $provider->getEmail(),
                    'ht_kh'=> '',
                    'diachi_kh'=> '',
                    'sdt_kh'=> '',
                    'matkhau_kh'=> ''

                ]);
            }
            $hieu->login()->associate($orang);
            $hieu->save();

            $account_name = Login::where('admin_id',$account->user)->first();

            Session::put('admin_login',$account_name->admin_name);
             Session::put('admin_id',$account_name->admin_id);
            return redirect('/login')->with('message', 'Đăng nhập Admin thành công');
        } 
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
        $result=Login::where('username_kh',$username)->where('matkhau_kh',$pass)->first();
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
        //Session::flush();
        return view('login_client');
    }
}