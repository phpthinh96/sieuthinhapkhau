<?php $__env->startSection('content'); ?>
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="trangchu"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Đăng ký</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Đăng ký</h2>
			<div class="login-form-grids">
				<h6>Thông tin</h6>
				<?php if(session('thongbao')): ?>
					<div class="alert alert-success">
						<?php echo e(session('thongbao')); ?>

					</div>
				<?php endif; ?>
					<form action="dangky" method="post">

					<?php echo e(csrf_field()); ?>

					<input type="text" placeholder="Username" name="name" value="<?php echo old('name'); ?>" >
					<p style="color: red">
               			 <?php echo $errors->first('name'); ?>

            		</p><br>

            		<input type="text" placeholder="Fullname" name="full_name" value="<?php echo old('full_name'); ?>" >
					<p style="color: red">
               			 <?php echo $errors->first('full_name'); ?>

            		</p><br>

					<input type="email" placeholder="Email Address" name="email" value="<?php echo old('email'); ?>" >
					<p style="color: red">
               			 <?php echo $errors->first('email'); ?>

            		</p>
					<input type="password" placeholder="Password" name="password" >
					<p style="color: red">
               			 <?php echo $errors->first('password'); ?>

            		</p>
					
					<input type="password" placeholder="Password Confirmation" name="re_password">
					<p style="color: red">
               			 <?php echo $errors->first('re_password'); ?>

            		</p><br>
					<input type="text" placeholder="Phone Number" name="user_sdt" value="<?php echo old('user_sdt'); ?>" >
					<p style="color: red">
               			 <?php echo $errors->first('user_sdt'); ?>

            		</p><br>
					<input type="text" placeholder="Address" name="user_dia_chi" value="<?php echo old('user_dia_chi'); ?>" >
					<p style="color: red">
               			 <?php echo $errors->first('user_dia_chi'); ?>

            		</p>
					<input type="submit" value="Đăng ký">
				</form>
			</div>
			<div class="register-home">
				<a href="trangchu">Home</a>
			</div>
		</div>
	</div>
<!-- //register -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>