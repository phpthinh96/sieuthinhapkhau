<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Nhom;
use App\Slide;
use App\SanPham;
use App\ThongKe;

use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $nhom = Nhom::all();
        $slide = Slide::all();
        $sanphammoi = SanPham::latest('updated_at')->skip(0)->take(4)->get();
        $sanphammoi1 = SanPham::latest('updated_at')->skip(4)->take(4)->get();
        $sanphammoi2 = SanPham::latest('updated_at')->skip(8)->take(4)->get();
        $sanphamnoibat = SanPham::where('sanpham_noi_bat',1)->latest('updated_at')->skip(0)->take(6)->get();
        $sanphamnoibat1 = SanPham::where('sanpham_noi_bat',1)->latest('updated_at')->skip(6)->take(6)->get();
        $sanphamnoibat2 = SanPham::where('sanpham_noi_bat',1)->latest('updated_at')->skip(12)->take(6)->get();
        $sanphambanchay = ThongKe::join('sanpham','thongke.sanpham_id','=','sanpham.id')->selectRaw('sanpham_id,sanpham_gia_khuyen_mai,sanpham_gia,sanpham_ten,sanpham_url,sanpham_anh, sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id','sanpham_gia_khuyen_mai','sanpham_gia','sanpham_ten','sanpham_url','sanpham_anh')->orderBy('so_luong_da_ban','DESC')->skip(0)->take(6)->get();
        $sanphambanchay1 = ThongKe::join('sanpham','thongke.sanpham_id','=','sanpham.id')->selectRaw('sanpham_id,sanpham_gia_khuyen_mai,sanpham_gia,sanpham_ten,sanpham_url,sanpham_anh, sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id','sanpham_gia_khuyen_mai','sanpham_gia','sanpham_ten','sanpham_url','sanpham_anh')->orderBy('so_luong_da_ban','DESC')->skip(6)->take(6)->get();
        $sanphambanchay2 = ThongKe::join('sanpham','thongke.sanpham_id','=','sanpham.id')->selectRaw('sanpham_id,sanpham_gia_khuyen_mai,sanpham_gia,sanpham_ten,sanpham_url,sanpham_anh, sum(thongke_so_luong_da_ban) as so_luong_da_ban')->groupBy('sanpham_id','sanpham_gia_khuyen_mai','sanpham_gia','sanpham_ten','sanpham_url','sanpham_anh')->orderBy('so_luong_da_ban','DESC')->skip(12)->take(6)->get();
        
        
        view()->share('nhom',$nhom);
        view()->share('slide',$slide);
        view()->share('sanphammoi',$sanphammoi);
        view()->share('sanphammoi1',$sanphammoi1);
        view()->share('sanphammoi2',$sanphammoi2);
        view()->share('sanphamnoibat',$sanphamnoibat);
        view()->share('sanphamnoibat1',$sanphamnoibat1);
        view()->share('sanphamnoibat2',$sanphamnoibat2);
        view()->share('sanphambanchay',$sanphambanchay);
        view()->share('sanphambanchay1',$sanphambanchay1);
        view()->share('sanphambanchay2',$sanphambanchay2);

        // Validator::extend('recaptcha', 'App\Validators\ReCaptcha@validate');
    
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
