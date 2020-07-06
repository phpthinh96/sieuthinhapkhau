@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">
        Slide / 
        <a href="admin/slide/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@endsection
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách slide ảnh</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-2">Ảnh</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Sửa</th>
            </tr>
        </thead>
        <tbody>
           @foreach ($slide as $sl)
           <tr class="odd gradeX" align="center">
                <td>{!! $sl->id !!}</td>
                <td><p style="text-align: center;"><img width="200px"  alt="image" src="images/slide/{{$sl->slide_anh}}"></p></td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/slide/xoa/{{$sl->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </td>
                <td class="center"><a href="admin/slide/sua/{{$sl->id}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa"><i class="fa fa-pencil fa-fw"></i></a>
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