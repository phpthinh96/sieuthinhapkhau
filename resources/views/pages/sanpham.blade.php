@extends('layouts.index')
@section('content')
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Sản phẩm</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				@if(session('thongbao'))
					<div class="alert alert-danger">
						{{session('thongbao')}}
					</div>
				@endif
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="images/sanpham/{{$sanpham->sanpham_anh}}" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<h2>{{$sanpham->sanpham_ten}}</h2>
					{{-- <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div> --}}
					
					<div class="w3agile_description">
						<h4>Thông tin sản phẩm :</h4>
						<p>{!!$sanpham->sanpham_mo_ta!!}</p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							@if($sanpham->sanpham_gia_khuyen_mai > 0)
							<h4 class="m-sing">{!! number_format($sanpham->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($sanpham->sanpham_gia,0,",",".")}} vnđ</span></h4>
							@else
								<h4 class="m-sing">{!! number_format($sanpham->sanpham_gia,0,",",".") !!} vnđ </h4>
							@endif
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<?php 
							$slht = App\ThongKe::where('sanpham_id',$sanpham->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
							?>
							<div style="margin-bottom: 10px; text-align: left;">
								<small>Đơn vị tính: {{$sanpham->donvitinh->donvitinh_ten}}</small>
							</div>
							@if($slht->thongke_so_luong_hien_tai > 0)
							<form action="giohang/them/{{$sanpham->id}}" method="get">
								<fieldset>
									<input type="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>

							@else
								<fieldset style="height: 33px;">
									<b style="color: red;">Hết hàng</b>
								</fieldset>	
							@endif
							
							@if($slht->thongke_so_luong_hien_tai <= 20)
							
							<small>
									<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
							</small>
							
							@endif
							
						</div>

					</div>
					@if(Auth::check())
	                
	                <div class="well" style="margin-top: 50px;">
	                    @if(session('binhluan'))
	                    <div class="alert alert-success">
	                        {{session('binhluan')}}
	                    </div>
	                	@endif
	                    <h5>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h5><br>
	                    <form role="form" action="binhluan/{{$sanpham->id}}" method="post">
	                        {{csrf_field()}}
	     
	                        <div class="form-group">
	                        	<label>Nội dung</label>
	                            <textarea class="form-control" name="binhluan_noi_dung" rows="3"></textarea>
	                        </div>
	                        <button type="submit" class="btn btn-primary">Gửi</button>
	                    </form>
	                </div>
	                <hr>
	                @endif
	                

	                <!-- Posted Comments -->

	                <!-- Comment -->
	                @if(count($binhluan)>0)
	               <h4 style="margin-top: 50px;"><i class="fa fa-comments-o"></i> Danh sách bình luận</h4>
               		@endif
	                @foreach($binhluan as $cm)
	                <div class="media" style="margin-top: 40px;">
	                	@if($cm->user->user_anh == "")
	                		<img class="media-object pull-left" alt="image" src="images/user/user.jpg" width="60px" height="50px">
	                	@else
	                	
	                        <img class="media-object pull-left" src="images/user/{{$cm->user->user_anh}}" width="60px" height="50px" alt="image">
	                    @endif
	                    <div class="media-body">

	                        <h4 class="media-heading">{{$cm->user->name}}
	                            <small>{{$cm->created_at}}</small>
	                        </h4>
	                        {{$cm->binhluan_noi_dung}}
	                    </div>
	                    
	                </div>
	                @endforeach	
				
					<nav class="numbering">
						<ul class="pagination">
	                    {{ $binhluan->links()}}
	                </ul>
					</nav>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
@include('layouts.sanphamlienquan')
@endsection