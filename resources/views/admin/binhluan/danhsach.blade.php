@extends('admin.layouts.index')
@section('title')
    <h1 class="page-header">Bình luận</h1>
@stop
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Danh sách các bình luận
    </div>
        @if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
        @endif
    <!-- /.panel-heading -->
    <div class="panel-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab"><b>Tất cả</b></a>
            </li>
            <li><a href="#profile" data-toggle="tab"><b>Chưa xác nhận</b></a>
            </li>
            <li><a href="#messages" data-toggle="tab"><b>Đã xác nhận</b></a>
            </li>
        </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
        <br>
        <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>User</th>
                    <th>Ngày đăng</th>
                    <th>Nội dung</th>
                    <th>Xóa</th>
                 
                </tr>
            </thead>
            <tbody>
            @foreach ($binhluan as $bl)
                <tr class="odd gradeX">
                    <td>{!! $bl->id !!}</td>
                    <td>
                        {!! $bl->sanpham->sanpham_ten !!}
                    </td>
                    <td>
                        {!! $bl->user->name !!}
                    </td>
                    <td>{!! date("d-m-Y",strtotime($bl->created_at)) !!}</td>
                    <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $bl->binhluan_noi_dung !!}</td>
                    
                    <td align="center">
                    <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/binhluan/xoa/{{$bl->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
        <div class="tab-pane fade" id="profile">
            <br>
        <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>User</th>
                    <th>Ngày đăng</th>
                    <th>Nội dung</th>
                    <th>Chức năng</th>
                 
                </tr>
            </thead>
            <tbody>
            @foreach ($binhluan0 as $bl0)
                <tr class="odd gradeX">
                    <td>{!! $bl0->id !!}</td>
                    <td>
                        {!! $bl0->sanpham->sanpham_ten !!}
                    </td>
                    <td>
                        {!! $bl0->user->name !!}
                    </td>
                    <td>{!! date("d-m-Y",strtotime($bl0->created_at)) !!}</td>
                    <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $bl0->binhluan_noi_dung !!}</td>
                    <td>
                         <div style="margin-top: 10px;">
                    <a  href="{{route('chapnhan',$bl0->id)}}" type="button" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Chấp nhận"><i class="fa fa-check-square-o"></i></a>
                </div>
                 <div style="margin-top: 10px;">
                    <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/binhluan/xoa/{{$bl0->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
        <div class="tab-pane fade" id="messages">
            <br>
        <div class="dataTable_wrapper">
        <table class="table table-striped table-bordered table-hover" >
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>User</th>
                    <th>Ngày đăng</th>
                    <th>Nội dung</th>
                    <th>Chức năng</th>
                 
                </tr>
            </thead>
            <tbody>
            @foreach ($binhluan1 as $bl1)
                <tr class="odd gradeX" align="center">
                    <td>{!! $bl1->id !!}</td>
                    <td>
                        {!! $bl1->sanpham->sanpham_ten !!}
                    </td>
                    <td>
                        {!! $bl1->user->name !!}
                    </td>
                    <td>{!! date("d-m-Y",strtotime($bl1->created_at)) !!}</td>                   
                    <td style = 'max-width: 150px;  word-wrap:break-word;'>{!! $bl1->binhluan_noi_dung !!}</td>
                    
                    <td>
                         <div style="margin-top: 10px;">
                    <a href="{{route('khongchapnhan',$bl1->id)}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Hủy chấp nhận"><i class="fa fa-times-circle"></i></a>
                </div>
                 <div style="margin-top: 10px;">
                    <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/binhluan/xoa/{{$bl1->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa"><i class="fa fa-trash-o  fa-fw"></i></a>
                </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    </div>
    <!-- /.panel-body -->
@stop
<script type="text/javascript">
    
    $(document).ready(function(){
        $('#messages').click(function(){
            alert('dfhdhf');
        })
    })
</script>