@extends('layouts.index')
@section('content')

	<div class="products">
		<div class="container">
			{{-- <div class="col-md-4 products-left">
																																															
			</div> --}}
			<div class="col-md-12 ">
				@if(session('thongbao'))
					<div class="alert alert-danger">
						{{session('thongbao')}}
					</div>
				@endif
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="country" class="frm-field required sect" name="price-sorting">
								<option hidden=""><i class="fa fa-arrow-right" aria-hidden="true"></i>Sắp xếp theo giá</option>
								<option value="1" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Thấp tới cao</option>				
								<option value="2" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Cao tới thấp</option>										
							</select>
						</div>
						{{-- <div class="sorting-left">
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 9</option>
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 18</option> 
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>Item on page 32</option>					
								<option value="null"><i class="fa fa-arrow-right" aria-hidden="true"></i>All</option>								
							</select>
						</div> --}}
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="agile_top_brands_grids">
								<?php $i = 0?>
								@foreach($sanpham as $sp)
								
								<div class="col-md-4 top_brand_left" 
								@if($sp->sanpham_gia_khuyen_mai > 0)
									data-price = {{$sp->sanpham_gia_khuyen_mai}}
								@else 
									data-price = {{$sp->sanpham_gia}}
								@endif
								>
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												@if($sp->sanpham_gia_khuyen_mai > 0)
												<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
												@endif
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="sanpham/{{$sp->id}}/{{$sp->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$sp->sanpham_anh}}" height="250px" width="auto" /></a>		
															<p style="height: 40px;">{{$sp->sanpham_ten}}</p>
															@if($sp->sanpham_gia_khuyen_mai > 0)
															<h4>{!! number_format($sp->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($sp->sanpham_gia,0,",",".")}} vnđ</span></h4>
															@else
																<h4>{!! number_format($sp->sanpham_gia,0,",",".") !!} vnđ </h4>
															@endif
														</div>
														<div class="snipcart-details top_brand_home_details" style="height: 40px;">
															<?php 
															$slht = App\ThongKe::where('sanpham_id',$sp->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
															?>
																
															@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
															<form action="giohang/them/{{$sp->id}}" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button"  />

																</fieldset>
															</form>
																<small>
																	<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																</small>

															@elseif($slht->thongke_so_luong_hien_tai > 0 )
															<form action="giohang/them/{{$sp->id}}" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>

															@else
																<fieldset>
																	<b style="color: red;">Hết hàng</b>
																</fieldset>	
															@endif
															
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div><br><br>
								</div> 								
								<?php $i++ ?>

								@if($i == 3 || $i == 6)
								
									<div class="clearfix"> </div>
								
								
								@endif
								
								@endforeach

								{{-- <div class="clearfix"> </div> --}}
									
								
								
							</div>	
				
				<nav class="numbering">
					<ul class="pagination">
                    {{ $sanpham->links()}}
                </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

@endsection
@section('script')
<script type="text/javascript">
	$(document).on("change", "#country", function() {

    var sortingMethod = $(this).val();

    if(sortingMethod == '1')
    {
        sortProductsPriceAscending();
    }
    else if(sortingMethod == '2')
    {
        sortProductsPriceDescending();
    }

});
function sortProductsPriceAscending()
{
    var products = $('.top_brand_left');
    products.sort(function(a, b){ return $(a).data("price")-$(b).data("price")});
    $(".agile_top_brands_grids").html(products);

}

function sortProductsPriceDescending()
{
    var products = $('.top_brand_left');
    products.sort(function(a, b){ return $(b).data("price") - $(a).data("price")});
    $(".agile_top_brands_grids").html(products);

}
</script>
@endsection