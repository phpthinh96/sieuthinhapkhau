<?php $__env->startSection('content'); ?>
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
			<h2>Hiện tại giỏ hàng có: <span><?php echo e(Cart::count()); ?> Sản phẩm</span></h2>
			<div class="checkout-right">
				
				<table class="timetable_sub">
					<thead>
						<?php if(Cart::count() != 0): ?>
						<tr>
							<th>ID</th>	
							<th>Ảnh</th>
							<th>Số lượng</th>
							<th>Tên sản phẩm</th>	
							<th>Giá</th>
							<th>Xóa</th>
						</tr>
					</thead>
					
					<?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="rem1">
						<input type="hidden" id="rowId<?php echo e($item->id); ?>" value="<?php echo e($item->rowId); ?>">
						<td class="invert"><?php echo e($item->id); ?></td>
						<td class="invert-image" width="350px"><a href="sanpham/<?php echo e($item->id); ?>/<?php echo e($item->options->sanpham_url); ?>.html"><img src="images/sanpham/<?php echo e($item->options->anh); ?>" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<div class="entry value-minus" id="value-minus<?php echo e($item->id); ?>">&nbsp;</div>
									<div class="entry value" id="value<?php echo e($item->id); ?>"><span><?php echo e($item->qty); ?></span></div>
									<div class="entry value-plus active" id="value-plus<?php echo e($item->id); ?>">&nbsp;</div>
								</div>
							</div>
							
							<div style="margin-top: 5px;">
								<small><?php echo e($item->options->dvt); ?></small>
							</div>
						
							<?php 
								$slht = App\ThongKe::where('sanpham_id',$item->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
							?>
							<?php if($slht->thongke_so_luong_hien_tai <= 20): ?>
							
							<br><small>
									<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
							</small>
							
							<?php endif; ?>
						</td>
						<td class="invert"><?php echo e($item->name); ?></td>
						
						<td class="invert"><?php echo e($item->price); ?>/<?php echo e($item->options->dvt); ?></td>
						<td class="invert" width="70px">
							<div class="rem" >
								<a href="giohang/xoa/<?php echo e($item->rowId); ?>" class="close1"> </a>
							</div>
		
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<?php echo e('Hiện tại không có sản phẩm nào trong giỏ hàng '); ?>

						
					<?php endif; ?>
								
				</table>
			</div>

			<div class="checkout-left">	
				<div class="checkout-left-basket">
					<h4>Hóa đơn</h4>
					<ul>
						<?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
						Sản phẩm <?php echo e($item->id); ?> <i>-</i> <span><?php echo number_format($item->qty * $item->price,0,",","."); ?> vnđ </span>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						<li>Tổng tiền trước thuế <i>-</i> <span><?php echo number_format(Cart::subtotal(),0,",","."); ?> vnđ </span></li>
						<li>Tax(%) <i>-</i> <span><?php echo number_format(Cart::tax(),0,",","."); ?> vnđ</span></li>
						<li class="tongtien">Tổng tiền <i>-</i> <span><?php echo number_format(Cart::total(),0,",","."); ?> vnđ</span></li>
					</ul>
				</div>

				<div class="checkout-right-basket">
					<?php if(Auth::check()): ?>
						<a href="thanhtoan"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Đi tiếp</a><br><br>
						<a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>
					<?php else: ?>

						<a href="dangnhap"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Đi tiếp</a><br><br>
						<a href=""><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>

					<?php endif; ?>
					
				</div>

				

				<div class="clearfix"> </div>
			</div>
				
		</div>
	</div>
<!-- //checkout -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
	<!--quantity-->
		<script>
		$(document).ready(function(){
			// $('#CartMsg').hide();
			<?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			$('#value-plus<?php echo e($item->id); ?>').on('click', function(){
				var divUpd = $(this).parent().find('#value<?php echo e($item->id); ?>'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
				var rowId = $('#rowId<?php echo e($item->id); ?>').val();
				var kho = <?php echo e($item->options->kho); ?>;
				if(newVal<= kho) 
				{
					divUpd.text(newVal);
				} else {
					var newVal = kho;
					divUpd.text(newVal);
					alert('Không thể mua vượt quá số lượng còn lại');

				}
				$.ajax({
					url: '<?php echo e(url('giohang/sua')); ?>',
					data: 'rowId=' + rowId + '&newQty=' + newVal,
					type: 'get',
					success:function(response){
						// $('#CartMsg').show();
						console.log(response);
						// $('#CartMsg').html(response);
					}
				});
			});

			$('#value-minus<?php echo e($item->id); ?>').on('click', function(){
				var divUpd = $(this).parent().find('#value<?php echo e($item->id); ?>'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) 
				{
					divUpd.text(newVal);
				} else {
					var newVal = 1;
					divUpd.text(newVal);

				}
				var rowId = $('#rowId<?php echo e($item->id); ?>').val();
				$.ajax({
					url: '<?php echo e(url('giohang/sua')); ?>',
					data: 'rowId=' + rowId + '&newQty=' + newVal,
					type: 'get',
					success:function(response){
						$('#CartMsg').show();
						console.log(response);
						$('#CartMsg').html(response);
					}
				});
			});
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		});
		
		</script>
	<!--quantity-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>