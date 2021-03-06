@extends('admin.layouts.index')
@section('title')
<h3 class="page-header ">
    <a href="admin/khohang/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Kho hàng</i></a>
    /Sản phẩm đã bán
    </h3>
@stop
@section('content')                 
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
            @foreach ($sanphamdaban as $item)
            @if($item->so_luong_da_ban > 0)
            <tr class="odd gradeX" align="center">
                <td>{!! $item->sanpham->id !!}</td>
                <td>{!! $item->sanpham->sanpham_ten !!}</td>
                <td>
                    {{ $item->sanpham->loaisanpham->loaisanpham_ten}}
                </td>
                <td>
                    {{ $item->sanpham->donvitinh->donvitinh_ten}}
                </td>    
                
                <td>{!! $item->so_luong_nhap !!}</td>
                <td>{!! $item->so_luong_da_ban !!}</td>
                <?php 
                                   
                    $hientai = App\ThongKe::where('sanpham_id',$item->sanpham_id)->selectRaw('sanpham_id,thongke_so_luong_hien_tai')->latest('updated_at')->first();
                           
                ?>
                <td>{!! $hientai->thongke_so_luong_hien_tai !!}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>

@stop
