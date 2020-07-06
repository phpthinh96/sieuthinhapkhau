<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;

class AjaxController extends Controller
{
    //
    public function getLoaiSanPham($nhom_id){
    	$loaisanpham = LoaiSanPham::where('nhom_id',$nhom_id)->get();
    	foreach ($loaisanpham as $lsp) {
    		echo "<option value='".$lsp->id."'>".$lsp->loaisanpham_ten."</option>";
    	}
    }
}
