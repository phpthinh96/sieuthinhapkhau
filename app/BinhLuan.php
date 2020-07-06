<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = "binhluan";

    public function user(){
    	return $this->belongsTo("App\User","user_id","id");
    }

    public function sanpham(){
    	return $this->belongsTo("App\SanPham","sanpham_id","id");
    }
}
