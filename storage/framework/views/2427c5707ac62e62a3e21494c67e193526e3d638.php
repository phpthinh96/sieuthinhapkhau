<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        Đơn vị tính / 
        <a href="admin/donvitinh/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách đơn vị tính</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-1">Đơn vị tính</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
           <?php $__currentLoopData = $donvitinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dvt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX" align="center">
                <td><?php echo $dvt->id; ?></td>
                <td><?php echo $dvt->donvitinh_ten; ?></td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/donvitinh/xoa/<?php echo e($dvt->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                <td class="center"><a href="admin/donvitinh/sua/<?php echo e($dvt->id); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>