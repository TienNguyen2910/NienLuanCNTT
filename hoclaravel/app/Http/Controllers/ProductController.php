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
            $list_brand=DB::table('thuonghieu')->get();  // lấy tất cả thương hiệu để dùng thêm vào sản phẩm
            return view('admin.add_product')->with('list_brand',$list_brand);
        }
        else return view('admin.admin_login');
    }
    
    public function store_product(Request $request){
        $data= array();
        $data['ten_sp']=$request->name_product;
        $data['dongia_sp']=$request->price;
        $data['soluong_sp']=$request->amount;

        $hinh=$request->file('image'); //lay file anh ve
        $data['hinhanh_sp']=$hinh->getClientOriginalName(); // lay ten goc  cua no
        $hinh->move('admin_frontend/img/', $hinh->getClientOriginalName());

        $data['mota_sp']=$request->description;
        $data['id_th']=$request->brand;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $result=DB::table('sanpham')->insert($data);
        if($result){
            $idsp=DB::getPdo()->lastInsertId(); // Hàm lấy id mới insert
            //echo $idsp;
            $hinhmt=$request->image_des;
            foreach($hinhmt as $key => $hmt){
                $ddan=$hmt->getClientOriginalName();
                $hmt->move('admin_frontend/img/',$ddan);
                DB::table('hinhanhmotasp')->insert(['id_sp' =>$idsp,
                'duongdan'=>$ddan]);
            }
            return redirect('product');
        }
        else{
            Session:put('message','Thêm danh mục sản phẩm bị lỗi');
            return redirect('add-product');
        }
    }
    
    public function product_detail($pro_id){
        if(session()->has('username_nv')){
            $item=DB::table('sanpham')->where('id_sp',$pro_id)->get();
            return view('admin.product_detail')->with('item',$item);
        }
        else return view('admin.admin_login');
    }
    public function store_prodetail(Request $request,$pro_id){
        $data=array();
        $data['id_sp']= $pro_id;				
        $data['thanhphan_mt']= $request->ingredient_product;
        $data['khoiluong_mt']= $request->mass;
        $data['hdsd_mt']= $request->manual;
        $data['hansd_mt']= $request->expiration;
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        $result=DB::table('motasp')->insert($data);
        if($result){
            return redirect('product');
        }
        else{
            echo "ERROR!!";
        }
    }

    public function edit_product($product_id){
        if(session()->has('username_nv')){
            $edit=DB::table('sanpham')->where('id_sp',$product_id)->get();
            $list_brand=DB::table('thuonghieu')->get();
            return view('admin.edit_product')->with('edit',$edit)->with('list_brand',$list_brand);
        }
        else return view('admin.admin_login');
    }
    
    public function delete_product($product_id){
        if(session()->has('username_nv')){
            DB::table('hinhanhmotasp')->where('id_sp',$product_id)->delete();
            DB::table('motasp')->where('id_sp',$product_id)->delete();
            DB::table('sanpham')->where('id_sp',$product_id)->delete();
            return redirect('product');
        }
        else return view('admin.admin_login');
    }
    
    public function update_product(Request $request,$product_id){
        if(session()->has('username_nv')){
            $data = array();
            $data['ten_sp']=$request->name_product;
            $data['dongia_sp']=$request->price;
            $data['soluong_sp']=$request->amount;
            $data['mota_sp']=$request->desription;

            $hinh=$request->file('image');
            $data['hinhanh_sp']=$hinh->getClientOriginalName();
            $hinh->move('/admin_frontend/img/',$hinh->getClientOriginalName());
            
            $result=DB::table('sanpham')->where('id_sp',$product_id)->update($data);
            $hinhmt=$request->image_des;
            foreach($hinhmt as $key => $hmt){
                $ddan=$hmt->getClientOriginalName();
                $hmt->move('admin_frontend/img/',$ddan);
                DB::update('update hinhanhmotasp set duongdan= ? where id_sp = ?',[$ddan,$product_id]);
            }
            return redirect('product');
        }
        else return view('admin.admin_login');
    }
}
