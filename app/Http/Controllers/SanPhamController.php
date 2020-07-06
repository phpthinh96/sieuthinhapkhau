<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nhom;
use App\LoaiSanPham;
use App\DonViTinh;
use App\NhaCungCap;
use App\SanPham;
use App\DonHang;
use App\ThongKe;
use App\BinhLuan;

use \Venturecraft\Revisionable\RevisionableTrait;

class SanPhamController extends Controller
{
    //
    public function getDanhSach(){

        $sanpham = SanPham::all();
    	return view('admin.sanpham.danhsach',['sanpham'=>$sanpham]); 
    }

    public function getThem(){
    	$nhom = Nhom::all();
    	$loaisanpham = LoaiSanPham::all();
    	$nhacungcap = NhaCungCap::all();
    	$donvitinh = DonViTinh::all();
    	return view('admin.sanpham.them',['nhom'=>$nhom,'loaisanpham'=>$loaisanpham,'nhacungcap'=>$nhacungcap,'donvitinh'=>$donvitinh]);
    }

    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'nhacungcap_id' => 'required',
    			'nhom_id' => 'required',
    			'loaisanpham_id' => 'required',
    			'sanpham_ten' => 'required|min:3|max:100|unique:sanpham,sanpham_ten',
    			'sanpham_mo_ta' => 'required',
    			'sanpham_gia' => 'required|numeric',
    			'sanpham_so_luong_nhap' => 'required|numeric',
    			'donvitinh_id' => 'required',
    			

    		],
    		[
    			'nhacungcap_id.required' => 'Bạn chưa chọn nhà cung cấp',
    			'nhom_id.required' => 'Bạn chưa chọn nhóm thực phẩm',
    			'loaisanpham_id.required' => 'Bạn chưa chọn loại sản phẩm',
    			'sanpham_ten.required' => 'Bạn chưa nhập tên sản phẩm',
    			'sanpham_ten.min' => 'Tên sản phẩm phải từ 3 đến 100 ký tự',
    			'sanpham_ten.max' => 'Tên sản phẩm phải từ 3 đến 100 ký tự',
    			'sanpham_ten.unique' => 'Tên sản phẩm đã tồn tại',
    			'sanpham_mo_ta.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
    			'sanpham_gia.required' => 'Bạn chưa nhập giá',
    			'sanpham_gia.numeric' => 'Bạn chỉ được nhập số',
    			'sanpham_so_luong_nhap.required' => 'Bạn chưa nhập số lượng nhập vào',
                'sanpham_so_luong_nhap.numeric' => 'Bạn chỉ được nhập số',
    			'donvitinh_id.required' => 'Bạn chưa chọn đơn vị tính'
    			
    		]);
        
    	$sanpham = new SanPham;
    	$sanpham->nhacungcap_id = $request->nhacungcap_id;
    	$sanpham->loaisanpham_id = $request->loaisanpham_id;
    	$sanpham->sanpham_ten = $request->sanpham_ten;
    	$sanpham->sanpham_mo_ta = $request->sanpham_mo_ta;
    	$sanpham->sanpham_gia = $request->sanpham_gia;
    	$sanpham->donvitinh_id = $request->donvitinh_id;
    	$sanpham->sanpham_url = changeTitle($request->sanpham_ten);
        if ($request->sanpham_gia_khuyen_mai) {
            $sanpham->sanpham_gia_khuyen_mai = $request->sanpham_gia_khuyen_mai;
        } 
        else
        {
            $sanpham->sanpham_gia_khuyen_mai = 0;
        }
        
        $sanpham->sanpham_noi_bat = $request->sanpham_noi_bat;
    	
		if ($request->hasFile('sanpham_anh')) {
        $file = $request->sanpham_anh;
        $filename = $file->getClientOriginalName('sanpham_anh');
        $ext = $file->getClientOriginalExtension('sanpham_anh');
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/sanpham/them')->with('loi','Bạn chỉ được upload file có đuôi jpg,png,jpeg');
            }
            else {
        $image = str_random('5').'_'.$filename;
        while(file_exists("images/sanpham/".$image)){
                $image = str_random(5)."_".$filename;
            }
        $file->move("images/sanpham",$image);
        $sanpham->sanpham_anh = $image;
            }
        }
        else {
            $sanpham->sanpham_anh = "";
        }
		$sanpham->save();
        

        $thongke = new ThongKe;
        $thongke->sanpham_id = $sanpham->id;
        $thongke->thongke_so_luong_nhap = $request->sanpham_so_luong_nhap;
        $thongke->thongke_so_luong_hien_tai = $request->sanpham_so_luong_nhap;
        $thongke->thongke_so_luong_da_ban = 0;
        $thongke->save();
        
        

    	return redirect('admin/sanpham/them')->with('thongbao','Thêm thành công');
    	
    }

    public function getSua($id){
        $nhacungcap = NhaCungCap::all();
        $nhom = Nhom::all();
        $loaisanpham = LoaiSanPham::all();
        $donvitinh = DonViTinh::all();
        $sanpham = SanPham::find($id);

        return view('admin.sanpham.sua',['nhom'=>$nhom,'loaisanpham'=>$loaisanpham,'nhacungcap'=>$nhacungcap,'donvitinh'=>$donvitinh,'sanpham'=>$sanpham]);
    }

    public function postSua(Request $request,$id){

        $this->validate($request,
            [
                'nhacungcap_id' => 'required',
                'nhom_id' => 'required',
                'loaisanpham_id' => 'required',
                
                'sanpham_mo_ta' => 'required',
                'sanpham_gia' => 'required|numeric',     
                'donvitinh_id' => 'required',
                

            ],
            [
                'nhacungcap_id.required' => 'Bạn chưa chọn nhà cung cấp',
                'nhom_id.required' => 'Bạn chưa chọn nhóm thực phẩm',
                'loaisanpham_id.required' => 'Bạn chưa chọn loại sản phẩm',    
                'sanpham_mo_ta.required' => 'Bạn chưa nhập mô tả cho sản phẩm',
                'sanpham_gia.required' => 'Bạn chưa nhập giá mua vào',
                'sanpham_gia.numeric' => 'Bạn chỉ được nhập số',
                'donvitinh_id.required' => 'Bạn chưa chọn đơn vị tính',
                
            ]);
        
        $sanpham =  SanPham::find($id);
        $sanpham->nhacungcap_id = $request->nhacungcap_id;
        $sanpham->loaisanpham_id = $request->loaisanpham_id;
        if ($request->change == 'on') {
            $this->validate($request,
                [
                    'sanpham_ten' => 'required|min:3|max:100|unique:sanpham,sanpham_ten',
                ],
                [
                    'sanpham_ten.required' => 'Bạn chưa nhập tên sản phẩm',
                    'sanpham_ten.min' => 'Tên sản phẩm phải từ 3 đến 100 ký tự',
                    'sanpham_ten.max' => 'Tên sản phẩm phải từ 3 đến 100 ký tự',
                    'sanpham_ten.unique' => 'Tên sản phẩm đã tồn tại',
                ]);

            $sanpham->sanpham_ten = $request->sanpham_ten;
            $sanpham->sanpham_url = changeTitle($request->sanpham_ten);
        }
        
        $sanpham->sanpham_mo_ta = $request->sanpham_mo_ta;
        $sanpham->sanpham_gia = $request->sanpham_gia;
        $sanpham->donvitinh_id = $request->donvitinh_id;
        
        $sanpham->sanpham_noi_bat = $request->sanpham_noi_bat;
        if ($request->sanpham_gia_khuyen_mai) {
            $sanpham->sanpham_gia_khuyen_mai = $request->sanpham_gia_khuyen_mai;
        } 
        else
        {
            $sanpham->sanpham_gia_khuyen_mai = 0;
        }
        if ($request->hasFile('sanpham_anh')) {
        $file = $request->sanpham_anh;
        $filename = $file->getClientOriginalName('sanpham_anh');
        $ext = $file->getClientOriginalExtension('sanpham_anh');
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('admin/sanpham/sua/'.$id)->with('loi','Bạn chỉ được upload file có đuôi jpg,png,jpeg');
            }
            else {
        $image = str_random('5').'_'.$filename;
        while(file_exists("images/sanpham/".$image)){
                $image = str_random(5)."_".$filename;
            }
        $file->move("images/sanpham",$image);
        unlink("images/sanpham/".$sanpham->sanpham_anh);
        $sanpham->sanpham_anh = $image;
            }
        }
        $sanpham->save();
        if ($request->sanpham_so_luong_nhap) {
            $this->validate($request,
                [
                    'sanpham_so_luong_nhap' => 'numeric',
                ],
                [
                     'sanpham_so_luong_nhap.numeric' => 'Bạn chỉ được nhập số',
                ]);

            $slht = ThongKe::where('sanpham_id',$id)->select('thongke_so_luong_hien_tai')->latest('updated_at')->first();
            $thongke = new ThongKe;
            $thongke->sanpham_id = $id;
            $thongke->thongke_so_luong_nhap = $request->sanpham_so_luong_nhap;
            $thongke->thongke_so_luong_hien_tai = $request->sanpham_so_luong_nhap + $slht['thongke_so_luong_hien_tai'];
            $thongke->thongke_so_luong_da_ban = 0;
            $thongke->save();
        }
        
       

        return redirect('admin/sanpham/sua/'.$id)->with('thongbao','Sửa thành công');
        
    }

    public function getXoa($id){
        $sanpham = SanPham::find($id);
        $sanpham->delete();

        return redirect('admin/sanpham/danhsach')->with('thongbao','Xóa thành công');
    }

    public function lichsu($id){
        $sanpham = SanPham::find($id);
        return view('admin.sanpham.lichsuhoatdong',['sanpham'=>$sanpham]);
    }
}
