<?php $__env->startSection('content'); ?>
	<div class="products">
		<div class="container">
			
			<div class="col-md-12 ">
				
					<div class="alert alert-info">
						<?php echo e($ketqua); ?>

					</div>

					<?php if(session('thongbao')): ?>
					<div class="alert alert-danger">
						<?php echo e(session('thongbao')); ?>

					</div>
				<?php endif; ?>
				
				<div class="products-right-grid">
					<div class="products-right-grids">
						<div class="sorting">
							<select id="country" class="frm-field required sect" name="price-sorting">
								<option hidden=""><i class="fa fa-arrow-right" aria-hidden="true"></i>Sắp xếp theo giá</option>
								<option value="1" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Thấp tới cao</option>				
								<option value="2" ><i class="fa fa-arrow-right" aria-hidden="true"></i>Cao tới thấp</option>										
							</select>
						</div>
						
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php if(count($sanpham) > 0): ?>
				<div class="agile_top_brands_grids aaa">
								<?php $i = 0?>
								<?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
								<div class="col-md-4 top_brand_left bbb"
								<?php if($sp->sanpham_gia_khuyen_mai > 0): ?>
								data-price = <?php echo e($sp->sanpham_gia_khuyen_mai); ?>

								<?php else: ?> 
								data-price = <?php echo e($sp->sanpham_gia); ?>

								<?php endif; ?>
								>
									<div class="hover14 column">
										<div class="agile_top_brand_left_grid">
											<div class="agile_top_brand_left_grid_pos">
												<?php if($sp->sanpham_gia_khuyen_mai > 0): ?>
												<img src="frontend/images/offer.png" alt=" " class="img-responsive" />												
												<?php endif; ?>
											</div>
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<a href="sanpham/<?php echo e($sp->id); ?>/<?php echo e($sp->sanpham_url); ?>.html"><img title=" " alt=" " src="images/sanpham/<?php echo e($sp->sanpham_anh); ?>" height="250px" width="auto" /></a>		
															<p style="height: 40px;"><?php echo e($sp->sanpham_ten); ?></p>
															<?php if($sp->sanpham_gia_khuyen_mai > 0): ?>
															<h4><?php echo number_format($sp->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($sp->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
															<?php else: ?>
																<h4><?php echo number_format($sp->sanpham_gia,0,",","."); ?> vnđ </h4>
															<?php endif; ?>
														</div>
														<div class="snipcart-details top_brand_home_details" style="height: 40px;">
															<?php 
															$slht = App\ThongKe::where('sanpham_id',$sp->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
															?>
																
															<?php if( $slht->thongke_so_luong_hien_tai > 0 && $slht->thongke_so_luong_hien_tai <= 20): ?>
															<form action="giohang/them/<?php echo e($sp->id); ?>" method="get">
																<fieldset>
																	<input type="submit" value="Add to cart" class="button"  />

																</fieldset>
															</form>
																<small>
																	Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm
																</small>

															<?php elseif($slht->thongke_so_luong_hien_tai > 0 ): ?>
															<form action="giohang/them/<?php echo e($sp->id); ?>" method="get">
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
				<?php else: ?>
				<?php echo e('Không tìm thấy tên sản phẩm nào giống với từ khóa'); ?>

				<?php endif; ?>
				
				
				<nav class="numbering">
					<ul class="pagination">
                    <?php echo e($sanpham->links()); ?>

                </ul>
				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php echo $__env->make('layouts.sanphammoi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
    var products = $('.bbb');
    products.sort(function(a, b){ return $(a).data("price")-$(b).data("price")});
    $(".aaa").html(products);

}

function sortProductsPriceDescending()
{
    var products = $('.bbb');
    products.sort(function(a, b){ return $(b).data("price") - $(a).data("price")});
    $(".aaa").html(products);

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>