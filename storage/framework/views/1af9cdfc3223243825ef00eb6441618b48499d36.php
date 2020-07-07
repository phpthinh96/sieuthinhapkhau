<?php $__env->startSection('content'); ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="trangchu"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Sản phẩm</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				<?php if(session('thongbao')): ?>
					<div class="alert alert-danger">
						<?php echo e(session('thongbao')); ?>

					</div>
				<?php endif; ?>
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="images/sanpham/<?php echo e($sanpham->sanpham_anh); ?>" alt=" " class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
					<h2><?php echo e($sanpham->sanpham_ten); ?></h2>
					
					
					<div class="w3agile_description">
						<h4>Thông tin sản phẩm :</h4>
						<p><?php echo $sanpham->sanpham_mo_ta; ?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<?php if($sanpham->sanpham_gia_khuyen_mai > 0): ?>
							<h4 class="m-sing"><?php echo number_format($sanpham->sanpham_gia_khuyen_mai,0,",","."); ?> vnđ <span><?php echo e(number_format($sanpham->sanpham_gia,0,",",".")); ?> vnđ</span></h4>
							<?php else: ?>
								<h4 class="m-sing"><?php echo number_format($sanpham->sanpham_gia,0,",","."); ?> vnđ </h4>
							<?php endif; ?>
						</div>
						<div class="snipcart-details agileinfo_single_right_details">
							<?php 
							$slht = App\ThongKe::where('sanpham_id',$sanpham->id)->selectRaw('thongke_so_luong_hien_tai')->latest('updated_at')->first();
							?>
							<div style="margin-bottom: 10px; text-align: left;">
								<small>Đơn vị tính: <?php echo e($sanpham->donvitinh->donvitinh_ten); ?></small>
							</div>
							<?php if($slht->thongke_so_luong_hien_tai > 0): ?>
							<form action="giohang/them/<?php echo e($sanpham->id); ?>" method="get">
								<fieldset>
									<input type="submit" value="Add to cart" class="button" />
								</fieldset>
							</form>

							<?php else: ?>
								<fieldset style="height: 33px;">
									<b style="color: red;">Hết hàng</b>
								</fieldset>	
							<?php endif; ?>
							
							<?php if($slht->thongke_so_luong_hien_tai <= 20): ?>
							
							<small>
									<i>Chỉ còn lại <?php echo e($slht->thongke_so_luong_hien_tai); ?> sản phẩm</i>
							</small>
							
							<?php endif; ?>
							
						</div>

					</div>
					<?php if(Auth::check()): ?>
	                
	                <div class="well" style="margin-top: 50px;">
	                    <?php if(session('binhluan')): ?>
	                    <div class="alert alert-success">
	                        <?php echo e(session('binhluan')); ?>

	                    </div>
	                	<?php endif; ?>
	                    <h5>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h5><br>
	                    <form role="form" action="binhluan/<?php echo e($sanpham->id); ?>" method="post">
	                        <?php echo e(csrf_field()); ?>

	     
	                        <div class="form-group">
	                        	<label>Nội dung</label>
	                            <textarea class="form-control" name="binhluan_noi_dung" rows="3"></textarea>
	                        </div>
	                        <button type="submit" class="btn btn-primary">Gửi</button>
	                    </form>
	                </div>
	                <hr>
	                <?php endif; ?>
	                

	                <!-- Posted Comments -->

	                <!-- Comment -->
	                <?php if(count($binhluan)>0): ?>
	               <h4 style="margin-top: 50px;"><i class="fa fa-comments-o"></i> Danh sách bình luận</h4>
               		<?php endif; ?>
	                <?php $__currentLoopData = $binhluan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <div class="media" style="margin-top: 40px;">
	                	<?php if($cm->user->user_anh == ""): ?>
	                		<img class="media-object pull-left" alt="image" src="images/user/user.jpg" width="60px" height="50px">
	                	<?php else: ?>
	                	
	                        <img class="media-object pull-left" src="images/user/<?php echo e($cm->user->user_anh); ?>" width="60px" height="50px" alt="image">
	                    <?php endif; ?>
	                    <div class="media-body">

	                        <h4 class="media-heading"><?php echo e($cm->user->name); ?>

	                            <small><?php echo e($cm->created_at); ?></small>
	                        </h4>
	                        <?php echo e($cm->binhluan_noi_dung); ?>

	                    </div>
	                    
	                </div>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
				
					<nav class="numbering">
						<ul class="pagination">
	                    <?php echo e($binhluan->links()); ?>

	                </ul>
					</nav>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
<?php echo $__env->make('layouts.sanphamlienquan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>