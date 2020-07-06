<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonViTinh;
class DonViTinhController extends Controller
{
    //
    public function getDanhSach(){
    	$donvitinh = DonViTinh::all();
    	return view('admin.donvitinh.danhsach',['donvitinh'=>$donvitinh]);
    }
    public function getThem(){
    	return view('admin.donvitinh.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'donvitinh_ten' => 'required|unique:donvitinh,donvitinh_ten',
    			
    		],
    		[
    			'donvitinh_ten.required' => 'Bạn chưa nhập đơn vị tính',
                'donvitinh_ten.unique' => 'Đơn vị tính đã tồn tại',
    			
    		]);
    	$donvitinh = new DonViTinh;
    	$donvitinh->donvitinh_ten = $request->donvitinh_ten;
    	$donvitinh->save();

    	return redirect('admin/donvitinh/them')->with('thongbao','Thêm thành công');

    }

    public function getSua($id){
    	$donvitinh = DonViTinh::find($id);
    	return view('admin.donvitinh.sua',['donvitinh'=>$donvitinh]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,
    		[
    			'donvitinh_ten' => 'required|unique:donvitinh,donvitinh_ten',
    			
    			
    		],
    		[
    			'donvitinh_ten.required' => 'Bạn chưa nhập đơn vị tính',
    			'donvitinh_ten.unique' => 'Đơn vị tính đã tồn tại',
    			
    			
    		]);
    	$donvitinh = DonViTinh::find($id);
    	$donvitinh->donvitinh_ten = $request->donvitinh_ten;
    	$donvitinh->save();

    	return redirect('admin/donvitinh/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id){
    	$donvitinh = DonViTinh::find($id);
    	$donvitinh->delete();

    	return redirect('admin/donvitinh/danhsach');
    }
}
