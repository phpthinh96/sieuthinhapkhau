<style type="text/css">
	table { border-spacing: 10px; }
	td { text-align: center;}
	div { size: 20px; font-weight: bold; }
</style>
<div>Lịch sử thao tác trên loại sản phẩm <a href="/admin/loaisanpham/sua/<?php echo e($loaisanpham->id); ?>"><?php echo e($loaisanpham->loaisanpham_ten); ?></a></div>
<table style="">
<?php $__currentLoopData = $loaisanpham->revisionHistory()->latest('created_at')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	
    <?php if($history->key == 'created_at' && !$history->old_value): ?>
    <li><?php echo e($history->userResponsible()->name); ?> created this resource at <?php echo e($history->newValue()); ?></li>
  <?php else: ?>
    	
    	<tr>
    		<td><b>></b></td>
    		<td><b style="color: red;"><?php echo e($history->userResponsible()->name); ?></b></td>
    		<td>đã thay đổi trường</td>
    		<td><b style="color: red;"><?php echo e($history->fieldName()); ?></b></td>
    		<td>từ</td>
    		<td><b style="color: brown;"><?php echo e($history->oldValue()); ?></b></td>
    		<td>sang</td>
    		<td><b style="color: blue;"><?php echo e($history->newValue()); ?></b></td>
    		<td>lúc</td>
    		<td><?php echo e($history->created_at); ?></td>

    	</tr>
    	
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
