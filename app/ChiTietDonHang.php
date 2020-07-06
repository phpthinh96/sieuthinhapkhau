<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    //
    protected $table = "chitietdonhang";

    public function donhang(){
    	return $this->belongsTo("App\DonHang","donhang_id","id");
    }

    public function sanpham(){
    	return $this->belongsTo("App\SanPham","sanpham_id","id");
    }

    
}
