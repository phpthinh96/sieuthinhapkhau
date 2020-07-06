@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">
        Nhà cung cấp / 
        <a href="admin/nhacungcap/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@endsection
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách nhà cung cấp</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Nhà cung cấp</th>
                <th class="col-lg-4">Địa chỉ</th>
                <th class="col-lg-2">Số điện thoại</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
                <th class="col-lg-2">Lịch sử</th>

            </tr>
        </thead>
        <tbody>
           @foreach ($nhacungcap as $ncc)
           <tr class="odd gradeX" align="center">
                <td>{!! $ncc->id !!}</td>
                <td>{!! $ncc->nhacungcap_ten !!}</td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $ncc->nhacungcap_dia_chi !!}</td>
                <td>{!! $ncc->nhacungcap_sdt !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/nhacungcap/xoa/{{$ncc->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
                <td class="center"><a href="admin/nhacungcap/sua/{{$ncc->id}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
                </td>
                <td class="center">
                    <a href="admin/nhacungcap/lich-su-hoat-dong/{{$ncc->id}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
                    <i class="fa fa-history"></i>
                </a>
                </td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- /.row -->
</div>
</div>
@endsection