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
						<?php $__currentLoopData = $sanphammoi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($spm->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($spm->id); ?>/<?php echo e($spm->sanpham_url); ?>.html"><img  title=" " alt=" " src="images/sanpham/<?php echo e($spm->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($spm->sanpham_ten); ?></p>
																	<?php if($spm->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($spm->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div>
																		<span><?php echo e(number_format($spm->sanpham_gia,0,",",".")); ?> vnđ</span>
																	</div>
																	</h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($spm->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($spm->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($spm->id); ?>" method="get">
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
						<?php $__currentLoopData = $sanphammoi1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spm1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($spm1->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($spm1->id); ?>/<?php echo e($spm1->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spm1->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($spm1->sanpham_ten); ?></p>
																	<?php if($spm1->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($spm1->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div>
																		<span><?php echo e(number_format($spm1->sanpham_gia,0,",",".")); ?> vnđ</span>
																	</div></h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($spm1->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm1->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($spm1->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($spm1->id); ?>" method="get">
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
						<?php $__currentLoopData = $sanphammoi2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spm2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 top_brand_left-1">
							<div class="hover14 column">
								<div class="agile_top_brand_left_grid">
									<div class="agile_top_brand_left_grid_pos">
										<?php if($spm2->sanpham_gia_khuyen_mai > 0): ?>
										<img src="frontend/images/offer.png" alt=" " class="img-respmonsive">
										<?php endif; ?>
									</div>
									
												<div class="agile_top_brand_left_grid1">
											<figure>
												<div class="snipcart-item block" >
																<div class="snipcart-thumb">
																	<a href="sanpham/<?php echo e($spm2->id); ?>/<?php echo e($spm2->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($spm2->sanpham_anh); ?>" height="200px" width="auto" /></a>		
																	<p style="height: 55px;"><?php echo e($spm2->sanpham_ten); ?></p>
																	<?php if($spm2->sanpham_gia_khuyen_mai > 0): ?>
																	<h4 style="height: 30px;"><?php echo number_format($spm2->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ 
																		<div><span><?php echo e(number_format($spm2->sanpham_gia,0,",",".")); ?> vnđ</span></div></h4>
																	<?php else: ?>
																		<h4 style="height: 30px;"><?php echo number_format($spm2->sanpham_gia,0,",","."); ?> vnđ </h4>
																	<?php endif; ?>
																</div>
																<div class="snipcart-details top_brand_home_details" style="height: 40px;">
																	<?php 
																	$slht = App\ThongKe::where('sanpham_id',$spm2->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
																	?>
																		
																	<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
																	<form action="giohang/them/<?php echo e($spm2->id); ?>" method="get">
																		<fieldset>
																			<input type="submit" value="Add to cart" class="button"  />

																		</fieldset>
																	</form>
																		<small>
																			<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
																		</small>

																	<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
																	<form action="giohang/them/<?php echo e($spm2->id); ?>" method="get">
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