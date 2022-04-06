<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

session_start();
class AdminOrderController extends Controller
{
    public function manage_order(){
        if(session()->has('username_nv')){
            $list_orders = DB::table('donhang')->join('khachhang','khachhang.id_kh','=','donhang.id_kh')
            ->select('id_dh','ngaydat_dh','noigiao_dh','tongtien_dh','trangthai_dh','huy_dh','pthuctt','ht_kh','sdt_kh')->get();
            return view('admin.manage_order',['list_orders' => $list_orders]);
        }
        else return redirect('admin_login');
    }
    
    public function cancel_order($order_id){
        if(Session::has('username_nv')){
            $result=DB::table('ctdonhang')->where('id_dh',$order_id)->delete();
            if($result){
                DB::update("update donhang set trangthai_dh = ? where id_dh = ?",[-1,$order_id]);
                return redirect('manage-order');
            }
        }
        else return redirect('admin_login');
    }

    public function detail_order($order_id){
        if(Session::has('username_nv')){
            $order=db::table('donhang')->join('khachhang','khachhang.id_kh','=','donhang.id_kh')->where('id_dh',$order_id)
            ->select('id_dh','ht_kh','sdt_kh','email_kh','ngaydat_dh','noigiao_dh','tongtien_dh','trangthai_dh','pthuctt')->get();
            return view('admin.detail_order',['order' => $order]);
        }
        else return redirect('/admin_login');
    }

    public function inspect_order(Request $request,$order_id){
        if(Session::has('username_nv')){
            $trangthai=$request->tt;
            //echo $trangthai;
            DB::update('update donhang set trangthai_dh = ? where id_dh = ?',[$trangthai,$order_id]);
            return redirect('manage-order');
        }
        else return redirect('admin_login');
    }
}
