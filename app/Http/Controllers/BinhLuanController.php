<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
class BinhLuanController extends Controller
{
    //
    public function getDanhSach(){
    	$binhluan = BinhLuan::orderBy('id','DESC')->get();
    	$binhluan0 = BinhLuan::where('binhluan_trang_thai',0)->orderBy('id','DESC')->get();
    	$binhluan1 = BinhLuan::where('binhluan_trang_thai',1)->orderBy('id','DESC')->get();

    	return view('admin.binhluan.danhsach',['binhluan'=>$binhluan,'binhluan0'=>$binhluan0,'binhluan1'=>$binhluan1]);
    }

    public function getXoa($id){
    	$binhluan = BinhLuan::find($id);
    	$binhluan->delete();

    	return redirect('admin/binhluan/danhsach')->with('thongbao','Xóa bình luận thành công');
    }

    public function getChapNhan($id){
    	$binhluan = BinhLuan::find($id);
    	$binhluan->binhluan_trang_thai = 1;
        $binhluan->save();
    	return redirect('admin/binhluan/danhsach')->with('thongbao','Duyệt bình luận thành công');
    }

    public function getKhongChapNhan($id){
    	$binhluan = BinhLuan::find($id);
    	$binhluan->binhluan_trang_thai = 0;
        $binhluan->save();
    	return redirect('admin/binhluan/danhsach')->with('thongbao','Hủy duyệt bình luận thành công');
    }
}
