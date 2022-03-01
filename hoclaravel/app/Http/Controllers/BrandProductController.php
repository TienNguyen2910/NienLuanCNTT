<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use DB,Session;

session_start();

class BrandProductController extends Controller
{
    public function brand(){
        if(session()->has('username_nv')){
            $list_brand=DB::table('thuonghieu')->get();
            return view('admin.brand_product')->with('list_brand',$list_brand);
        }
        else return view('admin.admin_login');
    }
    
    public function add_brand(){
        if(session()->has('username_nv')){
            return view('admin.add_brand');
        }
        else return view('admin.admin_login');
    }
    
    public function store_brand(Request $request){
        $data= array();
        $data['ten_th']=$request->name_brand;
        $data['trangthai_th']=$request->tt;
        
        $result=DB::table('thuonghieu')->insert($data);
        if($result){
            return redirect('brand-product');
        }
        else{
            Session:put('message','Thêm danh mục sản phẩm bị lỗi');
            return redirect('add-brand-product');
        }
    }
    
    public function edit_brand($brand_id){
        if(session()->has('username_nv')){
            $edit=DB::table('thuonghieu')->where('id_th',$brand_id)->get();
            return view('admin.edit_brand')->with('edit',$edit);
        }
        else return view('admin.admin_login');
    }
    
    public function delete_brand($brand_id){
        if(session()->has('username_nv')){
            DB::table('thuonghieu')->where('id_th',$brand_id)->delete();
            return redirect('brand-product');
        }
        else return view('admin.admin_login');
    }
    
    public function update_brand(Request $request,$brand_id){
        if(session()->has('username_nv')){
            $data = array();
            $data['ten_th']= $request->name_brand;
            $data['trangthai_th']= $request->tt;
            DB::table('thuonghieu')->where('id_th',$brand_id)->update($data);
            return redirect('brand-product');
        }
        else return view('admin.admin_login');
    }
    
}
