<?php $__env->startSection('content'); ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Đăng nhập</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Đăng nhập</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<?php if(session('thongbao')): ?>
					<div class="alert alert-danger">
						<?php echo e(session('thongbao')); ?>

					</div>
				<?php endif; ?>
				<form action="dangnhap" method="post">
					<?php echo e(csrf_field()); ?>

					<input type="email" placeholder="Email Address" name="email" >
					<p style="color: red">
               			 <?php echo $errors->first('email'); ?>

            		</p>
					<input type="password" placeholder="Password" name="password"  >
					<p style="color: red">
               			 <?php echo $errors->first('password'); ?>

            		</p><br>
				<div class="g-recaptcha" data-sitekey="6LeA808UAAAAAOXRLeNNJ8Sf2nwwTJXh8LaZMj_L"></div> 
					<input type="submit" value="Đăng nhập">
				</form>
			</div>
			<h4>Cho Người Mới</h4>
			<p><a href="dangky">Đăng ký</a> (Hoặc) trở về <a href="">Trang chủ<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>