<!-- new -->
	<div class="newproducts-w3agile">
		<div class="container">
			<h3>Sản phẩm liên quan</h3>
			<div id="myCarousel3" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
			        <li data-target="#myCarousel3" data-slide-to="0" class="active"></li>
			        <li data-target="#myCarousel3" data-slide-to="1"></li>
			        <li data-target="#myCarousel3" data-slide-to="2"></li>
		      	</ol>
		      	<div class="carousel-inner">
					<div class="item active">
						<div class="agile_top_brands_grids">
						<?php $__currentLoopData = $sanphamlienquan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $splq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($splq->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($splq->id); ?>/<?php echo e($splq->sanpham_url); ?>.html"><img  title=" " alt=" " src="images/sanpham/<?php echo e($splq->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($splq->sanpham_ten); ?></p>
																	<?php if($splq->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($splq->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div>
																		<span><?php echo e(number_format($splq->sanpham_gia,0,",",".")); ?> vnđ</span>
																	</div>
																	</h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($splq->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$splq->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($splq->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($splq->id); ?>" method="get">
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
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="clearfix"> </div>
							</div>
					</div>

					<div class="item">
						<div class="agile_top_brands_grids">
						<?php $__currentLoopData = $sanphamlienquan1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $splq1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($splq1->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($splq1->id); ?>/<?php echo e($splq1->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($splq1->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($splq1->sanpham_ten); ?></p>
																	<?php if($splq1->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($splq1->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div>
																		<span><?php echo e(number_format($splq1->sanpham_gia,0,",",".")); ?> vnđ</span>
																	</div></h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($splq1->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$splq1->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($splq1->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($splq1->id); ?>" method="get">
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
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="clearfix"> </div>
							</div>
					</div>
					

				    <div class="item">
				    	<div class="agile_top_brands_grids">
						<?php $__currentLoopData = $sanphamlienquan2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $splq2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($splq2->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($splq2->id); ?>/<?php echo e($splq2->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($splq2->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($splq2->sanpham_ten); ?></p>
																	<?php if($splq2->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($splq2->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div><span><?php echo e(number_format($splq2->sanpham_gia,0,",",".")); ?> vnđ</span></div></h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($splq2->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$splq2->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($splq2->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($splq2->id); ?>" method="get">
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
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="clearfix"> </div>
							</div>
					</div>
				</div>

			</div><br>
		</div>
	</div>
<!-- //new -->