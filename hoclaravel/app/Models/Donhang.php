<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('Y-m-d');

class Donhang extends Model
{
    // HasFactory;
    public $timestamps = false;
    protected $fillable = [
          'id_kh',  'ngaydat_dh','noigiao_dh','tongtien_dh','trangthai_dh','huy_dh','pthuctt'
    ];
 
    protected $primaryKey = 'id_dh';
    protected $table = 'donhang';
}
