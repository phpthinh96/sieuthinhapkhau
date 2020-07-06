<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\Nhom;

class LoaiSanPhamController extends Controller
{
    //
    public function getDanhSach(){
    	$nhom = Nhom::all();
    	$loaisanpham = LoaiSanPham::all();
    	return view('admin.loaisanpham.danhsach',['loaisanpham'=>$loaisanpham,'nhom'=>$nhom]);
    }

    public function getThem(){
    	$nhom = Nhom::all();
    	return view('admin.loaisanpham.them',['nhom'=>$nhom]);
    }

    public function postThem(Request $request){

    	$this->validate($request,
    		[
    			'loaisanpham_ten' => 'required|min:3|max:200|unique:loaisanpham,loaisanpham_ten',
    			'loaisanpham_mo_ta' => 'required',
                'nhom_id' => 'required'
    			
    		],
    		[
    			'loaisanpham_ten.required' => 'Bạn chưa nhập tên loại sản phẩm',
    			'loaisanpham_ten.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 200 ký tự',
    			'loaisanpham_ten.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 200 ký tự',
                'loaisanpham_ten.unique' => 'Tên loại sản phẩm đã tồn tại',
    			'loaisanpham_mo_ta.required' => 'Bạn chưa nhập mô tả loại sản phẩm',
                'nhom_id.required' => 'Bạn chưa chọn nhóm thực phẩm' 
    		]);


    	$loaisanpham = new LoaiSanPham;
    	$loaisanpham->loaisanpham_ten = $request->loaisanpham_ten;
    	$loaisanpham->loaisanpham_mo_ta = $request->loaisanpham_mo_ta;
    	$loaisanpham->loaisanpham_url = changeTitle($request->loaisanpham_ten);
    	$loaisanpham->nhom_id = $request->nhom_id;
    	$loaisanpham->save();

    	return redirect('admin/loaisanpham/them')->with('thongbao','Thêm thành công');

    }

    public function getSua($id){
    	$nhom = Nhom::all();
    	$loaisanpham = LoaiSanPham::find($id);
    	return view('admin.loaisanpham.sua',['loaisanpham'=>$loaisanpham,'nhom'=>$nhom]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,
    		[
    			
    			'loaisanpham_mo_ta' => 'required',
    			
    		],
    		[
    			
    			'loaisanpham_ten.unique' => 'Tên loại sản phẩm đã tồn tại',
    			'loaisanpham_mo_ta.required' => 'Bạn chưa nhập mô tả loại sản phẩm',
    		]);

        
    	$loaisanpham = LoaiSanPham::find($id);
    	if ($request->change == 'on') {
            $this->validate($request,
                [
                    'loaisanpham_ten' => 'required|min:3|max:200|unique:loaisanpham,loaisanpham_ten',
                ],
                [
                    'loaisanpham_ten.required' => 'Bạn chưa nhập tên loại sản phẩm',
                    'loaisanpham_ten.min' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 200 ký tự',
                    'loaisanpham_ten.max' => 'Tên loại sản phẩm phải có độ dài từ 3 đến 200 ký tự',
                ]);

            $loaisanpham->loaisanpham_ten = $request->loaisanpham_ten;
            $loaisanpham->loaisanpham_url = changeTitle($request->loaisanpham_ten);
        }
    	$loaisanpham->loaisanpham_mo_ta = $request->loaisanpham_mo_ta;
    	
    	$loaisanpham->nhom_id = $request->nhom_id;
    	$loaisanpham->save();

    	return redirect('admin/loaisanpham/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id){
    	$loaisanpham = LoaiSanPham::find($id);
    	$loaisanpham->delete();

    	return redirect('admin/loaisanpham/danhsach');
    }

    public function lichsu($id){
        $loaisanpham = LoaiSanPham::find($id);
        return view('admin.loaisanpham.lichsuhoatdong',['loaisanpham'=>$loaisanpham]);
    }
}
