
<?php $__env->startSection('title'); ?>
    <h3 class="page-header ">
        Lịch sử mua hàng của khách hàng: <b><i><?php echo e($user->name); ?></i></b>
        
    </h3>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách đơn hàng</i></b>
    <a href="admin/user/danhsach" class="btn btn-default">Quay lại</a>
</div>
<!-- .panel-heading -->
<div class="panel-body">
    <div class="panel-group" id="accordion">
        <?php $__currentLoopData = $donhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dh): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
             
            switch ($dh->tinhtrangdonhang_id) {
                case '1':
                    $color = "red";
                    break;
                case '2':
                    $color = "primary";
                    break;
                default:
                    $color = "btn-default";
                    break;
            }
        ?>
        <div class="panel panel-<?php echo e($color); ?>">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo e($dh->id); ?>" ><p style="color:white;"><b>Mã đơn hàng #<?php echo e($dh->id); ?> | <i>Tình trạng:</i> <?php echo e($dh->tinhtrangdonhang->tinhtrangdonhang_ten); ?></b></p></a>

                </h4>
            </div>
            <div id="collapse<?php echo e($dh->id); ?>" class="panel-collapse collapse">
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
                                      <td><?php echo $user->name; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Số điện thoại</b></td>
                                      <td><?php echo $user->user_sdt; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Email</b></td>
                                      <td><?php echo $user->email; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Địa chỉ</b></td>
                                      <td><?php echo $user->user_dia_chi; ?></td>
                                  </tr>
                              </tbody>
                          </table>
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
                                      <td><?php echo $dh->donhang_nguoi_nhan; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Số điện thoại</b></td>
                                      <td><?php echo $dh->donhang_nguoi_nhan_sdt; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Email</b></td>
                                      <td><?php echo $dh->donhang_nguoi_nhan_email; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Địa chỉ</b></td>
                                      <td><?php echo $dh->donhang_nguoi_nhan_dia_chi; ?></td>
                                  </tr>
                                  <tr>
                                      <td><b>Ghi chú</b></td>
                                      <td>
                                      <?php if($dh->donhang_ghi_chu != ""): ?>
                                        <?php echo e($dh->donhang_ghi_chu); ?>

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
                    
                    <hr>
                    <div class="row">
                        <div class="col-lg-12">
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
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 0; ?>
                                            <?php $__currentLoopData = $dh->chitietdonhang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo $count = $count + 1; ?></td>
                                                    <td>
                                                        <?php echo e($ct->sanpham->sanpham_ten); ?>

                                                    </td>
                                                    <td>
                                                    <?php echo number_format($ct->chitietdonhang_don_gia,0,",","."); ?> vnđ 
                                                    </td>
                                                    <td><?php echo $ct->chitietdonhang_so_luong; ?></td>
                                                    <td><?php echo number_format("$ct->chitietdonhang_thanh_tien",0,",","."); ?> vnđ </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                            <td colspan="5">
                                              <p>
                                                <b>Tổng tiền trước thuế : <?php echo number_format("$dh->donhang_tong_tien_truoc_thue",0,",","."); ?> vnđ </b>
                                              </p>
                                              <p>
                                                <b>Tax : <?php echo number_format("$dh->donhang_tax",0,",","."); ?> vnđ </b>
                                              </p>
                                            <b>Tổng tiền : <?php echo number_format("$dh->donhang_tong_tien",0,",","."); ?> vnđ </b>
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
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<!-- .panel-body -->
</div>
<!-- /.panel -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>