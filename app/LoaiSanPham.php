<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiSanPham extends Model
{
    //
    protected $table = "loaisanpham";

    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 500; 
    protected $dontKeepRevisionOf = array(
    'loaisanpham_url'
    );

    public static function boot()

    {
        parent::boot();
    }

    public function sanpham(){
    	return $this->hasMany("App\SanPham","loaisanpham_id","id");
    }

    public function nhom(){
    	return $this->belongsTo("App\Nhom","nhom_id","id");
    }

}
