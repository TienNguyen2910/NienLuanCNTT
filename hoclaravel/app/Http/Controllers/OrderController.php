<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
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
}
