<?php $__env->startSection('content'); ?>
<div class="register">
	

<div class="container">
	

<div>
<h1 align="center">Cảm ơn <?php echo e(Auth::user()->name); ?></h1>
</div>
<div style="text-align: center;">
<p class="panel-body">
    Đơn hàng của bạn đã được đặt</p>
</div>
	<div class="register-home">
				<a href="trangchu">Home</a>
			</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>