<style type="text/css">

</style>

<?php $__env->startSection('title'); ?>
    <h3 class="page-header">
        Sản phẩm / 
        <a href="admin/sanpham/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <?php if(session('thongbao')): ?>
        <div class="alert alert-success">
            <?php echo e(session('thongbao')); ?>

        </div>
    <?php endif; ?>
    <div class="dataTable_wrapper" >


    <table  class="table table-striped table-bordered table-hover" id="dataTables-example"> 
       
        <thead>
            <tr align="center" align="center">
                <th >ID</th>
                <th>Sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th class="col-sm-2">Loại sản phẩm</th>
                
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            
           <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr class="odd gradeX" align="center">
                <td><?php echo $sp->id; ?></td>
                <td><?php echo $sp->sanpham_ten; ?>

                    <p style="text-align: center;"><img width="150px" height="150px" alt="image" src="images/sanpham/<?php echo e($sp->sanpham_anh); ?>"></p>
                    
                    <?php if($sp->sanpham_noi_bat == 1): ?>
                        <p style="color: red;">Nổi bật</p>
                    
                    <?php endif; ?>
                </td>
                <td style = 'max-width: 180px;  word-wrap:break-word;'><?php echo $sp->sanpham_mo_ta; ?></td>
                <td>
                    <?php if($sp->sanpham_gia_khuyen_mai > 0): ?>
                        <?php echo number_format("$sp->sanpham_gia_khuyen_mai",0,",","."); ?> vnđ <br><br>

                      <strike><?php echo number_format("$sp->sanpham_gia",0,",","."); ?> vnđ </strike>
                    <?php else: ?>
                        <?php echo number_format("$sp->sanpham_gia",0,",","."); ?> vnđ 
                    <?php endif; ?>
                    
                   
                </td>
                
                
                <?php 
                    $thongke = App\ThongKe::where('sanpham_id',$sp->id)->select('thongke_so_luong_hien_tai')->latest('updated_at')->first(); 
                ?>
                <td><?php echo e($thongke['thongke_so_luong_hien_tai']); ?> <?php echo e($sp->donvitinh->donvitinh_ten); ?></td>
              
                <td><?php echo $sp->loaisanpham->loaisanpham_ten; ?></td>
                
                <td class="center">
                <div style="margin-top: 10px;">
                   
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/sanpham/xoa/<?php echo e($sp->id); ?>" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">
                    <i class="fa fa-trash-o  fa-fw"></i>
                </a>
                
                </div>
                <div style="margin-top: 10px;">
                    
                <a href="admin/sanpham/sua/<?php echo e($sp->id); ?>" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa">
                    <i class="fa fa-pencil fa-fw"></i>
                </a>
                
                </div>
                <div style="margin-top: 10px;">
                    
                <a href="admin/sanpham/lich-su-hoat-dong/<?php echo e($sp->id); ?>" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
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