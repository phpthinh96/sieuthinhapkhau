

<?php $__env->startSection('content'); ?>
<form action="admin/khuyenmai/sua/<?php echo e($khuyenmai->id); ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="admin/khuyenmai/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Khuyến mãi</i></a>
                /Cập nhật
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/khuyenmai/danhsach" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
                 <?php if(session('loi')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('loi')); ?>

                    </div>
                <?php endif; ?>
                 <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
        <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Thông tin khuyến mãi</h3>
            </div>
            <div class="panel-body">
            <div class="col-lg-12">
            <div class="form-group">
                <label>Tiêu đề</label>
                <input class="form-control" name="khuyenmai_tieu_de" value="<?php echo $khuyenmai->khuyenmai_tieu_de; ?>">
                <div>
                    <?php echo $errors->first('khuyenmai_tieu_de'); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Nội dung</label>
                <textarea class="form-control" rows="3" name="khuyenmai_noi_dung" ><?php echo $khuyenmai->khuyenmai_noi_dung; ?></textarea>
                <script type="text/javascript">CKEDITOR.replace('khuyenmai_noi_dung'); </script>
                <div>
                    <?php echo $errors->first('khuyenmai_noi_dung'); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
                <div class="form-group">
                    <label>Tỷ lệ giá khuyến mãi</label>
                    <input class="form-control" name="khuyenmai_phan_tram" value="<?php echo $khuyenmai->khuyenmai_phan_tram; ?>" placeholder="VD: 10,20,30,..." />
                    <div>
                        <?php echo $errors->first('khuyenmai_phan_tram'); ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Thời gian khuyến mãi</label>
                    <input class="form-control" name="khuyenmai_so_ngay" value="<?php echo $khuyenmai->khuyenmai_so_ngay; ?>" placeholder="VD:10,30,..." />
                    <div>
                        <?php echo $errors->first('khuyenmai_so_ngay'); ?>

                    </div>
                </div>
            </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Hình ảnh</label>
                <p>
                <img src="images/khuyenmai/<?php echo e($khuyenmai->khuyenmai_anh); ?>" class="img-responsive img-rounded" alt="Image" style="width: 150px; height: 200px;">
                </p>
                <input type="file" name="khuyenmai_anh" >
            </div>
        </div>
     </div>
     </div>
    </div>
     <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Sản phẩm khuyến mãi</h3>
                </div>
            <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th></th>
                        <th class="col-lg-12">Sản phẩm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sanpham; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="products[<?php echo e($sp->id); ?>]" value = "<?php echo e($sp->id); ?>"
                            <?php $__currentLoopData = $sanphamkhuyenmai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spkm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($spkm->sanpham_id == $sp->id): ?>
                                <?php echo e("checked = 'true'"); ?>

                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            >
                        </td>
                        <td>
                            <?php echo $sp->sanpham_ten; ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                
            </table>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>