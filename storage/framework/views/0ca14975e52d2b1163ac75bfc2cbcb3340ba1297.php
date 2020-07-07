<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        User 
        
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách user</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
     <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-1">Username</th>
                <th class="col-lg-1">Email</th>
                <th class="col-lg-5">Địa chỉ</th>
                <th class="col-lg-1">Số điện thoại</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Lịch sử mua hàng</th>

            </tr>
        </thead>
        <tbody>            
           <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $us): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX" align="center">
                <td><?php echo $us->id; ?></td>
                <td><?php echo $us->name; ?></td>
                <td><?php echo $us->email; ?></td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'><?php echo $us->user_dia_chi; ?></td>
                <td><?php echo $us->user_sdt; ?></td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/user/xoa/<?php echo e($us->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                <td class="center"><a href="admin/user/lich-su-mua-hang/<?php echo e($us->id); ?>" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Xem lịch sử mua hàng"><i class="fa fa-history"></i></a>
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