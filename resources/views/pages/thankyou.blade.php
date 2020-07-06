@extends('layouts.index')

@section('content')
<div class="register">
	

<div class="container">
	

<div>
<h1 align="center">Cảm ơn {{Auth::user()->name}}</h1>
</div>
<div style="text-align: center;">
<p class="panel-body">
    Đơn hàng của bạn đã được đặt</p>
</div>
	<div class="register-home">
				<a href="">Home</a>
			</div>
</div>
</div>
@endsection