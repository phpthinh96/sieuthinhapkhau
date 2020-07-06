<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinhTrangDonHang extends Model
{
    //
    protected $table = "tinhtrangdonhang";

    public function donhang(){
    	return $this->hasMany("App\DonHang","tinhtrangdonhang_id","id");
    }
}
