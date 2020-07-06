<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Sản phẩm mới</h3>
			<div id="myCarousel3" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
			        <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel3" data-slide-to="1"></li>
			        <li data-target="#myCarousel3" data-slide-to="2"></li>
		      	</ol>
		      	<div class="carousel-inner">
					<div class="item active">
						<div class="agile_top_brands_grids">
						@foreach($sanphammoi as $spm)
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										@if($spm->sanpham_gia_khuyen_mai > 0)
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										@endif
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/{{$spm->id}}/{{$spm->sanpham_url}}.html"><img  title=" " alt=" " src="images/sanpham/{{$spm->sanpham_anh}}" height="200px" width="auto" /></a>		
																	<p style="height: 55px;">{{$spm->sanpham_ten}}</p>
																	@if($spm->sanpham_gia_khuyen_mai > 0)
																	<h4 style="height: 30px;">{!! number_format($spm->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ 
																		<div>
																		<span>{{number_format($spm->sanpham_gia,0,",",".")}} vnđ</span>
																	</div>
																	</h4>
																	@else
																		<h4 style="height: 30px;">{!! number_format($spm->sanpham_gia,0,",",".") !!} vnđ </h4>
																	@endif
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																	<form action="giohang/them/{{$spm->id}}" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																		</small>

																	@elseif($slht->thongke_so_luong_hien_tai > 0 )
																	<form action="giohang/them/{{$spm->id}}" method="get">
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
							</div>
						</div>
						@endforeach
							<div class="clearfix"> </div>
							</div>
					</div>

					<div class="item">
						<div class="agile_top_brands_grids">
						@foreach($sanphammoi1 as $spm1)
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										@if($spm1->sanpham_gia_khuyen_mai > 0)
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										@endif
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/{{$spm1->id}}/{{$spm1->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spm1->sanpham_anh}}" height="200px" width="auto" /></a>		
																	<p style="height: 55px;">{{$spm1->sanpham_ten}}</p>
																	@if($spm1->sanpham_gia_khuyen_mai > 0)
																	<h4 style="height: 30px;">{!! number_format($spm1->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ 
																		<div>
																		<span>{{number_format($spm1->sanpham_gia,0,",",".")}} vnđ</span>
																	</div></h4>
																	@else
																		<h4 style="height: 30px;">{!! number_format($spm1->sanpham_gia,0,",",".") !!} vnđ </h4>
																	@endif
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm1->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																	<form action="giohang/them/{{$spm1->id}}" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																		</small>

																	@elseif($slht->thongke_so_luong_hien_tai > 0 )
																	<form action="giohang/them/{{$spm1->id}}" method="get">
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
							</div>
						</div>
						@endforeach
							<div class="clearfix"> </div>
							</div>
					</div>
					

				    <div class="item">
				    	<div class="agile_top_brands_grids">
						@foreach($sanphammoi2 as $spm2)
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										@if($spm2->sanpham_gia_khuyen_mai > 0)
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										@endif
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/{{$spm2->id}}/{{$spm2->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spm2->sanpham_anh}}" height="200px" width="auto" /></a>		
																	<p style="height: 55px;">{{$spm2->sanpham_ten}}</p>
																	@if($spm2->sanpham_gia_khuyen_mai > 0)
																	<h4 style="height: 30px;">{!! number_format($spm2->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ 
																		<div><span>{{number_format($spm2->sanpham_gia,0,",",".")}} vnđ</span></div></h4>
																	@else
																		<h4 style="height: 30px;">{!! number_format($spm2->sanpham_gia,0,",",".") !!} vnđ </h4>
																	@endif
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm2->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																	<form action="giohang/them/{{$spm2->id}}" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																		</small>

																	@elseif($slht->thongke_so_luong_hien_tai > 0 )
																	<form action="giohang/them/{{$spm2->id}}" method="get">
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
							</div>
						</div>
						@endforeach
							<div class="clearfix"> </div>
							</div>
					</div>
				</div>

			</div><br>
		</div>
	</div>
<!-- //new -->