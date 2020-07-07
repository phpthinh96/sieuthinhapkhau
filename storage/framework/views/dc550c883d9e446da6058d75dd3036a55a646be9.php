

<?php $__env->startSection('content'); ?>
<form action="" method="POST">
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
    <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="admin/donhang/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Quản lý đơn hàng</i></a>
                /Cập nhật thanh toán đơn hàng số <?php echo e($donhang->id); ?>

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
                          <td><?php echo $donhang->user->name; ?></td>
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
                    <input class="form-control"  value="<?php echo $donhang->tinhtrangdonhang->tinhtrangdonhang_ten; ?>" disabled="true" />
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
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Người nhận hàng</b></td>
                          <td><?php echo $donhang->donhang_nguoi_nhan; ?></td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td><?php echo $donhang->donhang_nguoi_nhan_sdt; ?></td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td><?php echo $donhang->donhang_nguoi_nhan_email; ?></td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td><?php echo $donhang->donhang_nguoi_nhan_dia_chi; ?></td>
                      </tr>
                      <tr>
                          <td><b>Ghi chú</b></td>
                          <td>
                          <?php if($donhang->donhang_ghi_chu != ""): ?>
                            <?php echo e($donhang->donhang_ghi_chu); ?>

                          <?php else: ?>
                            Không có ghi chú
                          <?php endif; ?>
                            
                          </td>
                      </tr>
                  </tbody>
              </table>
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
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                          $count = 0;
                          $c = 0;
                        ?>
                            <?php $__currentLoopData = $donhang->chitietdonhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo $count = $count + 1; ?></td>
                                    <td>
                                        <?php echo e($ct->sanpham->sanpham_ten); ?>

                                    </td>
                                    <td>
                                    <?php echo number_format($ct->chitietdonhang_don_gia,0,",","."); ?> vnđ 
                                    </td>
                                    <td>
                                    <input type="number" name="so_luong[<?php echo e($c); ?>]" value="<?php echo $ct->chitietdonhang_so_luong; ?>" >
                                    </td>
                                    <td>
                                      <input type="checkbox" name="products[<?php echo $ct->sanpham_id; ?>]" >
                                    </td>
                                </tr>
                                <?php $c = $c+1; ?>
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
    </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>