<?php $__env->startSection('title'); ?>
    <h1 class="page-header">Bảng điều khiển</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo e($luotbinhluan); ?></div>
                        <div>Bình luận mới!</div>
                    </div>
                </div>
            </div>
            <a href="admin/binhluan/danhsach">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo e($khachhang); ?></div>
                        <div>Khách hàng!</div>
                    </div>
                </div>
            </div>
            <a href="admin/user/danhsach">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo e($donhang); ?></div>
                        <div>Đơn hàng mới!</div>
                    </div>
                </div>
            </div>
            <a href="admin/donhang/danhsach">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-barcode fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo e($sanpham); ?></div>
                        <div>Sản phẩm</div>
                    </div>
                </div>
            </div>
            <a href="admin/sanpham/danhsach">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Sơ đồ thống kê sản phẩm hàng tháng
            </div>
            
            <div class="container-fluid">   
                <div style="width:100%;">
                    <?php echo $chartjs->render(); ?>

                </div>
            </div>
        </div>
         
        </div>
    
       
    </div>




<div class="col-lg-6">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
               <i class="fa fa-dashboard fa-fw"></i>
                Tổng quan
                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">SP doanh thu cao</a>
                    </li>
                    <li><a href="#profile" data-toggle="tab">SP nhập nhiều</a>
                    </li>
                    <li><a href="#messages" data-toggle="tab">Khách hàng</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Sản phẩm</th>
                                                <th>Đã bán</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      
                                        <?php $__currentLoopData = $bannhieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo $item->sanpham->id; ?></td>
                                                <td><?php echo $item->sanpham->sanpham_ten; ?></td>
                                                <td><?php echo $item->so_luong_da_ban; ?> <?php echo e($item->sanpham->donvitinh->donvitinh_ten); ?></td>
                                                <td><?php echo number_format("$item->tien",0,",","."); ?>vnđ</td>
                                            </tr>
                                            
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                
                                                <th>Sản phẩm</th>
                                                <th>Đã nhập</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $__currentLoopData = $nhapnhieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo $item->sanpham->id; ?></td>
                                                
                                                <td><?php echo $item->sanpham->sanpham_ten; ?></td>
                                                <td><?php echo $item->so_luong_nhap; ?> <?php echo e($item->sanpham->donvitinh->donvitinh_ten); ?></td>
                                                
                                            </tr>
                                           
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Khách hàng</th>
                                                <th>Số đơn hàng</th>
                                                <th>Tổng tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php $__currentLoopData = $muanhieu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo $item->user->id; ?></td>
                                                <td><?php echo $item->user->name; ?></td>
                                                <td><?php echo $item->donhang; ?></td>
                                                <td><?php echo number_format("$item->tien",0,",","."); ?>vnđ</td>
                                            </tr>
                                          
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
            </div>
            <!-- /.panel-body -->
            
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>


<div class="col-lg-6">
        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-comments fa-fw"></i>
                Ý kiến đóng góp
                
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <ul class="chat">
                <?php $__currentLoopData = $ykien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="left clearfix">
                    
                        <span class="chat-img pull-left">
                           <strong class="primary-font"><?php echo e($item->ten); ?></strong>

                        </span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"><?php echo e($item->email); ?></strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i> <?php echo $item->created_at; ?>

                                </small>
                            </div>
                            <p>
                                <?php echo e($item->ykien); ?>

                            </p>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            
        </div>
        <!-- /.panel .chat-panel -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>