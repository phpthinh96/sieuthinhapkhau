@extends('layouts.index')
@section('content')
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Giỏ hàng</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
	<div class="checkout">
		<div class="container">
			<h2>Hiện tại giỏ hàng có: <span>{{Cart::count()}} Sản phẩm</span></h2>
			<div class="checkout-right">
				{{-- <div class="alert alert-info" id="CartMsg"></div> --}}
				<table class="timetable_sub">
					<thead>
						@if(Cart::count() != 0)
						<tr>
							<th>ID</th>	
							<th>Ảnh</th>
							<th>Số lượng</th>
							<th>Tên sản phẩm</th>	
							<th>Giá</th>
							<th>Xóa</th>
						</tr>
					</thead>
					
					@foreach($cartItem as $item)
					<tr class="rem1">
						<input type="hidden" id="rowId{{$item->id}}" value="{{$item->rowId}}">
						<td class="invert">{{$item->id}}</td>
						<td class="invert-image" width="350px"><a href="sanpham/{{$item->id}}/{{$item->options->sanpham_url}}.html"><img src="images/sanpham/{{$item->options->anh}}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus" id="value-minus{{$item->id}}">&nbsp;</div>
									<div class="entry value" id="value{{$item->id}}"><span>{{$item->qty}}</span></div>
									<div class="entry value-plus active" id="value-plus{{$item->id}}">&nbsp;</div>
								</div>
							</div>
							
							<div style="margin-top: 5px;">
								<small>{{$item->options->dvt}}</small>
							</div>
						
							<?php 
								$slht = App\ThongKe::where('sanpham_id',$item->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
							?>
							@if($slht->thongke_so_luong_hien_tai <= 20)
							
							<br><small>
									<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
							</small>
							
							@endif
						</td>
						<td class="invert">{{$item->name}}</td>
						
						<td class="invert">{{$item->price}}/{{$item->options->dvt}}</td>
						<td class="invert" width="70px">
							<div class="rem" >
								<a href="giohang/xoa/{{$item->rowId}}" class="close1"> </a>
							</div>
		
						</td>
					</tr>
					@endforeach
					@else
						{{'Hiện tại không có sản phẩm nào trong giỏ hàng '}}
						
					@endif
								
				</table>
			</div>

			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Hóa đơn</h4>
					<ul>
						@foreach($cartItem as $item)
						<li>
						Sản phẩm {{$item->id}} <i>-</i> <span>{!! number_format($item->qty * $item->price,0,",",".") !!} vnđ </span>
						</li>
						@endforeach
						
						<li>Tổng tiền trước thuế <i>-</i> <span>{!! number_format(Cart::subtotal(),0,",",".") !!} vnđ </span></li>
						<li>Tax(%) <i>-</i> <span>{!! number_format(Cart::tax(),0,",",".") !!} vnđ</span></li>
						<li class="tongtien">Tổng tiền <i>-</i> <span>{!! number_format(Cart::total(),0,",",".") !!} vnđ</span></li>
					</ul>
				</div>

				<div class="checkout-right-basket">
					@if (Auth::check())
						<a href="thanhtoan"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Đi tiếp</a><br><br>
						<a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>
					@else

						<a href="dangnhap"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Đi tiếp</a><br><br>
						<a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>

					@endif
					
				</div>

				

				<div class="clearfix"> </div>
			</div>
				
		</div>
	</div>
<!-- //checkout -->
@endsection
@section('script')
	<!--quantity-->
		<script>
		$(document).ready(function(){
			// $('#CartMsg').hide();
			@foreach($cartItem as $item)
			$('#value-plus{{$item->id}}').on('click', function(){
				var divUpd = $(this).parent().find('#value{{$item->id}}'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
				var rowId = $('#rowId{{$item->id}}').val();
				var kho = {{$item->options->kho}};
				if(newVal<= kho) 
				{
					divUpd.text(newVal);
				} else {
					var newVal = kho;
					divUpd.text(newVal);
					alert('Không thể mua vượt quá số lượng còn lại');

				}
				$.ajax({
					url: '{{url('giohang/sua')}}',
					data: 'rowId=' + rowId + '&newQty=' + newVal,
					type: 'get',
					success:function(response){
						// $('#CartMsg').show();
						console.log(response);
						// $('#CartMsg').html(response);
					}
				});
			});

			$('#value-minus{{$item->id}}').on('click', function(){
				var divUpd = $(this).parent().find('#value{{$item->id}}'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) 
				{
					divUpd.text(newVal);
				} else {
					var newVal = 1;
					divUpd.text(newVal);

				}
				var rowId = $('#rowId{{$item->id}}').val();
				$.ajax({
					url: '{{url('giohang/sua')}}',
					data: 'rowId=' + rowId + '&newQty=' + newVal,
					type: 'get',
					success:function(response){
						$('#CartMsg').show();
						console.log(response);
						$('#CartMsg').html(response);
					}
				});
			});
			@endforeach
		});
		
		</script>
	<!--quantity-->
@endsection