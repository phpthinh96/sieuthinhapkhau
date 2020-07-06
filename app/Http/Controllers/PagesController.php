<?php

namespace App\Http\Controllers;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\SanPham;
use App\User;
use App\ThongKe;
use App\DonHang;
use App\ChiTietDonHang;
use App\Nhom;
use App\BinhLuan;
use App\YKien;

class PagesController extends Controller
{
    //
    function getHome(){
        


    	return view('pages.home');
    }

    function getLienHe(){
    	return view('pages.lienhe');
    }

    

    public function getGioHang(){
        $cartItem = Cart::content();
        return view('pages.giohang',['cartItem'=>$cartItem]);
    }

    public function themGioHang(Request $request,$id){
        $slht = ThongKe::where('sanpham_id',$id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
        $sanpham = SanPham::find($id);
        $cartItem = Cart::content();
        foreach ($cartItem as $item) {
        if ($sanpham->id == $item->id) {
                if ($item->qty == $slht->thongke_so_luong_hien_tai) {
                           return back()->with('thongbao','Không thể mua quá số lượng còn lại');
                }        
            }   
        } 
        
        if ($sanpham->sanpham_gia_khuyen_mai > 0) {
            Cart::add(['id' => $sanpham->id, 'name' => $sanpham->sanpham_ten, 'qty' => 1, 'price' => $sanpham->sanpham_gia_khuyen_mai, 'options' => ['anh' => $sanpham->sanpham_anh, 'kho' => $slht->thongke_so_luong_hien_tai, 'sanpham_url' => $sanpham->sanpham_url, 'dvt' => $sanpham->donvitinh->donvitinh_ten]]);
        } else {
            Cart::add(['id' => $sanpham->id, 'name' => $sanpham->sanpham_ten, 'qty' => 1, 'price' => $sanpham->sanpham_gia,'options' => ['anh' => $sanpham->sanpham_anh, 'kho' => $slht->thongke_so_luong_hien_tai, 'sanpham_url' => $sanpham->sanpham_url, 'dvt' => $sanpham->donvitinh->donvitinh_ten] ]);
        }
        
        if ($request->search) {
            return back()->with('search',$search);
        }
        
        return back();
    }

    public function xoaGioHang($id){
        Cart::remove($id);
        return back();
    }

    public function suaGioHang(Request $request){
       
        $qty = $request->newQty;
        $rowId = $request->rowId;

        Cart::update($rowId,$qty);    
        
    }

    public function getThanhToan(){

        if (Auth::check()) {
            if (Cart::count() > 0) {
                $cartItem = Cart::content(); 
                return view('pages.thanhtoan',['cartItem'=>$cartItem]);
            } else {
                return redirect('/');
            }
            
        } else {
            return redirect('dangnhap');
        }
    }

    public function postThanhToan(Request $request){
        $this->validate($request,
            [
                'donhang_nguoi_nhan' => 'required',
                'donhang_nguoi_nhan_email' => 'required|email',
                'donhang_nguoi_nhan_sdt' => 'required|numeric',
                'donhang_nguoi_nhan_dia_chi' => 'required',
            ],
            [
                'donhang_nguoi_nhan.required' => 'Bạn chưa nhập họ tên',
                'donhang_nguoi_nhan_email.required' => 'Bạn chưa nhập email',
                'donhang_nguoi_nhan_email.email' => 'Email không đúng định dạng',
                'donhang_nguoi_nhan_sdt.required' => 'Bạn chưa nhập số điện thoại',
                'donhang_nguoi_nhan_sdt.numeric' => 'Số điện thoại không đúng định dạng',
                'donhang_nguoi_nhan_dia_chi.required' => 'Bạn chưa nhập địa chỉ',

            ]);
        $donhang = new DonHang;
        $donhang->donhang_nguoi_nhan = $request->donhang_nguoi_nhan;
        $donhang->donhang_nguoi_nhan_email = $request->donhang_nguoi_nhan_email;
        $donhang->donhang_nguoi_nhan_sdt = $request->donhang_nguoi_nhan_sdt;
        $donhang->donhang_nguoi_nhan_dia_chi = $request->donhang_nguoi_nhan_dia_chi;
        if ($request->donhang_ghi_chu) {
            $donhang->donhang_ghi_chu = $request->donhang_ghi_chu;
        } else {
            $donhang->donhang_ghi_chu = "";
        }
        $donhang->donhang_tong_tien_truoc_thue = Cart::subtotal();
        $donhang->donhang_tax =  Cart::tax();
        $donhang->donhang_tong_tien = Cart::total();
        $donhang->user_id = Auth::user()->id;
        $donhang->tinhtrangdonhang_id = 1;
        $donhang->save();

        $cartItem = Cart::content();
        foreach ($cartItem as $item) {
            $chitietdonhang = new ChiTietDonHang;
            $chitietdonhang->sanpham_id = $item->id;
            $chitietdonhang->donhang_id = $donhang->id;;
            $chitietdonhang->chitietdonhang_don_gia = $item->price;
            $chitietdonhang->chitietdonhang_so_luong = $item->qty;
            $chitietdonhang->chitietdonhang_thanh_tien = $item->qty * $item->price;
            $chitietdonhang->save();
        }
        
        Cart::destroy();
        return redirect('thankyou');

        
    }

    function thankyou(){
        return view('pages.thankyou');
    }

    function getLoaiSanPham($id){
        $loaisanpham = LoaiSanPham::find($id);
        $sanpham = SanPham::where('loaisanpham_id',$loaisanpham->id)->latest('updated_at')->paginate(9);
        return view('pages.loaisanpham',['loaisanpham'=>$loaisanpham,'sanpham'=>$sanpham]);
    }

    function getSanPham($id){
        $sanpham = SanPham::where('id',$id)->first();
        $binhluan = BinhLuan::where([['sanpham_id',$id],['binhluan_trang_thai',1]])->latest('created_at')->paginate(5);
        $sanphamlienquan = SanPham::where('loaisanpham_id',$sanpham->loaisanpham_id)->skip(0)->take(4)->get();
        $sanphamlienquan1 = SanPham::where('loaisanpham_id',$sanpham->loaisanpham_id)->skip(4)->take(4)->get();
        $sanphamlienquan2 = SanPham::where('loaisanpham_id',$sanpham->loaisanpham_id)->skip(8)->take(4)->get();
        return view('pages.sanpham',['sanpham'=>$sanpham,'binhluan'=>$binhluan, 'sanphamlienquan'=>$sanphamlienquan, 'sanphamlienquan1'=>$sanphamlienquan1, 'sanphamlienquan2'=>$sanphamlienquan2]);
    }

    function postBinhLuan(Request $request,$id){
        $sanpham = SanPham::find($id);
        $binhluan = new BinhLuan;
        $binhluan->binhluan_noi_dung = $request->binhluan_noi_dung;
        $binhluan->sanpham_id = $id;
        $binhluan->user_id = Auth::user()->id;
        $binhluan->binhluan_trang_thai = 0;

        $binhluan->save();

        return back()->with('binhluan','Đăng bình luận thành công, đang chờ duyệt...');   
    }

    function getSearch(Request $request){
        $search = $request->search;
        if ($search == '') {
            return view('pages.home');
        } else {
            $sanpham = SanPham::where('sanpham_ten', 'like', '%' . $search . '%')->paginate(9);
            return view('pages.search', ['ketqua' => 'Từ khóa: ' . $search,'sanpham' => $sanpham]);
        }
    }

    function postYKien(Request $request){
        
        $ykien = new YKien;
        $ykien->ten = $request->name;
        $ykien->email = $request->email;
        $ykien->ykien = $request->message;
        $ykien->save();

        return back()->with('thongbao','Gửi thành công');
    }

    function lichsumuahang($id){
        $user = User::find($id);
        $donhang = DonHang::where('user_id',$user->id)->latest('created_at')->get();

        return view('pages.lichsumuahang',['user'=>$user,'donhang'=>$donhang]);
    }
}
