<?php $__env->startSection('content'); ?>

    <form action="admin/loaisanpham/sua/<?php echo e($loaisanpham->id); ?>" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/loaisanpham/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Loại sản phẩm</i></a>
                 <small style="color:white">/Cập nhật</small>
              </h1>
            </div>
            <div class="panel-body">
       
            <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
    <div class="col-lg-12">
        <div class="form-group">
            <input type="checkbox" class="" name="change" id="change">
            <label>Tên loại sản phẩm</label>
            <input class="form-control change" name="loaisanpham_ten" placeholder="Nhập tên loại sản phẩm..." value="<?php echo $loaisanpham->loaisanpham_ten; ?>" disabled="" />
            <div style="color: red">
                <?php echo $errors->first('loaisanpham_ten'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control ckeditor" rows="2" name="loaisanpham_mo_ta" ><?php echo $loaisanpham->loaisanpham_mo_ta; ?></textarea>
            
            <div style="color: red">
                <?php echo $errors->first('loaisanpham_mo_ta'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
             <label>Nhóm thực phẩm</label>
                <select class="form-control" name="nhom_id">
                        <?php $__currentLoopData = $nhom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                            <option
                                <?php if($loaisanpham->nhom_id == $ntp->id ): ?>
                                    <?php echo e("selected"); ?>

                                <?php endif; ?>
                            value="<?php echo e($ntp->id); ?>"><?php echo e($ntp->nhom_ten); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
        </div>
    </div>
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/loaisanpham/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
        
        </div>
        </div>
    <form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#change').change(function(){
                        if ($(this).is(':checked')) {
                            $('.change').removeAttr('disabled');
                        } else {
                            $('.change').attr('disabled','');
                        }
                    });
                });

            </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>