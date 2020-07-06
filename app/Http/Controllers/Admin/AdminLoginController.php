<?php

namespace App\Http\Controllers\Admin;
use App\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SanPham;
class AdminLoginController extends Controller
{


    public function getDangNhapAdmin(){
    	if (Auth::guard('admin')->user()) {
    		return redirect('admin/trangchu');
    	} else {
            return view('admin.login');
        }
        
    }

    public function postDangNhapAdmin(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required',
                'g-recaptcha-response'=>'required|recaptcha'
            ],
            [
                'email.required' => 'Ban chưa nhập email',
                'password.required' => 'Ban chưa nhập mật khẩu',
                
            ]);

        if (Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])) {
            return redirect('admin/trangchu');
        } else {
            return redirect('admin/login')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangXuatAdmin(){
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }

    // public function history(){
    //     $sanpham = SanPham::all();
    //     $history = $sanpham->revisionHistory;
    //     return view('revision',['sanpham'=>$sanpham]);
    // }
}