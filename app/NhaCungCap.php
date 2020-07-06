<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaCungCap extends Model
{
    //
    protected $table = "nhacungcap";

    use \Venturecraft\Revisionable\RevisionableTrait;

    protected $revisionCreationsEnabled = true;
    protected $revisionEnabled = true;
    protected $revisionCleanup = true;
    protected $historyLimit = 500; 
   

    public static function boot()

    {
        parent::boot();
    }

    public function sanpham(){
    	return $this->hasMany("App\SanPham","nhacungcap_id","id");
    }
}
