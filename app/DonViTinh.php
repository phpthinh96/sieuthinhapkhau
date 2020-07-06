<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonViTinh extends Model
{
    //
	protected $table = "donvitinh";

	public function sanpham(){
		return $this->hasMany("App\SanPham","donvitinh_id","id");
	}
}
