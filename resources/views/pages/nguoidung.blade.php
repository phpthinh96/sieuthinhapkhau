@extends('layouts.index')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">User</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- user -->
	<div class="login">
		<div class="container">
			<h2>Thông tin người dùng</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
				@if(session('loi'))
					<div class="alert alert-danger">
						{{session('loi')}}
					</div>
				@endif
				<form action="nguoidung" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					@if($user->user_anh == "")
					<p style="text-align: center;"><img width="150px" height="150px" alt="image" src="images/user/user.jpg"></p><br>
					@else
						<p style="text-align: center;"><img width="150px" height="150px" alt="image" src="images/user/{{$user->user_anh}}"></p><br>
					@endif

					<input style="text-align: center;" type="file" name="user_anh" ><br>
					<label>Tên</label>
					<input type="text" name="name" value="{{$user->name}}" >
					<p style="color: red">
               			 {!! $errors->first('name') !!}
            		</p><br>
            		<label>Họ và tên</label>
					<input type="text" name="full_name" value="{{$user->full_name}}" >
					<p style="color: red">
               			 {!! $errors->first('full_name') !!}
            		</p><br>
            		<label>Số điện thoại</label>
            		<input type="text" name="user_sdt" value="{{$user->user_sdt}}" >
					<p style="color: red">
               			 {!! $errors->first('user_sdt') !!}
            		</p><br>
            		<label>Địa chỉ</label>
            		<input type="text" name="user_dia_chi" value="{{$user->user_dia_chi}}" >
					<p style="color: red">
               			 {!! $errors->first('user_dia_chi') !!}
            		</p><br>
            		
            		<input type="checkbox" class="" name="changePassword" id="changePassword">
            		<label>Đổi mật khẩu</label>
					<input type="password" class="password" name="password" disabled=""  >
					<p style="color: red">
               			 {!! $errors->first('password') !!}
            		</p><br>
            		<label>Nhập lại mật khẩu</label>
					<input type="password" class="password" name="re_password" disabled=""  >
					<p style="color: red">
               			 {!! $errors->first('re_password') !!}
            		</p>
					
					<input type="submit" value="Cập nhật">
					<a href="lich-su-mua-hang/{{$user->id}}/danhsach.html"><input type="button" class="lichsumuahang" value="Lịch sử mua hàng"></a>
				</form>
			</div>
			<div class="register-home">
				<a href="">Home</a>
			</div>
		</div>
	</div>
<!-- //user -->
@endsection
@section('script')
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#changePassword').change(function(){
                        if ($(this).is(':checked')) {
                            $('.password').removeAttr('disabled');
                        } else {
                            $('.password').attr('disabled','');
                        }
                    });
                });

            </script>
        @endsection