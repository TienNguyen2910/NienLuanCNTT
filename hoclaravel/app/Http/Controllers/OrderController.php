<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use DB,Session;

class OrderController extends Controller
{
    public function order(Request $request){
        if(session()->has('client')){
            $idsp=$request->idsp;
            return view('order',['idsp'=> $idsp]);
        }
        else return redirect('login-client');
    }

    public function checkout(Request $request){
        if(session()->has('client')){
            $id_kh = Session::get('id_client');	
            $ngaydat_dh = Carbon::now();	
            $noigiao_dh = $request->address;
            $total = $request->total;
            $trangthai_dh = 0;
            $pthuctt = $request->paymentMethod;
            //echo "idkh = ".$id_kh.", ngay dat: ".$ngaydat_dh."noi giao: ".$noigiao_dh." , phuong thuc thanh toan: ".$pthuctt."<br>ong tien = ".$total;
            $result = DB::table('donhang')->insert([
                                                'id_kh'=> $id_kh,
                                                'ngaydat_dh'=>$ngaydat_dh,
                                            	'noigiao_dh'=>$noigiao_dh,
                                            	'tongtien_dh'=>$total,
                                            	'trangthai_dh'=>$trangthai_dh,
                                            	'pthuctt'=>$pthuctt
            ]);
            if($result){
                $id_dh = DB::getPdo()->lastInsertId();
                $idsp = $request->idsp;
                foreach($idsp as $key => $value){
                    $sql =DB::table('sanpham')->join('giohang','giohang.id_sp','=','sanpham.id_sp')
                    ->select('soluong','dongia_sp','soluong_sp')->where('sanpham.id_sp',$value)->get();
                    foreach($sql as $key => $row){
                        $sl= $row->soluong;
                        $dg=$row->dongia_sp;
                        $cap_sl = $row->soluong_sp - $row->soluong;
                        //echo "so luong = ".$sl."<br> don gia = ".$dg."<br> cap nhat so luong = ".$cap_sl;
                        DB::table('ctdonhang')->insert([
                            'id_dh' => $id_dh,
                            'id_sp' => $value,	
                            'soluong_ct' =>$sl,	
                            'dongia' =>$dg
                        ]);
                    }
                    DB::update('update sanpham set soluong_sp = ? where id_sp = ?',[$cap_sl,$value]);
                }
                Session::put('thongbao','Cảm ơn bạn đã mua hàng');
                return redirect('/');
            }
        }
        else return redirect('/login-client');
    }
}
