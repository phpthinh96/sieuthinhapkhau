@extends('layouts.index')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Đăng ký</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Đăng ký</h2>
			<div class="login-form-grids">
				<h6>Thông tin</h6>
				@if(session('thongbao'))
					<div class="alert alert-success">
						{{session('thongbao')}}
					</div>
				@endif
					<form action="dangky" method="post">

					{{csrf_field()}}
					<input type="text" placeholder="Username" name="name" value="{!! old('name') !!}" >
					<p style="color: red">
               			 {!! $errors->first('name') !!}
            		</p><br>

            		<input type="text" placeholder="Fullname" name="full_name" value="{!! old('full_name') !!}" >
					<p style="color: red">
               			 {!! $errors->first('full_name') !!}
            		</p><br>

					<input type="email" placeholder="Email Address" name="email" value="{!! old('email') !!}" >
					<p style="color: red">
               			 {!! $errors->first('email') !!}
            		</p>
					<input type="password" placeholder="Password" name="password" >
					<p style="color: red">
               			 {!! $errors->first('password') !!}
            		</p>
					
					<input type="password" placeholder="Password Confirmation" name="re_password">
					<p style="color: red">
               			 {!! $errors->first('re_password') !!}
            		</p><br>
					<input type="text" placeholder="Phone Number" name="user_sdt" value="{!! old('user_sdt') !!}" >
					<p style="color: red">
               			 {!! $errors->first('user_sdt') !!}
            		</p><br>
					<input type="text" placeholder="Address" name="user_dia_chi" value="{!! old('user_dia_chi') !!}" >
					<p style="color: red">
               			 {!! $errors->first('user_dia_chi') !!}
            		</p>
					<input type="submit" value="Đăng ký">
				</form>
			</div>
			<div class="register-home">
				<a href="">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
@endsection