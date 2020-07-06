<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    //
    protected $table = "donhang";

    public function user(){
    	return $this->belongsTo("App\User","user_id","id");
    }

    public function tinhtrangdonhang(){
    	return $this->belongsTo("App\TinhTrangDonHang","tinhtrangdonhang_id","id");
    }

    public function chitietdonhang(){
    	return $this->hasMany("App\ChiTietDonHang","donhang_id","id");
    }

    
}
