<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

class ProductController extends Controller
{
    public function product(){
        if(session()->has('username_nv')){
            $list_product=DB::table('sanpham')->get();
            return view('admin.product')->with('list_product',$list_product);
        }
        else return view('admin.admin_login');
    }
    
    public function add_product(){
        if(session()->has('username_nv')){
            return view('admin.add_product');
        }
        else return view('admin.admin_login');
    }
    
    public function store_product(Request $request){
        $data= array();
        $data['ten_th']=$request->name_product;
        $data['trangthai_th']=$request->tt;
        
        $result=DB::table('thuonghieu')->insert($data);
        if($result){
            return redirect('product');
        }
        else{
            Session:put('message','Thêm danh mục sản phẩm bị lỗi');
            return redirect('add-product');
        }
    }
    
    public function edit_product($product_id){
        if(session()->has('username_nv')){
            $edit=DB::table('thuonghieu')->where('id_th',$product_id)->get();
            return view('admin.edit_product')->with('edit',$edit);
        }
        else return view('admin.admin_login');
    }
    
    public function delete_product($product_id){
        if(session()->has('username_nv')){
            DB::table('thuonghieu')->where('id_th',$product_id)->delete();
            return redirect('product');
        }
        else return view('admin.admin_login');
    }
    
    public function update_product(Request $request,$product_id){
        if(session()->has('username_nv')){
            $data = array();
            $data['ten_th']= $request->name_product;
            $data['trangthai_th']= $request->tt;
            DB::table('thuonghieu')->where('id_th',$product_id)->update($data);
            return redirect('product');
        }
        else return view('admin.admin_login');
    }
}
