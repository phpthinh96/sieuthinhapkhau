<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NhaCungCap;

class NhaCungCapController extends Controller
{
    //
    public function getDanhSach(){
    	$nhacungcap = NhaCungCap::all();
    	return view('admin.nhacungcap.danhsach',['nhacungcap'=>$nhacungcap]);
    }

    public function getThem(){
    	return view('admin.nhacungcap.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'nhacungcap_ten' => 'required|min:3|max:200|unique:nhacungcap,nhacungcap_ten',
    			'nhacungcap_dia_chi' => 'required',
    			'nhacungcap_sdt' => 'required|numeric'
    		],
    		[
    			'nhacungcap_ten.required' => 'Bạn chưa nhập tên nhà cung cấp',
    			'nhacungcap_ten.min' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 200 ký tự',
    			'nhacungcap_ten.max' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 200 ký tự',
                'nhacungcap_ten.unique' => 'Tên nhà cung cấp đã tồn tại',
    			'nhacungcap_dia_chi.required' => 'Bạn chưa nhập địa chỉ nhà cung cấp',
    			'nhacungcap_sdt.required' => 'Bạn chưa nhập số điện thoại nhà cung cấp',
    			'nhacungcap_sdt.numeric' => 'Bạn chỉ được phép nhập số',
    			
    		]);
    	$nhacungcap = new NhaCungCap;
    	$nhacungcap->nhacungcap_ten = $request->nhacungcap_ten;
    	$nhacungcap->nhacungcap_dia_chi = $request->nhacungcap_dia_chi;
    	$nhacungcap->nhacungcap_sdt = $request->nhacungcap_sdt;
    	$nhacungcap->save();

    	return redirect('admin/nhacungcap/them')->with('thongbao','Thêm thành công');

    }

    public function getSua($id){
    	$nhacungcap = NhaCungCap::find($id);
    	return view('admin.nhacungcap.sua',['nhacungcap'=>$nhacungcap]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,
    		[
    			
    			'nhacungcap_dia_chi' => 'required',
    			'nhacungcap_sdt' => 'required|numeric'
    		],
    		[
    			
    			'nhacungcap_dia_chi.required' => 'Bạn chưa nhập địa chỉ nhà cung cấp',
    			'nhacungcap_sdt.required' => 'Bạn chưa nhập số điện thoại nhà cung cấp',
    			'nhacungcap_sdt.numeric' => 'Bạn chỉ được phép nhập số',
    			
    		]);
    	$nhacungcap = NhaCungCap::find($id);
    	
        if ($request->change == 'on') {
            $this->validate($request,
                [
                    'nhacungcap_ten' => 'required|min:3|max:200|unique:nhacungcap,nhacungcap_ten',
                ],
                [
                    'nhacungcap_ten.required' => 'Bạn chưa nhập tên nhà cung cấp',
                    'nhacungcap_ten.min' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 200 ký tự',
                    'nhacungcap_ten.max' => 'Tên nhà cung cấp phải có độ dài từ 3 đến 200 ký tự',
                    'nhacungcap_ten.unique' => 'Tên nhà cung cấp đã tồn tại',
                ]);

            $nhacungcap->nhacungcap_ten = $request->nhacungcap_ten;
        }
    	$nhacungcap->nhacungcap_sdt = $request->nhacungcap_sdt;
    	$nhacungcap->nhacungcap_dia_chi = $request->nhacungcap_dia_chi;
    	$nhacungcap->save();

    	return redirect('admin/nhacungcap/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id){
    	$nhacungcap = NhaCungCap::find($id);
    	$nhacungcap->delete();

    	return redirect('admin/nhacungcap/danhsach');
    }

    public function lichsu($id){
        $nhacungcap = NhaCungCap::find($id);
        return view('admin.nhacungcap.lichsuhoatdong',['nhacungcap'=>$nhacungcap]);
    }
}
