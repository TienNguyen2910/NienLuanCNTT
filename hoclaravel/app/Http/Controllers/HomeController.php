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
        return view('all_products')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function sort_low_to_high(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->orderBy('dongia_sp','asc')->get();
        return view('all_products')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function sort_high_to_low(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->orderBy('dongia_sp','desc')->get();
        return view('all_products')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function product_detail($product_id){
        $product=DB::table('sanpham')->join('motasp','sanpham.id_sp','=','motasp.id_sp')
        ->select('sanpham.id_sp','ten_sp','soluong_sp','dongia_sp','dongiagoc_sp','hinhanh_sp','thanhphan_mt','khoiluong_mt','hdsd_mt','hansd_mt')->where('sanpham.id_sp',$product_id)->get();
        $image=DB::table('hinhanhmotasp')->where('id_sp',$product_id)->get();
        return view('product_detail')->with('product',$product)->with('image',$image);
        // echo "<pre>";
        // print_r($product);
        // echo "</pre>";
    }

    public function search_product_brand($brand_id){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->where('id_th',$brand_id)->get();
        return view('search_product_brand')->with('list_brands',$list_brands)->with('products',$products);
    }

    public function search_product(Request $request){
        $name_pro=$request->name_pro;
        $product=DB::table('sanpham')->where('ten_sp','like',"%{$name_pro}%")->get();
        return view('search_product')->with('product',$product);
    }

    public function new_product(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('sanpham')->orderBy('id_sp','desc')->limit(5)->get();
        return view('all_products',['list_brands'=> $list_brands ,'products'=>$products]);
    }

    public function best_sell(){
        $list_brands=DB::table('thuonghieu')->get();
        $products=DB::table('ctdonhang')->join('sanpham','ctdonhang.id_sp','=','sanpham.id_sp')
            ->select('ctdonhang.id_sp',DB::raw('SUM(soluong_ct) as tongsl'),'ten_sp','dongia_sp','dongiagoc_sp','hinhanh_sp')
            ->groupBy('ctdonhang.id_sp','ten_sp','dongia_sp','dongiagoc_sp','hinhanh_sp')
            ->orderBy('tongsl','desc')->take(3)->get();
        return view('all_products',['list_brands'=> $list_brands ,'products'=>$products]);
    }
}
