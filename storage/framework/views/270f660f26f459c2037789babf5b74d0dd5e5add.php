<?php $__env->startSection('content'); ?>
	<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="trangchu"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Thanh toán</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<form id="contactForm" action="thanhtoan" method="post" class="contact-form">
	<?php echo e(csrf_field()); ?>

	<div class="checkout">
	<div class="container">
		<div class="content">
			
			<div class="col-md-4">
				<h4 style="text-transform: uppercase; color: green;">thông tin người nhận hàng</h4>
				
				<div class="space20">&nbsp;</div>
				<form>
					

				<div class="form-group">
					<label for="donhang_nguoi_nhan">Họ tên*</label>
					<input type="text" name="donhang_nguoi_nhan" placeholder="Họ tên" class="form-control " value="<?php echo Auth::user()->full_name; ?>" >
					<div style="color: red">
						<?php echo $errors->first('donhang_nguoi_nhan'); ?>

					</div>
				</div>
				<div class="form-group">
					<label for="donhang_nguoi_nhan_email">Email*</label>
					<input type="text" name="donhang_nguoi_nhan_email" placeholder="Email" class="form-control " value="<?php echo Auth::user()->email; ?>" >
					<div style="color: red">
						<?php echo $errors->first('donhang_nguoi_nhan_email'); ?>

					</div>
				</div>
				<div class="form-group">
					<label for="donhang_nguoi_nhan_sdt">Số điện thoại*</label>
					<input type="text" name="donhang_nguoi_nhan_sdt" placeholder="Số điện thoại" class="form-control " value="<?php echo Auth::user()->user_sdt; ?>" >
					<div style="color: red">
						<?php echo $errors->first('donhang_nguoi_nhan_sdt'); ?>

					</div>
				</div>
				<div class="form-group">
					<label for="donhang_nguoi_nhan_dia_chi">Địa chỉ*</label>
					<input type="text" name="donhang_nguoi_nhan_dia_chi" placeholder="Địa chỉ" class="form-control " value="<?php echo Auth::user()->user_dia_chi; ?>" >
					<div style="color: red">
						<?php echo $errors->first('donhang_nguoi_nhan_dia_chi'); ?>

					</div>
				</div>
				<div class="form-group">
					<label for="donhang_ghi_chu">Ghi chú (nếu có)</label><br>
					<textarea name="donhang_ghi_chu" class="form-control">
					</textarea>
					
				</div>
				</form>
			</div>
		
			<div class="col-md-8">
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
						</tr>
					</thead>
					
					<?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr class="rem1">
						<input type="hidden" id="rowId<?php echo e($item->id); ?>" value="<?php echo e($item->rowId); ?>">
						<td class="invert"><?php echo e($item->id); ?></td>
						<td class="invert-image" width="300px"><a href="sanpham/<?php echo e($item->id); ?>/<?php echo e($item->options->sanpham_url); ?>.html"><img src="images/sanpham/<?php echo e($item->options->anh); ?>" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									
									<div id="value<?php echo e($item->id); ?>"><span><?php echo e($item->qty); ?></span></div>
									
								</div>
							</div>
							<div style="margin-top: 5px;">
								<small><?php echo e($item->options->dvt); ?></small>
							</div>
						</td>
						<td class="invert"><?php echo e($item->name); ?></td>
						
						<td class="invert"><?php echo e($item->price); ?>/<?php echo e($item->options->dvt); ?></td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
						<?php echo e('Hiện tại không có sản phẩm nào trong giỏ hàng '); ?>

						
					<?php endif; ?>
								
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket"  style="width: 320px;">
					<h4>Hóa đơn</h4>
					<ul>
						<?php $__currentLoopData = $cartItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>Sản phẩm <?php echo e($item->id); ?> <i>-</i> <span><?php echo number_format($item->qty * $item->price,0,",","."); ?> vnđ </span></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<li>Tổng tiền trước thuế <i>-</i> <span><?php echo number_format(Cart::subtotal(),0,",","."); ?> vnđ  </span></li>
						<li>Tax(%) <i>-</i> <span><?php echo number_format(Cart::tax(),0,",","."); ?> vnđ</span></li>
						<li class="tongtien">Tổng tiền <i>-</i> <span><?php echo number_format(Cart::total(),0,",","."); ?> vnđ</span></li>
					</ul>
				</div>

				<div class="checkout-right-basket">
					<button hidden="" type="submit" id="submitBtn">Hidden Button</button>
					<a href="javascript:;" class="myClass" onclick="$('#submitBtn').click();"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>Đặt hàng</a><br><br>
					<a href="giohang"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Trở về giỏ hàng</a>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			</div>

		</div>
	</div>
</div>
	</form>
<!-- //checkout -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>