<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    //
    protected $table = "nhom";

    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 500; 
   

    public static function boot()

    {
        parent::boot();
    }

    public function loaisanpham(){
    	return $this->hasMany("App\LoaiSanPham","nhom_id","id");
    }

    public function sanpham(){
    	return $this->hasManyThrough("App\SanPham","App\LoaiSanPham","nhom_id","sanpham_id","id");
    }
}
