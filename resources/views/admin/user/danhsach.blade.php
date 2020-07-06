@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">
        User 
        
    </h3>
@endsection
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách user</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
     @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
    <div class="dataTable_wrapper">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr align="center" align="center">
                <th class="col-lg-1">ID</th>
                <th class="col-lg-1">Username</th>
                <th class="col-lg-1">Email</th>
                <th class="col-lg-5">Địa chỉ</th>
                <th class="col-lg-1">Số điện thoại</th>
                <th class="col-lg-1">Xóa</th>
                <th class="col-lg-1">Lịch sử mua hàng</th>

            </tr>
        </thead>
        <tbody>            
           @foreach ($user as $us)
           <tr class="odd gradeX" align="center">
                <td>{!! $us->id !!}</td>
                <td>{!! $us->name !!}</td>
                <td>{!! $us->email !!}</td>
                <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $us->user_dia_chi !!}</td>
                <td>{!! $us->user_sdt !!}</td>
                <td class="center">
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/user/xoa/{{$us->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                <td class="center"><a href="admin/user/lich-su-mua-hang/{{$us->id}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Xem lịch sử mua hàng"><i class="fa fa-history"></i></a>
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