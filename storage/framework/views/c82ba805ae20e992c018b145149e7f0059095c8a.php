<?php $__env->startSection('title'); ?>
<h3 class="page-header ">
    <a href="admin/khohang/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Kho hàng</i></a>
    /Sản phẩm đã bán
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    Danh sách sản phẩm
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center">
                <th>ID</th>
                <th>Tên</th>
                <th>Loại</th>
                <th>ĐVT</th>            
                
                <th>Nhập vào</th>
                <th>Đã bán</th>
                <th>Hiện tại</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sanphamdaban; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($item->so_luong_da_ban > 0): ?>
            <tr class="odd gradeX" align="center">
                <td><?php echo $item->sanpham->id; ?></td>
                <td><?php echo $item->sanpham->sanpham_ten; ?></td>
                <td>
                    <?php echo e($item->sanpham->loaisanpham->loaisanpham_ten); ?>

                </td>
                <td>
                    <?php echo e($item->sanpham->donvitinh->donvitinh_ten); ?>

                </td>    
                
                <td><?php echo $item->so_luong_nhap; ?></td>
                <td><?php echo $item->so_luong_da_ban; ?></td>
                <?php 
                                   
                    $hientai = App\ThongKe::where('sanpham_id',$item->sanpham_id)->selectRaw('sanpham_id,thongke_so_luong_hien_tai')->latest('updated_at')->first();
                           
                ?>
                <td><?php echo $hientai->thongke_so_luong_hien_tai; ?></td>
            </tr>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>