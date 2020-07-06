<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\DonHang;
use Cart;
class UserController extends Controller
{
    //
   



   
    public function getDanhSach(){
    	$user = User::all();
    	return view('admin.user.danhsach',['user'=>$user]);
    }

    public function getXoa($id){
    	$user = User::find($id);
    	$user->delete();

    	return redirect('admin/user/danhsach')->with('thongbao','Xóa thành công');
    }

    public function getLichSu($id){
    	$user = User::find($id);
    	$donhang = DonHang::where('user_id',$user->id)->latest('created_at')->get();
    	return view('admin.user.lichsumuahang',['user'=>$user,'donhang'=>$donhang]);
    }


    
    public function getDangKy(){
        return view('pages.dangky');
    }

    public function postDangKy(Request $request){
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'full_name' => 'required|min:3',
                'password' => 'required|min:3|max:32',
                'email' => 'required|email|unique:users,email',
                're_password' => 'required|same:password',
                'user_sdt' => 'required|numeric',
                'user_dia_chi' => 'required'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên',
                'name.min' => 'Tên phải từ 3 ký tự trở lên',
                'full_name.required' => 'Bạn chưa nhập họ tên',
                'full_name.min' => 'Họ và tên phải từ 3 ký tự trở lên',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu từ 3 ký tự trở lên',
                'password.max' => 'Mật khẩu không quá 32 ký tự',
                're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                're_password.same' => 'Nhập lại mật khẩu không đúng',
                'user_sdt.required' => 'Bạn chưa nhập số điện thoại',
                'user_sdt.numeric' => 'Bạn chỉ được nhập số',
                'user_dia_chi.required' => 'Bạn chưa nhập địa chỉ',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'Bạn chỉ được nhập email',
                'email.unique' => 'Email đã tồn tại',
                
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_sdt = $request->user_sdt;
        $user->user_dia_chi = $request->user_dia_chi;
        $user->user_anh = "";
        
        

        $user->save();

        return redirect('dangky')->with('thongbao','Đăng ký thành công');

    }

    public function getDangNhap(){
        if (Auth::user()){
            
            return redirect('/');
            
            
        } else {
            return view('pages.dangnhap');
        }
    }

    public function postDangNhap(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required',
                'g-recaptcha-response'=>'required|recaptcha'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                
            ]);
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            if (Cart::count() > 0 ){
                return redirect('thanhtoan');
            } else {
                return redirect('/');
            }
            
        } else {
            return redirect('dangnhap')->with('thongbao','Đăng nhập không thành công');
        }
    }

    public function getDangXuat(){
        Auth::logout();
        return redirect('/'); 
    }

    public function getNguoiDung(){
        $user = Auth::user();
        return view('pages.nguoidung',['user'=>$user]);
    }

    public function postNguoiDung(Request $request){
        $user = Auth::user();
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'full_name' => 'required|min:3',
                'user_sdt' => 'required|numeric',
                'user_dia_chi' => 'required',

            ],
            [
                'name.required' => 'Bạn chưa nhập tên',
                'name.min' => 'Tên phải từ 3 ký tự trở lên',
                'full_name.required' => 'Bạn chưa nhập họ tên',
                'full_name.min' => 'Họ và tên phải từ 3 ký tự trở lên',
                'user_sdt.required' => 'Bạn chưa nhập số điện thoại',
                'user_sdt.numeric' => 'Bạn chỉ được nhập số',
                'user_dia_chi.required' => 'Bạn chưa nhập địa chỉ',
                
            ]);

        $user->name = $request->name;
        $user->full_name = $request->full_name;
        $user->user_sdt = $request->user_sdt;
        $user->user_dia_chi = $request->user_dia_chi;
        if ($request->hasFile('user_anh')) {
        $file = $request->user_anh;
        $filename = $file->getClientOriginalName('user_anh');
        $ext = $file->getClientOriginalExtension('user_anh');
            if ($ext != 'jpg' && $ext != 'png' && $ext != 'jpeg') {
                return redirect('nguoidung')->with('loi','Bạn chỉ được upload file có đuôi jpg,png,jpeg');
            }
            else {
        $image = str_random('5').'_'.$filename;
        while(file_exists("images/user/".$image)){
                $image = str_random(5)."_".$filename;
            }
        $file->move("images/user",$image);
        if($user->user_anh != "") {
        unlink("images/user/".$user->user_anh);
        }
        
            }
            $user->user_anh = $image;
        }
        
        if ($request->changePassword == 'on') {
            $this->validate($request,
            [
                'password' => 'required|min:3|max:32',
                're_password' => 'required|same:password',
               

            ],
            [
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu từ 3 ký tự trở lên',
                'password.max' => 'Mật khẩu không quá 32 ký tự',
                're_password.required' => 'Bạn chưa nhập lại mật khẩu',
                're_password.same' => 'Nhập lại mật khẩu không đúng',
            ]);

            $user->password = bcrypt($request->password);
        }

        $user->save();
        return redirect('nguoidung')->with('thongbao','Cập nhật thông tin thành công');
    }
}
