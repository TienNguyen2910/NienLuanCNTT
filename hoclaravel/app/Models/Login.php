<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $fillable = [
          'ht_kh',  'username_kh',  'diachi_kh', 'sdt_kh', 'email_kh', 'matkhau_kh'
    ];
 
    protected $primaryKey = 'id_kh';
 	protected $table = 'khachhang';
}
