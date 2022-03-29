<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

session_start();
class CartController extends Controller
{
    //Cập số lượng trong thẻ input
    public function store_cart(Request $request,$product_id){
        if(session()->has('client')){
            $qty=$request->qty;
            $id_kh=Session::get('id_client');
            $product=DB::table('sanpham')->join('motasp','sanpham.id_sp','=','motasp.id_sp')
                ->select('sanpham.id_sp','ten_sp','dongia_sp','dongiagoc_sp','hinhanh_sp','thanhphan_mt','khoiluong_mt','hdsd_mt','hansd_mt')->where('sanpham.id_sp',$product_id)->get();
            $image=DB::table('hinhanhmotasp')->where('id_sp',$product_id)->get();

            $res=DB::table('giohang')->where([['id_kh',$id_kh] ,['id_sp',$product_id]])->first();
            if(!$res){
                $result=DB::table('giohang')->insert(['id_sp' => $product_id, 'soluong' => $qty, 'id_kh' => $id_kh]);
                Session::put('message','Sản phẩm đã được thêm vào giỏ hàng');
                return view('product_detail')->with('product',$product)->with('image',$image);
            }
            else{
                $qty = $qty+1;
                $resu=DB::update('update giohang set soluong= ? where id_sp = ? and id_kh = ?',[$qty,$product_id,$id_kh]);
                Session::put('mess','Cập nhật số lượng sản phẩm thành công');
                return view('product_detail')->with('product',$product)->with('image',$image);  
            }
        }
        else{
            return view('login_client');
        }
    }

    public function list_item(){
        if(session()->has('client')){
            $id_kh = Session::get('id_client');
            $item_cart=DB::table('giohang')->join('sanpham','sanpham.id_sp','=','giohang.id_sp')
            ->select('id_gh','giohang.id_sp','ten_sp','soluong','dongia_sp','hinhanh_sp')->get();
            return view('list_items_in_cart',['item_cart'=> $item_cart]);
        }
        else return redirect('login-client');
    }

    public function minus_quantity(Request $request,$cart_id){
        if(session()->has('client')){
            $qty=$request->qty;
            //echo $qty.",id gio hang = ".$cart_id."<br>";
            $qty= $qty-1;
            //echo "sau khi tru : ".$qty;
            $result=DB::update('update giohang set soluong = ? where id_gh = ? ',[$qty,$cart_id]);
            return redirect('list-items');
        }
        else return redirect('login-client');
    }

    public function plus_quantity(Request $request,$cart_id){
        if(session()->has('client')){
            $qty=$request->qty;
            //echo $qty."<br>";
            $qty= $qty + 1;
            //echo "sau khi cong : ".$qty;
            $result=DB::update('update giohang set soluong = ? where id_gh = ? ',[$qty,$cart_id]);
            return redirect('list-items');   
        }
    }

    public function delete_cart($cart_id){
        if(session()->has('client')){
            $result=DB::table('giohang')->where('id_gh',$cart_id)->delete();
            return redirect('list-items');
        }
        else return redirect('login-client');
    }
}
