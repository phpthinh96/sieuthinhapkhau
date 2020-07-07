<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        Nhà cung cấp / 
        <a href="admin/nhacungcap/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách nhà cung cấp</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Nhà cung cấp</th>
                <th class="col-lg-4">Địa chỉ</th>
                <th class="col-lg-2">Số điện thoại</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
                <th class="col-lg-2">Lịch sử</th>

            </tr>
        </thead>
        <tbody>
           <?php $__currentLoopData = $nhacungcap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX" align="center">
                <td><?php echo $ncc->id; ?></td>
                <td><?php echo $ncc->nhacungcap_ten; ?></td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'><?php echo $ncc->nhacungcap_dia_chi; ?></td>
                <td><?php echo $ncc->nhacungcap_sdt; ?></td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/nhacungcap/xoa/<?php echo e($ncc->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
                <td class="center"><a href="admin/nhacungcap/sua/<?php echo e($ncc->id); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
                <td class="center">
                    <a href="admin/nhacungcap/lich-su-hoat-dong/<?php echo e($ncc->id); ?>" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
                    <i class="fa fa-history"></i>
                </a>
                </td>
            </tr>
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