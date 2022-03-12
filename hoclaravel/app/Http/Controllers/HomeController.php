<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,session;

class HomeController extends Controller
{
    public function index(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->get();
        return view('welcome')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function sort_low_to_high(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->orderBy('dongia_sp','asc')->get();
        return view('welcome')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function sort_high_to_low(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->orderBy('dongia_sp','desc')->get();
        return view('welcome')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function product_detail($product_id){
        $product=DB::table('sanpham')->join('motasp','sanpham.id_sp','=','motasp.id_sp')
        ->select('sanpham.id_sp','ten_sp','dongia_sp','dongiagoc_sp','hinhanh_sp','thanhphan_mt','khoiluong_mt','hdsd_mt','hansd_mt')->where('sanpham.id_sp',$product_id)->get();
        $image=DB::table('hinhanhmotasp')->where('id_sp',$product_id)->get();
        return view('product_detail')->with('product',$product)->with('image',$image);
        // echo "<pre>";
        // print_r($product);
        // echo "</pre>";
    }
}
