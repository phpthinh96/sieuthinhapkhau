

<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        Đơn hàng
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>      

<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách đơn hàng</i></b>
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
            <tr align="center">
                <th>ID</th>
                <th>Tên khách hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Tổng tiền</th>
                <th>Tình trạng</th>
                <th>Chức năng</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="even gradeC" align="center">
                    <td><?php echo $dh->id; ?></td>
                    <td>
                    <?php echo $dh->user->name; ?>

                    </td>
                    
                    <td><?php echo e(Carbon\Carbon::parse($dh->created_at)->format('H:m:s d-m-Y')); ?></td>
                    <td><?php echo number_format("$dh->donhang_tong_tien",0,",","."); ?> vnđ </td>
                    <td>
                    <?php echo $dh->tinhtrangdonhang->tinhtrangdonhang_ten; ?>

                    </td>
                   
                    <td class="center">
                    <a href="admin/donhang/sua-thong-tin-giao-hang/<?php echo e($dh->id); ?>" 
                       type="button" class="btn btn-primary" 
                       data-toggle="tooltip" data-placement="left" 
                       title="Cập nhât Thông tin Giao hàng">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="admin/donhang/xem-don-hang/<?php echo e($dh->id); ?>"
                       type="button" class="btn btn-warning" 
                       data-toggle="tooltip" data-placement="left" 
                       title="Cập nhât Tình trạng đơn hàng">
                        <i class="fa fa-exchange"></i>
                    </a>
                    <a href="admin/donhang/in-hoa-don/<?php echo e($dh->id); ?>" 
                       type="button" class="btn btn-default" 
                       data-toggle="tooltip" data-placement="left" 
                       title="In hóa đơn">
                        <i class="fa fa-print"></i>
                    </a>
                    </td>
                    <td>
                        <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/donhang/xoa/<?php echo e($dh->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
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