<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BinhLuan;
use App\User;
use App\DonHang;
use App\SanPham;
use App\ThongKe;
use App\ChiTietDonHang;
use App\YKien;

class TrangChuController extends Controller
{
    //
    public function getTrangChu(){
    	$luotbinhluan = BinhLuan::where('binhluan_trang_thai',0)->count();
    	$khachhang = User::count();
    	$donhang = DonHang::where('tinhtrangdonhang_id',1)->count();
    	$sanpham = SanPham::all()->count();
    	$thongke = ThongKe::selectRaw('sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban,month(updated_at) as thang')->groupBy('thang')->get();

	    foreach ($thongke as $row) {
	    	$thang[] = array('Tháng '.$row->thang);
	    	$nhap[] = array($row->so_luong_nhap);
	    	$ban[] = array($row->so_luong_da_ban);
	    }
    	
    	$chartjs = app()->chartjs
         ->name('barChart')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels($thang)
         ->datasets([[
             
                 'label' => 'Nhập vào',
                 'backgroundColor' => 'blue',
                 'data' => $nhap
             ],[
             
                 'label' => 'Bán ra',
                 'backgroundColor' => 'green',
                 'data' => $ban
             ],
             
         ])
         ->options([]);

         $nhapnhieu = ThongKe::join('sanpham','thongke.sanpham_id','=','sanpham.id')->selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap')->groupBy('sanpham_id')->orderBy('so_luong_nhap','DESC')->take(10)->get();
         $bannhieu = ChiTietDonHang::join('donhang','chitietdonhang.donhang_id','=','donhang.id')->where('donhang.tinhtrangdonhang_id',2)->selectRaw('sanpham_id,sum(chitietdonhang_so_luong) as so_luong_da_ban,sum(chitietdonhang_thanh_tien) as tien')->groupBy('sanpham_id')->orderBy('tien', 'DESC')->take(10)->get();
         $muanhieu = DonHang::where('tinhtrangdonhang_id',2)->selectRaw('user_id,count(user_id) as donhang,sum(donhang_tong_tien) as tien')->groupBy('user_id')->orderBy('tien', 'desc')->take(10)->get();
         $ykien = YKien::latest('created_at')->take(10)->get();

    	return view('admin.dashboard',['chartjs'=>$chartjs,'luotbinhluan'=>$luotbinhluan,'khachhang'=>$khachhang,'donhang'=>$donhang,'sanpham'=>$sanpham,'nhapnhieu'=>$nhapnhieu,'bannhieu'=>$bannhieu,'muanhieu'=>$muanhieu,'ykien'=>$ykien]);
    }
}
