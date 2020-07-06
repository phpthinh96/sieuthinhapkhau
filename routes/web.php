<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Frontend
Route::get('/','PagesController@getHome');
Route::get('lienhe','PagesController@getLienHe');
Route::get('dangnhap','UserController@getDangNhap');
Route::post('dangnhap','UserController@postDangNhap');
Route::get('dangky','UserController@getDangKy');
Route::post('dangky','UserController@postDangKy');
Route::get('dangxuat','UserController@getDangXuat');
Route::get('nguoidung','UserController@getNguoiDung');
Route::post('nguoidung','UserController@postNguoiDung');
Route::get('loaisanpham/{id}/{url}.html','PagesController@getLoaiSanPham');
Route::get('sanpham/{id}/{url}.html','PagesController@getSanPham');
Route::get('search','PagesController@getSearch');
Route::get('giohang', 'PagesController@getGioHang');
Route::get('giohang/them/{id}', 'PagesController@themGioHang');
Route::get('giohang/xoa/{id}', 'PagesController@xoaGioHang');
Route::get('giohang/sua', 'PagesController@suaGioHang');
Route::post('ykien','PagesController@postYKien');

Route::group(['middleware'=>'userLogin'],function(){
	Route::get('thanhtoan','PagesController@getThanhToan');
	Route::post('thanhtoan','PagesController@postThanhToan');
	Route::get('thankyou','PagesController@thankyou');
	Route::post('binhluan/{id}','PagesController@postBinhLuan');
	Route::get('lich-su-mua-hang/{id}/danhsach.html','PagesController@lichsumuahang');
});

	
// use App\Admin;
// Route::get('themdulieu',function(){
// 	$user = new Admin;
// 	$user->name = 'Admin';
// 	$user->email = 'admin@gmail.com';
// 	$user->password = bcrypt('123456');
// 	$user->save();
// });


// Backend
Route::get('admin/login','Admin\AdminLoginController@getDangNhapAdmin');
Route::post('admin/login','Admin\AdminLoginController@postDangNhapAdmin');
Route::get('admin/logout','Admin\AdminLoginController@getDangXuatAdmin');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::get('trangchu','TrangChuController@getTrangChu');
	Route::group(['prefix'=>'nhacungcap'],function(){

		Route::get('danhsach','NhaCungCapController@getDanhSach');

		Route::get('them','NhaCungCapController@getThem');
		Route::post('them','NhaCungCapController@postThem');

		Route::get('sua/{id}','NhaCungCapController@getSua');
		Route::post('sua/{id}','NhaCungCapController@postSua');

		Route::get('xoa/{id}','NhaCungCapController@getXoa');

		Route::get('lich-su-hoat-dong/{id}','NhaCungCapController@lichsu');

	});

	Route::group(['prefix'=>'nhom'],function(){

		Route::get('danhsach','NhomController@getDanhSach');

		Route::get('them','NhomController@getThem');
		Route::post('them','NhomController@postThem');

		Route::get('sua/{id}','NhomController@getSua');
		Route::post('sua/{id}','NhomController@postSua');

		Route::get('xoa/{id}','NhomController@getXoa');

		Route::get('lich-su-hoat-dong/{id}','NhomController@lichsu');

	});

	Route::group(['prefix'=>'loaisanpham'],function(){

		Route::get('danhsach','LoaiSanPhamController@getDanhSach');

		Route::get('them','LoaiSanPhamController@getThem');
		Route::post('them','LoaiSanPhamController@postThem');

		Route::get('sua/{id}','LoaiSanPhamController@getSua');
		Route::post('sua/{id}','LoaiSanPhamController@postSua');

		Route::get('xoa/{id}','LoaiSanPhamController@getXoa');

		Route::get('lich-su-hoat-dong/{id}','LoaiSanPhamController@lichsu');

	});

	Route::group(['prefix'=>'donvitinh'],function(){

		Route::get('danhsach','DonViTinhController@getDanhSach');

		Route::get('them','DonViTinhController@getThem');
		Route::post('them','DonViTinhController@postThem');

		Route::get('sua/{id}','DonViTinhController@getSua');
		Route::post('sua/{id}','DonViTinhController@postSua');

		Route::get('xoa/{id}','DonViTinhController@getXoa');

	});

	Route::group(['prefix'=>'sanpham'],function(){

		Route::get('danhsach','SanPhamController@getDanhSach');

		Route::get('them','SanPhamController@getThem');
		Route::post('them','SanPhamController@postThem');

		Route::get('sua/{id}','SanPhamController@getSua');
		Route::post('sua/{id}','SanPhamController@postSua');

		Route::get('xoa/{id}','SanPhamController@getXoa');

		Route::get('lich-su-hoat-dong/{id}','SanPhamController@lichsu');

	});

	Route::group(['prefix'=>'ajax'],function(){

		Route::get('loaisanpham/{nhom_id}','AjaxController@getLoaiSanPham');
	});

	Route::group(['prefix'=>'slide'],function(){

		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('xoa/{id}','SlideController@getXoa');



	});

	Route::group(['prefix'=>'user'],function(){

		Route::get('danhsach','UserController@getDanhSach');

		Route::get('them','UserController@getThem');
		Route::post('them','UserController@postThem');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::get('xoa/{id}','UserController@getXoa');

		Route::get('lich-su-mua-hang/{id}','UserController@getLichSu');

	});

	
   Route::group(['prefix'=>'donhang'],function(){

        Route::get('danhsach','DonHangController@getDanhSach');

        Route::get('sua-thong-tin-giao-hang/{id}','DonHangController@getSuaGiaoHang');
        Route::post('sua-thong-tin-giao-hang/{id}','DonHangController@postSuaGiaoHang');

        Route::get('sua-thong-tin-thanh-toan/{id}','DonHangController@getSuaThanhToan');
        Route::post('sua-thong-tin-thanh-toan/{id}','DonHangController@postSuaThanhToan');

        Route::get('xem-don-hang/{id}','DonHangController@getSuaTinhTrang');
        Route::post('xem-don-hang/{id}','DonHangController@postSuaTinhTrang');

        Route::get('xoa/{id}','DonHangController@getXoa');

        Route::get('in-hoa-don/{id}','DonHangController@pdf');

    });

   	Route::group(['prefix'=>'binhluan'],function(){

		Route::get('danhsach','BinhLuanController@getDanhSach');

		Route::get('chap-nhan/{id}','BinhLuanController@getChapNhan')->name('chapnhan');
		Route::get('khong-chap-nhan/{id}','BinhLuanController@getKhongChapNhan')->name('khongchapnhan');

		Route::get('xoa/{id}','BinhLuanController@getXoa');

	});

    Route::group(['prefix'=>'khohang'],function(){

        Route::get('danhsach','KhoHangController@getDanhSach');
        Route::get('san-pham-nhap-vao','KhoHangController@getSanPhamNhapVao');
        Route::get('san-pham-da-ban','KhoHangController@getSanPhamDaBan');
        Route::get('san-pham-hien-tai','KhoHangController@getSanPhamHienTai');
        Route::get('san-pham-ban-chay','KhoHangController@getSanPhamBanChay');
        Route::get('san-pham-ton-nhieu','KhoHangController@getSanPhamTonNhieu');
   		

    });
	
});



