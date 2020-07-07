<?php $__env->startSection('content'); ?>
	<!-- main-slider -->
		<ul id="demo1">
			<?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li>
				<img src="images/slide/<?php echo e($sl->slide_anh); ?>" alt="" />
				<!--Slider Description example-->
				
			</li>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
							<?php if(session('thongbao')): ?>
								<div class="alert alert-danger">
									<?php echo e(session('thongbao')); ?>

								</div>
							<?php endif; ?>
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
											<?php $__currentLoopData = $sanphamnoibat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spnb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															<?php if($spnb->sanpham_gia_khuyen_mai > 0): ?>
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															<?php endif; ?>
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/<?php echo e($spnb->id); ?>/<?php echo e($spnb->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spnb->sanpham_anh); ?>" height="250px" width="auto" /></a>		
																		<p style="height: 35px;"><?php echo e($spnb->sanpham_ten); ?></p>
																		<?php if($spnb->sanpham_gia_khuyen_mai > 0): ?>
																		<h4><?php echo number_format($spnb->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spnb->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
																		<?php else: ?>
																			<h4><?php echo number_format($spnb->sanpham_gia,0,",","."); ?> vnđ </h4>
																		<?php endif; ?>
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																		<form action="giohang/them/<?php echo e($spnb->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>

																			</small>

																		<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																		<form action="giohang/them/<?php echo e($spnb->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button" />
																			</fieldset>
																		</form>

																		<?php else: ?>
																			<fieldset>
																				<b style="color: red;">Hết hàng</b>
																			</fieldset>	
																		<?php endif; ?>
																		
																	</div>
																</div>
															</figure>
														</div>
													</div>
												</div><br><br>
											</div> 								
											<?php $i++ ?>

											<?php if($i == 3 || $i == 6): ?>
											
												<div class="clearfix"> </div>
											
											
											<?php endif; ?>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												
										</div>	
									</div>
									<div class="item">
							         	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											<?php $__currentLoopData = $sanphamnoibat1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spnb1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															<?php if($spnb1->sanpham_gia_khuyen_mai > 0): ?>
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															<?php endif; ?>
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/<?php echo e($spnb1->id); ?>/<?php echo e($spnb1->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spnb1->sanpham_anh); ?>" height="250px" width="auto" /></a>		
																		<p style="height: 35px;"><?php echo e($spnb1->sanpham_ten); ?></p>
																		<?php if($spnb1->sanpham_gia_khuyen_mai > 0): ?>
																		<h4><?php echo number_format($spnb1->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spnb1->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
																		<?php else: ?>
																			<h4><?php echo number_format($spnb1->sanpham_gia,0,",","."); ?> vnđ </h4>
																		<?php endif; ?>
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb1->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																		<form action="giohang/them/<?php echo e($spnb1->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																			</small>

																		<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																		<form action="giohang/them/<?php echo e($spnb1->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button" />
																			</fieldset>
																		</form>

																		<?php else: ?>
																			<fieldset>
																				<b style="color: red;">Hết hàng</b>
																			</fieldset>	
																		<?php endif; ?>
																		
																	</div>
																</div>
															</figure>
														</div>
													</div>
												</div><br><br>
											</div> 								
											<?php $i++ ?>

											<?php if($i == 3 || $i == 6): ?>
											
												<div class="clearfix"> </div>
											
											
											<?php endif; ?>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												
										</div>	
							         
							        </div>
							        <div class="item">
							          	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											<?php $__currentLoopData = $sanphamnoibat2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spnb2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															<?php if($spnb2->sanpham_gia_khuyen_mai > 0): ?>
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															<?php endif; ?>
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/<?php echo e($spnb2->id); ?>/<?php echo e($spnb2->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spnb2->sanpham_anh); ?>" height="250px" width="auto" /></a>		
																		<p style="height: 35px;"><?php echo e($spnb2->sanpham_ten); ?></p>
																		<?php if($spnb->sanpham_gia_khuyen_mai > 0): ?>
																		<h4><?php echo number_format($spnb2->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spnb2->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
																		<?php else: ?>
																			<h4><?php echo number_format($spnb2->sanpham_gia,0,",","."); ?> vnđ </h4>
																		<?php endif; ?>
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spnb2->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																		<form action="giohang/them/<?php echo e($spnb2->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																			</small>

																		<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																		<form action="giohang/them/<?php echo e($spnb2->id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button" />
																			</fieldset>
																		</form>

																		<?php else: ?>
																			<fieldset>
																				<b style="color: red;">Hết hàng</b>
																			</fieldset>	
																		<?php endif; ?>
																		
																	</div>
																</div>
															</figure>
														</div>
													</div>
												</div><br><br>
											</div> 								
											<?php $i++ ?>

											<?php if($i == 3 || $i == 6): ?>
											
												<div class="clearfix"> </div>
											
											
											<?php endif; ?>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												
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
								<?php $__currentLoopData = $sanphambanchay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spbc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								<div class="col-md-4 top_brand_left">
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<?php if($spbc->sanpham_gia_khuyen_mai > 0): ?>
												<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
												<?php endif; ?>
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="sanpham/<?php echo e($spbc->sanpham_id); ?>/<?php echo e($spbc->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spbc->sanpham_anh); ?>" height="250px" width="auto" /></a>		
															<p style="height: 35px;"><?php echo e($spbc->sanpham_ten); ?></p>
															<?php if($spbc->sanpham_gia_khuyen_mai > 0): ?>
															<h4><?php echo number_format($spbc->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spbc->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
															<?php else: ?>
																<h4><?php echo number_format($spbc->sanpham_gia,0,",","."); ?> vnđ </h4>
															<?php endif; ?>
														</div>
														<div class="snipcart-details top_brand_home_details" style="height: 40px;">
															<?php 
															$slht = App\ThongKe::where('sanpham_id',$spbc->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
															?>
																
															<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
															<form action="giohang/them/<?php echo e($spbc->sanpham_id); ?>" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button"  />

																</fieldset>
															</form>
																<small>
																	<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																</small>

															<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
															<form action="giohang/them/<?php echo e($spbc->sanpham_id); ?>" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button" />
																</fieldset>
															</form>

															<?php else: ?>
																<fieldset>
																	<b style="color: red;">Hết hàng</b>
																</fieldset>	
															<?php endif; ?>
															
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div><br><br>
								</div> 								
								<?php $i++ ?>

								<?php if($i == 3 || $i == 6): ?>
								
									<div class="clearfix"> </div>
								
								
								<?php endif; ?>
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									
										</div>	
									</div>
									<div class="item">
										<div class="agile_top_brands_grids">
										<?php $i = 0?>
										<?php $__currentLoopData = $sanphambanchay1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spbc1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<div class="col-md-4 top_brand_left">
											<div class="hover14 column">
												<div class="agile_top_brand_left_grid">
													<div class="agile_top_brand_left_grid_pos">
														<?php if($spbc1->sanpham_gia_khuyen_mai > 0): ?>
														<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
														<?php endif; ?>
													</div>
													<div class="agile_top_brand_left_grid1">
														<figure>
															<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($spbc1->sanpham_id); ?>/<?php echo e($spbc1->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spbc1->sanpham_anh); ?>" height="250px" width="auto" /></a>		
																	<p style="height: 35px;"><?php echo e($spbc1->sanpham_ten); ?></p>
																	<?php if($spbc1->sanpham_gia_khuyen_mai > 0): ?>
																	<h4><?php echo number_format($spbc1->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spbc1->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
																	<?php else: ?>
																		<h4><?php echo number_format($spbc1->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spbc1->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($spbc1->sanpham_id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($spbc1->sanpham_id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button" />
																		</fieldset>
																	</form>

																	<?php else: ?>
																		<fieldset>
																			<b style="color: red;">Hết hàng</b>
																		</fieldset>	
																	<?php endif; ?>
																	
																</div>
															</div>
														</figure>
													</div>
												</div>
											</div><br><br>
										</div> 								
										<?php $i++ ?>

										<?php if($i == 3 || $i == 6): ?>
										
											<div class="clearfix"> </div>
										
										
										<?php endif; ?>
										
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

											
										</div>
									</div>
							        <div class="item">
							        	<div class="agile_top_brands_grids">
											<?php $i = 0?>
											<?php $__currentLoopData = $sanphambanchay2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spbc2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											
											<div class="col-md-4 top_brand_left">
												<div class="hover14 column">
													<div class="agile_top_brand_left_grid">
														<div class="agile_top_brand_left_grid_pos">
															<?php if($spbc2->sanpham_gia_khuyen_mai > 0): ?>
															<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
															<?php endif; ?>
														</div>
														<div class="agile_top_brand_left_grid1">
															<figure>
																<div class="snipcart-item block" >
																	<div class="snipcart-thumb">
																		<a href="sanpham/<?php echo e($spbc2->sanpham_id); ?>/<?php echo e($spbc2->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spbc2->sanpham_anh); ?>" height="250px" width="auto" /></a>		
																		<p style="height: 35px;"><?php echo e($spbc2->sanpham_ten); ?></p>
																		<?php if($spbc2->sanpham_gia_khuyen_mai > 0): ?>
																		<h4><?php echo number_format($spbc2->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($spbc2->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
																		<?php else: ?>
																			<h4><?php echo number_format($spbc2->sanpham_gia,0,",","."); ?> vnđ </h4>
																		<?php endif; ?>
																	</div>
																	<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																		<?php 
																		$slht = App\ThongKe::where('sanpham_id',$spbc2->sanpham_id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																		?>
																			
																		<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																		<form action="giohang/them/<?php echo e($spbc2->sanpham_id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button"  />

																			</fieldset>
																		</form>
																			<small>
																				<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																			</small>

																		<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																		<form action="giohang/them/<?php echo e($spbc2->sanpham_id); ?>" method="get">
																			<fieldset>
																				<input type="submit" value="Add to cart" class="button" />
																			</fieldset>
																		</form>

																		<?php else: ?>
																			<fieldset>
																				<b style="color: red;">Hết hàng</b>
																			</fieldset>	
																		<?php endif; ?>
																		
																	</div>
																</div>
															</figure>
														</div>
													</div>
												</div><br><br>
											</div> 								
											<?php $i++ ?>

											<?php if($i == 3 || $i == 6): ?>
											
												<div class="clearfix"> </div>
											
											
											<?php endif; ?>
											
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

												
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

<?php echo $__env->make('layouts.sanphammoi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>