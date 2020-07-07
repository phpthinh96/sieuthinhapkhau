<?php $__env->startSection('content'); ?>
<form action="" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
     <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="admin/donhang/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Quản lý đơn hàng</i></a>
                /Cập nhật thông tin giao hàng / Đơn hàng #<?php echo e($donhang->id); ?>

              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/donhang/danhsach" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin khách hàng</h3>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Tên khách hàng</b></td>
                          <td><?php echo e($donhang->user->name); ?></td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td><?php echo $donhang->user->user_sdt; ?></td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td><?php echo $donhang->user->email; ?></td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td><?php echo $donhang->user->user_dia_chi; ?></td>
                      </tr>
                  </tbody>
              </table>
          </div>    
        </div>
        </div>
        <div class="col-lg-12">
        <br>
            <div class="form-group">
                <label for="input" >Tình trạng đơn hàng</label>
                <div>
                    <input class="form-control" value="<?php echo $donhang->tinhtrangdonhang->tinhtrangdonhang_ten; ?>" disabled="true" />
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin giao hàng</h3>
          </div>
          <div class="panel-body">
              <div class="col-lg-7">
            <div class="form-group">
                <label>Người nhận hàng</label>
                <input class="form-control" name="donhang_nguoi_nhan" value="<?php echo $donhang->donhang_nguoi_nhan; ?>"/>
               <div style="color: red">
                <?php echo $errors->first('donhang_nguoi_nhan'); ?>

            </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" name="donhang_nguoi_nhan_sdt" value="<?php echo $donhang->donhang_nguoi_nhan_sdt; ?>"/>
                  <div style="color: red">
                <?php echo $errors->first('donhang_nguoi_nhan_sdt'); ?>

            </div>
            </div>
            
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="donhang_nguoi_nhan_email" value="<?php echo $donhang->donhang_nguoi_nhan_email; ?>"/>
                <div style="color: red">
                <?php echo $errors->first('donhang_nguoi_nhan_email'); ?>

            </div>
            </div>
            
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Địa chỉ</label>
                <textarea class="form-control" name="donhang_nguoi_nhan_dia_chi" rows="2"><?php echo $donhang->donhang_nguoi_nhan_dia_chi; ?></textarea>
                <div style="color: red">
                <?php echo $errors->first('donhang_nguoi_nhan_dia_chi'); ?>

            </div>
            </div>
            
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Ghi chú</label>
                <textarea class="form-control" name="donhang_ghi_chu" rows="2" ><?php echo $donhang->donhang_ghi_chu; ?></textarea>
            </div>
        </div>
          </div>
        </div> 
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <h2 class="panel-title" ><b>Danh sách sản phẩm</b></h2>
          </div>
          <div class="panel-body">
            <div class="col-lg-12" >
                <div class="table-responsive">
                    <table class="table table-hovered" >
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Số lượng hiện tại</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; ?>
                            <?php $__currentLoopData = $donhang->chitietdonhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $count = $count + 1; ?></td>
                                    <td>
                                        <?php echo e($ct->sanpham->sanpham_ten); ?>

                                    </td>
                                    <td>
                                    <?php echo number_format($ct->chitietdonhang_don_gia,0,",","."); ?> vnđ/<?php echo e($ct->sanpham->donvitinh->donvitinh_ten); ?>

                                    </td>
                                    <td><?php echo $ct->chitietdonhang_so_luong; ?> <?php echo e($ct->sanpham->donvitinh->donvitinh_ten); ?></td>
                                    <td>
                                       <?php 
                                            $thongke = App\ThongKe::where('sanpham_id',$ct->sanpham->id)->select('thongke_so_luong_hien_tai')->latest('updated_at')->first(); 
                                        ?>
                                        <?php echo e($thongke['thongke_so_luong_hien_tai']); ?> <?php echo e($ct->sanpham->donvitinh->donvitinh_ten); ?>

                                    </td>
                                    <td><?php echo number_format("$ct->chitietdonhang_thanh_tien",0,",","."); ?> vnđ </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                
                            <td colspan="5">
                              <br><br><p>
                                  <b>Tổng tiền trước thuế : <?php echo number_format("$donhang->donhang_tong_tien_truoc_thue",0,",","."); ?> vnđ </b>
                                </p>
                              <p><b>Tax : <?php echo number_format("$donhang->donhang_tax",0,",","."); ?> vnđ </b></p>
                            <b>Tổng tiền : <?php echo number_format("$donhang->donhang_tong_tien",0,",","."); ?> vnđ </b>
                                
                            </td>
                                
                            </tr>
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