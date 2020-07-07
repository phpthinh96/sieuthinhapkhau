<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="trangchu" class="act">Home</a></li>	
									<!-- Mega Menu -->

									<?php $__currentLoopData = $nhom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e($ntp->nhom_ten); ?><b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6><?php echo e($ntp->nhom_ten); ?></h6>
														<?php $__currentLoopData = $ntp->loaisanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<?php if(count($lsp->sanpham) > 0): ?>
														<li><a href="loaisanpham/<?php echo e($lsp->id); ?>/<?php echo e($lsp->loaisanpham_url); ?>.html"><?php echo e($lsp->loaisanpham_ten); ?></a></li>
														<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												</div>	
												
											</div>
										</ul>
									</li>
									
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<li><a href="lienhe">Liên hệ</a></li>
								</ul>
							</div>
							</nav>
			</div>
		</div>
		
<!-- //navigation -->