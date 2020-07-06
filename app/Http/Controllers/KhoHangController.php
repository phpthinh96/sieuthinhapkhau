<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ThongKe;
use App\SanPham;

class KhoHangController extends Controller
{
    //

    public function getDanhSach(){
    	$thongke = ThongKe::selectRaw('sum(thongke_so_luong_nhap) as so_luong_nhap, sum(thongke_so_luong_da_ban) as so_luong_da_ban')->get();
 
    	$bannhieu = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id')->orderBy('so_luong_da_ban','DESC')->get();
        $sanpham = SanPham::all();
        foreach ($sanpham as $sp) {
            $slht[] = ThongKe::where('sanpham_id',$sp->id)->selectRaw('sanpham_id,thongke_so_luong_hien_tai')->latest('updated_at')->first();
        }


        
    	$tonnhieu = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban, (sum(thongke_so_luong_nhap) - sum(thongke_so_luong_da_ban)) as so_luong_hien_tai')->groupBy('sanpham_id')->orderBy('so_luong_hien_tai','DESC')->get();

    	return view('admin.khohang.tongquan',['thongke'=>$thongke,'bannhieu'=>$bannhieu,'tonnhieu'=>$tonnhieu]); 
    }

    public function getSanPhamNhapVao(){
	    $sanphamnhapvao = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id')->get();
	    return view('admin.khohang.sanphamnhapvao',['sanphamnhapvao'=>$sanphamnhapvao]);
    }

    public function getSanPhamDaBan(){
    	$sanphamdaban = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id')->get();
    	return view('admin.khohang.sanphamdaban',['sanphamdaban'=>$sanphamdaban]);
    }

    public function getSanPhamHienTai(){
    	$sanphamhientai = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id')->get();
	    return view('admin.khohang.sanphamhientai',['sanphamhientai'=>$sanphamhientai]);
    }

    public function getSanPhamBanChay(){
    	$title = 'Sản phẩm bán chạy';
	    $data = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id')->orderBy('so_luong_da_ban','DESC')->get();
	   	
	    return view('admin.khohang.sanpham1',['data'=>$data,'title'=>$title]);
    }

    public function getSanPhamTonNhieu(){
    	$title = 'Sản phẩm tồn nhiều';
    	$data = ThongKe::selectRaw('sanpham_id,sum(thongke_so_luong_nhap) as so_luong_nhap,sum(thongke_so_luong_da_ban) as so_luong_da_ban,sum(thongke_so_luong_hien_tai) as so_luong_hien_tai')->orderBy('so_luong_hien_tai','DESC')->groupBy('sanpham_id')->get();
    	return view('admin.khohang.sanpham1',['data'=>$data,'title'=>$title]);
    }
}
