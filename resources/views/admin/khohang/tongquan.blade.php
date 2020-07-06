@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">Kho hàng</h3>
@stop
@section('content')
<!-- /.row -->
<div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-arrow-circle-o-down fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $thongke[0]->so_luong_nhap !!}</div>
                        <div>Sản phẩm nhập vào</div>
                    </div>
                </div>
            </div>
            <a href="admin/khohang/san-pham-nhap-vao">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-arrow-circle-o-up fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $thongke[0]->so_luong_da_ban !!}</div>
                        <div>Sản phẩm đã bán</div>
                    </div>
                </div>
            </div>
            <a href="admin/khohang/san-pham-da-ban">
                <div class="panel-footer">
                    <span class="pull-left">Xem chi tiết</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-th-large fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{!! $thongke[0]->so_luong_nhap - $thongke[0]->so_luong_da_ban !!}</div>
                        <div>Sản phẩm hiện có</div>
                    </div>
                </div>
            </div>
            <a href="admin/khohang/san-pham-hien-tai">
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

    <div class="col-lg-6">

        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Bán chạy nhất</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($bannhieu as $item)
                            <tr>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $item->sanpham->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->so_luong_da_ban !!}</button></td>
                            <?php 
                                $hientaibannhieu = App\ThongKe::where('sanpham_id',$item->sanpham_id)->selectRaw('sanpham_id,thongke_so_luong_hien_tai')->latest('updated_at')->first();
                            ?>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $hientaibannhieu->thongke_so_luong_hien_tai !!}</button></td>
                            <td class="center">
                            <a href="admin/sanpham/sua/{{$item->sanpham_id}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                        @endforeach
                            
                        
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="admin/khohang/san-pham-ban-chay" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
    <!-- /.col-lg-6-->
    <div class="col-lg-6">

        <div class="chat-panel panel panel-default">
            <div class="panel-heading">
                <!-- <i class="fa fa-comments fa-fw"></i> -->
                <b><i>Tồn nhiều nhất</i></b>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên </th>
                            <th>Đã bán</th>
                            <th>Còn lại</th>
                            <th>Nhập hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($tonnhieu as $item)
                            <tr>
                            <td>{!! $item->sanpham_id !!}</td>
                            <td>{!! $item->sanpham->sanpham_ten !!}</td>
                            <td><button type="button" class="btn btn-info btn-xs">{!! $item->so_luong_da_ban !!}</button></td>
                            <?php 
                                $hientaitonnhieu = App\ThongKe::where('sanpham_id',$item->sanpham_id)->selectRaw('sanpham_id,thongke_so_luong_hien_tai')->latest('updated_at')->first();
                            ?>
                            <td><button type="button" class="btn btn-warning btn-xs">{!! $hientaitonnhieu->thongke_so_luong_hien_tai !!}</button></td>
                            <td class="center">
                            <a href="admin/sanpham/sua/{{$item->sanpham_id}}" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Nhập hàng"><i class="fa fa-plus"></i></a>
                            </td>
                            </tr>
                            <?php 
                                $slht[] = array($hientaitonnhieu->thongke_so_luong_hien_tai);
                            ?>
                        @endforeach
                        <?php 
                            sort($slht);
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <!-- /.panel-body -->
            <div class="panel-footer">
                <div class="input-group">
                    <span class="input-group-btn">
                         <a href="admin/khohang/san-pham-ton-nhieu" class="btn btn-default" type="button">Xem chi tiết</a>
                    </span>
                </div>
            </div>
            <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
    </div>
</div>

@stop
