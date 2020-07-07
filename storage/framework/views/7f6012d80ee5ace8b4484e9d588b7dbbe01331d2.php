<?php $__env->startSection('content'); ?>

    <form action="admin/sanpham/them" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/sanpham/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Sản phẩm</i></a>
                <small style="color:white">/Thêm</small>
              </h1>
            
            </div>
            <div class="panel-body">
            
                <?php if(session('thongbao')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('thongbao')); ?>

                    </div>
                <?php endif; ?>
                <?php if(session('loi')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session('loi')); ?>

                    </div>
                <?php endif; ?>
        <div class="col-lg-12">
                     
            <div class="form-group">
                    <label>Nhà cung cấp</label>
                        <select class="form-control" name="nhacungcap_id">
                             <option selected hidden disabled>
                                        --Chọn nhà cung cấp--
                                  </option>
                            <?php $__currentLoopData = $nhacungcap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ncc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ncc->id); ?>"><?php echo e($ncc->nhacungcap_ten); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                 <div style="color: red">
                <?php echo $errors->first('nhacungcap_id'); ?>

            </div>
            </div>
        </div>
        <div class="col-lg-6">
            
        
            <div class="form-group">
                    <label>Nhóm sản phẩm</label>
                        <select class="form-control" name="nhom_id" id="nhom" >
                            <option selected hidden disabled>
                                        --Chọn nhóm sản phẩm--
                                  </option>
                            <?php $__currentLoopData = $nhom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ntp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($ntp->id); ?>"><?php echo e($ntp->nhom_ten); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </select>
                <div style="color: red">
                <?php echo $errors->first('nhom_id'); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                    <label>Loại sản phẩm</label>
                        <select class="form-control" name="loaisanpham_id" id="loaisanpham">
                
                    </select>
                    <div style="color: red">
                <?php echo $errors->first('loaisanpham_id'); ?>

            </div>
            </div>
        </div>
        <div class="col-lg-12">
            
        </div>
        <div class="col-lg-12">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="sanpham_ten" value="<?php echo old('sanpham_ten'); ?>" placeholder="Nhập tên sản phẩm..." />
            <div style="color: red">
                <?php echo $errors->first('sanpham_ten'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="sanpham_anh" class="form-control" />
            <div style="color: red">
                <?php echo $errors->first('sanpham_anh'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control ckeditor" rows="2" name="sanpham_mo_ta" ><?php echo old('sanpham_mo_ta'); ?></textarea>
            <div style="color: red">
                <?php echo $errors->first('sanpham_mo_ta'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Giá bán</label>
            <input class="form-control" name="sanpham_gia" value="<?php echo old('sanpham_gia'); ?>" placeholder="Nhập giá bán..." />
            <div style="color: red">
                <?php echo $errors->first('sanpham_gia'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Giá khuyến mãi (nếu có)</label>
            <input class="form-control" name="sanpham_gia_khuyen_mai" value="<?php echo old('sanpham_gia_khuyen_mai'); ?>" placeholder="Nhập giá khuyến mãi..." />
            <div style="color: red">
                <?php echo $errors->first('sanpham_gia_khuyen_mai'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Số lượng nhập vào</label>
            <input class="form-control" name="sanpham_so_luong_nhap" value="<?php echo old('sanpham_so_luong_nhap'); ?>" placeholder="Nhập số lượng nhập..." />
            <div style="color: red">
                <?php echo $errors->first('sanpham_so_luong_nhap'); ?>

            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Đơn vị tính</label>
                <select class="form-control" name="donvitinh_id">
                    <option selected hidden disabled>
                                        --Chọn đơn vị tính--
                                  </option>
                    <?php $__currentLoopData = $donvitinh; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dvt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($dvt->id); ?>"><?php echo e($dvt->donvitinh_ten); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            <div style="color: red">
                <?php echo $errors->first('donvitinh_id'); ?>

            </div>
        </div>
    </div>

     <div class="col-lg-12">
        <div class="form-group">
            <label>Nổi bật</label>
                <label class="radio-inline">
                    <input name="sanpham_noi_bat" value="0" checked="" type="radio">Không
                </label>
                <label class="radio-inline">
                    <input name="sanpham_noi_bat" value="1" type="radio">Có
                </label>
        </div>
    </div>
                           
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/sanpham/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
        
        </div>
        </div>
    <form>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   <script>

        $(document).ready(function()
           {
                    
                $("#nhom").change(function(){
                    var nhom_id = $(this).val();
                    $.get("admin/ajax/loaisanpham/"+nhom_id,function(data){
                        $("#loaisanpham").html(data);
                    });
                });

                var nhom_id = $("#nhom").val();
                    $.get("admin/ajax/loaisanpham/"+nhom_id,function(data){
                        $("#loaisanpham").html(data);
                    });

        });

   </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>