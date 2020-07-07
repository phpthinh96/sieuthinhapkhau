<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        Loại sản phẩm / 
        <a href="admin/loaisanpham/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách loại sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Loại sản phẩm</th>
                <th class="col-lg-5">Mô tả</th>
                <th class="col-lg-2">Nhóm sản phẩm</th>
                <th class="col-lg-4">Chức năng</th>
               
            </tr>
        </thead>
        <tbody>
           <?php $__currentLoopData = $loaisanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lsp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX" align="center">
                <td><?php echo $lsp->id; ?></td>
                <td><?php echo $lsp->loaisanpham_ten; ?></td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'><?php echo $lsp->loaisanpham_mo_ta; ?></td>
                <td><?php echo $lsp->nhom->nhom_ten; ?></td>
                <td class="center">
                    <div style="margin-top: 10px;">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/loaisanpham/xoa/<?php echo e($lsp->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
            </div>
            <div style="margin-top: 10px;">
                <a href="admin/loaisanpham/sua/<?php echo e($lsp->id); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
            </div>
            <div style="margin-top: 10px;">
                <a href="admin/loaisanpham/lich-su-hoat-dong/<?php echo e($lsp->id); ?>" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
                    <i class="fa fa-history"></i>
                </a>
            </div>
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