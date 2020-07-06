@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">
        Nhóm sản phẩm / 
        <a href="admin/nhom/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@endsection
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách nhóm sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Nhóm sản phẩm</th>
                <th class="col-lg-5">Mô tả</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
                <th class="col-lg-2">Lịch sử</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($nhom as $ntp)
           <tr class="odd gradeX" align="center">
                <td>{!! $ntp->id !!}</td>
                <td>{!! $ntp->nhom_ten !!}</td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $ntp->nhom_mo_ta !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/nhom/xoa/{{$ntp->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
                <td class="center"><a href="admin/nhom/sua/{{$ntp->id}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
                <td class="center">
                <a href="admin/nhom/lich-su-hoat-dong/{{$ntp->id}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
                    <i class="fa fa-history"></i>
                </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
@endsection