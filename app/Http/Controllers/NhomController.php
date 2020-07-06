<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhom;

class NhomController extends Controller
{
    //
    public function getDanhSach(){
    	$nhom = Nhom::all();
    	return view('admin.nhom.danhsach',['nhom'=>$nhom]);
    }

    public function getThem(){
    	return view('admin.nhom.them');
    }

    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'nhom_ten' => 'required|min:3|max:200|unique:nhom,nhom_ten',
    			'nhom_mo_ta' => 'required',
    			
    		],
    		[
    			'nhom_ten.required' => 'Bạn chưa nhập tên nhóm thực phẩm',
    			'nhom_ten.min' => 'Tên nhóm thực phẩm phải có độ dài từ 3 đến 200 ký tự',
    			'nhom_ten.max' => 'Tên nhóm thực phẩm phải có độ dài từ 3 đến 200 ký tự',
                'nhom_ten.unique' => 'Tên nhóm thực phẩm đã tồn tại',
    			'nhom_mo_ta.required' => 'Bạn chưa nhập mô tả cho nhóm thực phẩm',
    			
    		]);
    	$nhom = new Nhom;
    	$nhom->nhom_ten = $request->nhom_ten;
    	$nhom->nhom_mo_ta = $request->nhom_mo_ta;
    	$nhom->save();

    	return redirect('admin/nhom/them')->with('thongbao','Thêm thành công');

    }

    public function getSua($id){
    	$nhom = Nhom::find($id);
    	return view('admin.nhom.sua',['nhom'=>$nhom]);
    }

    public function postSua(Request $request, $id){
    	$this->validate($request,
    		[
    			
    			'nhom_mo_ta' => 'required',
    			
    		],
    		[
    			
    			'nhom_mo_ta.required' => 'Bạn chưa nhập mô tả cho nhóm thực phẩm',
    			
    		]);
    	$nhom = Nhom::find($id);
    	
        if ($request->change == 'on') {
            $this->validate($request,
                [
                    'nhom_ten' => 'required|min:3|max:200|unique:nhom,nhom_ten',
                ],
                [
                    'nhom_ten.required' => 'Bạn chưa nhập tên nhóm thực phẩm',
                    'nhom_ten.min' => 'Tên nhóm thực phẩm phải có độ dài từ 3 đến 200 ký tự',
                    'nhom_ten.max' => 'Tên nhóm thực phẩm phải có độ dài từ 3 đến 200 ký tự',
                    'nhom_ten.unique' => 'Tên nhóm thực phẩm đã tồn tại',
                ]);

            $nhom->nhom_ten = $request->nhom_ten;
        }
    	$nhom->nhom_mo_ta = $request->nhom_mo_ta;
    	
    	$nhom->save();

    	return redirect('admin/nhom/sua/'.$id)->with('thongbao','Cập nhật thành công');
    }

    public function getXoa($id){
    	$nhom = Nhom::find($id);
    	$nhom->delete();

    	return redirect('admin/nhom/danhsach');
    }

    public function lichsu($id){
        $nhom = Nhom::find($id);
        return view('admin.nhom.lichsuhoatdong',['nhom'=>$nhom]);
    }

}
