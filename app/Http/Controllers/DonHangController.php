<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DonHang;
use App\TinhTrangDonHang;
use App\ThongKe;
use App\ChiTietDonHang;
use PDF;

class DonHangController extends Controller
{
    //
    public function getDanhSach()
    {
    	$donhang = DonHang::all();
    	return view('admin.donhang.danhsach',['donhang'=>$donhang]);
    }

    public function getSuaTinhTrang($id){
    	$donhang = DonHang::find($id);
    	$tinhtrangdonhang = TinhTrangDonHang::all();
    	return view('admin.donhang.suatinhtrang',['donhang'=>$donhang,'tinhtrangdonhang'=>$tinhtrangdonhang]);

    }

    public function postSuaTinhTrang(Request $request, $id){
    	$donhang = DonHang::find($id);
    	$tinhtrang1 = $donhang->tinhtrangdonhang_id;
    	$tinhtrang2 = $request->tinhtrangdonhang_id;

	    if ($tinhtrang1 != $tinhtrang2 && $tinhtrang2 == 2) {

            $donhang->tinhtrangdonhang_id = $tinhtrang2;
            $donhang->save();
            $dssp = ChiTietDonHang::where('donhang_id',$id)->select('sanpham_id','chitietdonhang_so_luong')->get();
            foreach ($dssp as $sp) {
                $idTKM = ThongKe::where('sanpham_id',$sp->sanpham_id)->select('id')->latest('updated_at')->first();
                $thongke = ThongKe::find($idTKM['id']);
                $thongke->thongke_so_luong_da_ban = $thongke->thongke_so_luong_da_ban + $sp->chitietdonhang_so_luong;
                $thongke->thongke_so_luong_hien_tai = $thongke->thongke_so_luong_hien_tai - $sp->chitietdonhang_so_luong;
                $thongke->save();
            }
	    }

	    else {

	    	$donhang->tinhtrangdonhang_id = $tinhtrang2;
    		$donhang->save();
	    }
	    return redirect('admin/donhang/danhsach')->with('thongbao','Chỉnh sửa thành công');
    }

    public function getSuaGiaoHang($id){
    	$donhang = DonHang::find($id);
    	return view('admin.donhang.suagiaohang',['donhang'=>$donhang]);
    }

    public function postSuaGiaoHang(Request $request,$id){
        $this->validate($request,
            [
                'donhang_nguoi_nhan' => 'required',
                'donhang_nguoi_nhan_sdt' => 'required|numeric',
                'donhang_nguoi_nhan_email' => 'required|email',
                'donhang_nguoi_nhan_dia_chi' => 'required'
            ],
            [
                'donhang_nguoi_nhan.required' => 'Bạn chưa nhập người nhận',
                'donhang_nguoi_nhan_sdt.required' => 'Bạn chưa nhập số điện thoại',
                'donhang_nguoi_nhan_sdt.numeric' => 'Bạn chỉ được phép nhập số',
                'donhang_nguoi_nhan_email.required' => 'Bạn chưa nhập email',
                'donhang_nguoi_nhan_email.email' => 'Bạn chỉ được phép nhập email',
                'donhang_nguoi_nhan_dia_chi.required' => 'Bạn chưa nhập địa chỉ'
            ]);
    	$donhang = DonHang::find($id);
    	$donhang->donhang_nguoi_nhan = $request->donhang_nguoi_nhan;
    	$donhang->donhang_nguoi_nhan_sdt = $request->donhang_nguoi_nhan_sdt;
    	$donhang->donhang_nguoi_nhan_dia_chi = $request->donhang_nguoi_nhan_dia_chi;
        if ($request->donhang_ghi_chu != "") {
            $donhang->donhang_ghi_chu = $request->donhang_ghi_chu;
        } else {
            $donhang->donhang_ghi_chu = "";
        }
    	
    	$donhang->save();

    	return redirect('admin/donhang/danhsach')->with('thongbao','Chỉnh sửa thành công');
    }

    public function getXoa($id){
        $donhang = DonHang::find($id);
        $donhang->delete();

        return redirect('admin/donhang/danhsach')->with('thongbao','Xóa thành công');
    }


    public function pdf($id){
    	$donhang = DonHang::find($id);
    	$pdf = PDF::loadView('admin.donhang.hoadon',['donhang'=>$donhang]);
    	return $pdf->stream();
    }

    
}
