@extends('layouts.index')
@section('content')
	<!-- main-slider -->
		<ul id="demo1">
			@foreach($slide as $sl)
			<li>
				<img src="images/slide/{{$sl->slide_anh}}" alt="" />
				<!--Slider Description example-->
				{{-- <div class="slide-desc">
					<h3>AAAAAAAAAAAAAAAAAAAAA</h3>
				</div> --}}
			</li>
			@endforeach
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2>Top Sản Phẩm</h2>
			<div class="grid_3 grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Sản phẩm nổi bật</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Sản phẩm bán chạy</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							@if(session('thongbao'))
								<div class="alert alert-danger">
									{{session('thongbao')}}
								</div>
							@endif
							<div class="agile-tp">
								<h5>Sản phẩm nổi bật</h5>
								<p class="w3l-ad">Những sản phẩm nổi bật sẽ hiển thị tại đây, bạn đừng bỏ lỡ nhé!</p>
							</div>

							<div id="myCarousel1" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
							        <li data-target="#myCarousel1" data-slide-to="0" class="active"></li>
							        <li data-target="#myCarousel1" data-slide-to="1"></li>
							        <li data-target="#myCarousel1" data-slide-to="2"></li>
						      	</ol>
						      	<div class="carousel-inner">
						      		<div class="item active">
										<div class="agile_top_brands_grids">
											<?php $i = 0?>
											@foreach($sanphamnoibat as $spnb)
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															@if($spnb->sanpham_gia_khuyen_mai > 0)
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															@endif
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/{{$spnb->id}}/{{$spnb->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spnb->sanpham_anh}}" height="250px" width="auto" /></a>		
																		<p style="height: 35px;">{{$spnb->sanpham_ten}}</p>
																		@if($spnb->sanpham_gia_khuyen_mai > 0)
																		<h4>{!! number_format($spnb->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spnb->sanpham_gia,0,",",".")}} vnđ</span></h4>
																		@else
																			<h4>{!! number_format($spnb->sanpham_gia,0,",",".") !!} vnđ </h4>
																		@endif
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																		<form action="giohang/them/{{$spnb->id}}" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>

																			</small>

																		@elseif($slht->thongke_so_luong_hien_tai > 0 )
																		<form action="giohang/them/{{$spnb->id}}" method="get">
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
									</div>
									<div class="item">
							         	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											@foreach($sanphamnoibat1 as $spnb1)
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															@if($spnb1->sanpham_gia_khuyen_mai > 0)
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															@endif
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/{{$spnb1->id}}/{{$spnb1->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spnb1->sanpham_anh}}" height="250px" width="auto" /></a>		
																		<p style="height: 35px;">{{$spnb1->sanpham_ten}}</p>
																		@if($spnb1->sanpham_gia_khuyen_mai > 0)
																		<h4>{!! number_format($spnb1->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spnb1->sanpham_gia,0,",",".")}} vnđ</span></h4>
																		@else
																			<h4>{!! number_format($spnb1->sanpham_gia,0,",",".") !!} vnđ </h4>
																		@endif
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb1->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																		<form action="giohang/them/{{$spnb1->id}}" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																			</small>

																		@elseif($slht->thongke_so_luong_hien_tai > 0 )
																		<form action="giohang/them/{{$spnb1->id}}" method="get">
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
							         
							        </div>
							        <div class="item">
							          	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											@foreach($sanphamnoibat2 as $spnb2)
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															@if($spnb2->sanpham_gia_khuyen_mai > 0)
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															@endif
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/{{$spnb2->id}}/{{$spnb2->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spnb2->sanpham_anh}}" height="250px" width="auto" /></a>		
																		<p style="height: 35px;">{{$spnb2->sanpham_ten}}</p>
																		@if($spnb->sanpham_gia_khuyen_mai > 0)
																		<h4>{!! number_format($spnb2->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spnb2->sanpham_gia,0,",",".")}} vnđ</span></h4>
																		@else
																			<h4>{!! number_format($spnb2->sanpham_gia,0,",",".") !!} vnđ </h4>
																		@endif
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb2->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																		<form action="giohang/them/{{$spnb2->id}}" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																			</small>

																		@elseif($slht->thongke_so_luong_hien_tai > 0 )
																		<form action="giohang/them/{{$spnb2->id}}" method="get">
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
							          
							        </div>
								</div>
								
							</div><br>

						</div>
						<div role="tabpanel" class="tab-pane fade" id="tours" aria-labelledby="tours-tab">
							<div class="agile-tp">
								<h5>Sản phẩm bán chạy</h5>
								<p class="w3l-ad">Những sản phẩm bán chạy nhất sẽ được hiển thị tại đây, <br>hãy nhanh tay đặt hàng nhé!</p>
							</div>
							<div id="myCarousel2" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
							        <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
							        <li data-target="#myCarousel2" data-slide-to="1"></li>
							        <li data-target="#myCarousel2" data-slide-to="2"></li>
						      	</ol>
						      	<div class="carousel-inner">
						      		<div class="item active">
										<div class="agile_top_brands_grids">
								<?php $i = 0?>
								@foreach($sanphambanchay as $spbc)
								
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												@if($spbc->sanpham_gia_khuyen_mai > 0)
												<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
												@endif
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="sanpham/{{$spbc->sanpham_id}}/{{$spbc->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spbc->sanpham_anh}}" height="250px" width="auto" /></a>		
															<p style="height: 35px;">{{$spbc->sanpham_ten}}</p>
															@if($spbc->sanpham_gia_khuyen_mai > 0)
															<h4>{!! number_format($spbc->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spbc->sanpham_gia,0,",",".")}} vnđ</span></h4>
															@else
																<h4>{!! number_format($spbc->sanpham_gia,0,",",".") !!} vnđ </h4>
															@endif
														</div>
														<div class="snipcart-details top_brand_home_details" style="height: 40px;">
															<?php 
															$slht = App\ThongKe::where('sanpham_id',$spbc->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
															?>
																
															@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
															<form action="giohang/them/{{$spbc->sanpham_id}}" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button"  />

																</fieldset>
															</form>
																<small>
																	<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																</small>

															@elseif($slht->thongke_so_luong_hien_tai > 0 )
															<form action="giohang/them/{{$spbc->sanpham_id}}" method="get">
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
									</div>
									<div class="item">
										<div class="agile_top_brands_grids">
										<?php $i = 0?>
										@foreach($sanphambanchay1 as $spbc1)
										
										<div class="col-md-4 top_brand_left">
											<div class="hover14 column">
												<div class="agile_top_brand_left_grid">
													<div class="agile_top_brand_left_grid_pos">
														@if($spbc1->sanpham_gia_khuyen_mai > 0)
														<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
														@endif
													</div>
													<div class="agile_top_brand_left_grid1">
														<figure>
															<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/{{$spbc1->sanpham_id}}/{{$spbc1->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spbc1->sanpham_anh}}" height="250px" width="auto" /></a>		
																	<p style="height: 35px;">{{$spbc1->sanpham_ten}}</p>
																	@if($spbc1->sanpham_gia_khuyen_mai > 0)
																	<h4>{!! number_format($spbc1->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spbc1->sanpham_gia,0,",",".")}} vnđ</span></h4>
																	@else
																		<h4>{!! number_format($spbc1->sanpham_gia,0,",",".") !!} vnđ </h4>
																	@endif
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spbc1->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																	<form action="giohang/them/{{$spbc1->sanpham_id}}" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																		</small>

																	@elseif($slht->thongke_so_luong_hien_tai > 0 )
																	<form action="giohang/them/{{$spbc1->sanpham_id}}" method="get">
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
									</div>
							        <div class="item">
							        	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											@foreach($sanphambanchay2 as $spbc2)
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															@if($spbc2->sanpham_gia_khuyen_mai > 0)
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															@endif
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/{{$spbc2->sanpham_id}}/{{$spbc2->sanpham_url}}.html"><img title=" " alt=" " src="images/sanpham/{{$spbc2->sanpham_anh}}" height="250px" width="auto" /></a>		
																		<p style="height: 35px;">{{$spbc2->sanpham_ten}}</p>
																		@if($spbc2->sanpham_gia_khuyen_mai > 0)
																		<h4>{!! number_format($spbc2->sanpham_gia_khuyen_mai,0,",",".") !!} vnđ <span>{{number_format($spbc2->sanpham_gia,0,",",".")}} vnđ</span></h4>
																		@else
																			<h4>{!! number_format($spbc2->sanpham_gia,0,",",".") !!} vnđ </h4>
																		@endif
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spbc2->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		@if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20)
																		<form action="giohang/them/{{$spbc2->sanpham_id}}" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại {{$slht->thongke_so_luong_hien_tai}} sản phẩm</i>
																			</small>

																		@elseif($slht->thongke_so_luong_hien_tai > 0 )
																		<form action="giohang/them/{{$spbc2->sanpham_id}}" method="get">
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
							       </div>
								</div>
								
							</div><br>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.html"> <img class="first-slide" src="frontend/images/b1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="personalcare.html"> <img class="second-slide " src="frontend/images/b3.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="household.html"><img class="third-slide " src="frontend/images/b1.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div> --}}
    <!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="frontend/images/p2.jpg" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="frontend/images/p3.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="frontend/images/p4.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="frontend/images/111.jpg" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>
<!--banner-bottom-->

@include('layouts.sanphammoi')

@endsection
