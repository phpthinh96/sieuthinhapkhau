
<?php $__env->startSection('title'); ?>
    <h3 class="page-header ">
        Khuyến mãi / 
        <a href="admin/khuyenmai/them" class="btn btn-info" style="margin-top:-8px;" >Thêm mới</a>
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
     <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
<div class="panel-heading">
    <b><i>Danh sách tin khuyến mãi</i></b>
</div>
<!-- /.panel-heading -->

<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tình trạng</th>
                <th>Tiêu đề</th>
                <th>Tỷ lệ KM</th>
                <th>Thời gian KM</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $khuyenmai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $km): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX">
                <td><?php echo $km->id; ?></td>
                <td><p style="text-align: center;"><img width="100px"  alt="image" src="images/khuyenmai/<?php echo e($km->khuyenmai_anh); ?>"></p></td>
                <td>
                    <?php if($km->khuyenmai_tinh_trang == 1): ?>
                        <?php echo e('Còn KM'); ?>

                    <?php else: ?>
                        <?php echo e('Hết KM'); ?>

                    <?php endif; ?>
                </td>
                
                <td><?php echo $km->khuyenmai_tieu_de; ?></td>
                <td><?php echo $km->khuyenmai_phan_tram; ?> %</td>
                <td><?php echo $km->khuyenmai_so_ngay; ?> ngày</td>
                <td>
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/khuyenmai/xoa/<?php echo e($km->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
                <td class="center"><a href="admin/khuyenmai/sua/<?php echo e($km->id); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>

            </tr>

           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>