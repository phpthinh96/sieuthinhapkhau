
<?php $__currentLoopData = $lichsu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
    <?php if($history->key == 'created_at' && !$history->old_value): ?>
    <li><?php echo e($history->userResponsible()->name); ?> created this resource at <?php echo e($history->newValue()); ?></li>
  <?php else: ?>
    <li><?php echo e($history->userResponsible()->name); ?> changed <?php echo e($history->fieldName()); ?> from '<?php echo e($history->oldValue()); ?>' to '<?php echo e($history->newValue()); ?>'</li>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
