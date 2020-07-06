<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThongKe extends Model
{
    //
    protected $table = "thongke";

    
    public function sanpham(){
    	return $this->belongsTo("App\SanPham","sanpham_id","id");
    }
}
