<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SanPham extends Model
{
    //
    protected $table = "sanpham";

   
    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 500; 
    protected $dontKeepRevisionOf = array(
    'sanpham_url'
    );

    public static function boot()

    {
        parent::boot();
    }

    

    public function binhluan(){
    	return $this->hasMany("App\BinhLuan","sanpham_id","id");
    }

    public function loaisanpham(){
    	return $this->belongsTo("App\LoaiSanPham","loaisanpham_id","id");
    }

    public function chitietdonhang(){
    	return $this->hasMany("App\ChiTietDonHang","sanpham_id","id");
    }

    public function nhacungcap(){
    	return $this->belongsTo("App\NhaCungCap","nhacungcap_id","id");
    }

    public function donvitinh(){
    	return $this->belongsTo("App\DonViTinh","donvitinh_id","id");
    }

    public function thongke(){
        return $this->hasMany("App\ThongKe","sanpham_id","id");
    }
}
