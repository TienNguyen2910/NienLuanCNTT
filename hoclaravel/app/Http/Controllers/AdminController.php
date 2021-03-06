<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use DB,Session;
use App\Models\Donhang;
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

    public function filter_by_date(Request $request){
        $option = $request->option;
        switch($option){
            case 'thang':{
                $chart= Donhang::select(DB::raw('MONTH(ngaydat_dh) as month, SUM(tongtien_dh) as tongtien'))->groupby('month')->get();
                foreach($chart as $key => $val){
                    $chart_data[] = array(
                        'period' =>'Th??ng '.$val->month,
                        'order' => $val->tongtien
                    );
                }
                break;
            }
            case '1nam':{
                $chart= Donhang::select(DB::raw('YEAR(ngaydat_dh) as year, SUM(tongtien_dh) as tongtien'))->groupby('year')->get();
                foreach($chart as $key => $val){
                    $chart_data[] = array(
                        'period' =>'N??m '.$val->year,
                        'order' => $val->tongtien
                    );
                }
                break;
            }
        }
        echo $data =json_encode($chart_data);
        // return view('admin.revenue',compact('idchart'));
    }
}