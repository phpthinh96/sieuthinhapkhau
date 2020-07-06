<style type="text/css">

</style>
@extends('admin.layouts.index')
@section('title')
    <h3 class="page-header">
        Sản phẩm / 
        <a href="admin/sanpham/them" class="btn btn-info" style="margin-top:-8px;">Thêm mới</a>
    </h3>
@endsection
@section('content')                 
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách sản phẩm</i></b>
</div>
<!-- /.panel-heading -->
<div class="panel-body">
    @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
    @endif
    <div class="dataTable_wrapper" >


    <table  class="table table-striped table-bordered table-hover" id="dataTables-example"> 
       
        <thead>
            <tr align="center" align="center">
                <th >ID</th>
                <th>Sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th class="col-sm-2">Loại sản phẩm</th>
                {{-- <th>Nhà cung cấp</th> --}}
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            
           @foreach ($sanpham as $sp)
           <tr class="odd gradeX" align="center">
                <td>{!! $sp->id !!}</td>
                <td>{!! $sp->sanpham_ten !!}
                    <p style="text-align: center;"><img width="150px" height="150px" alt="image" src="images/sanpham/{{$sp->sanpham_anh}}"></p>
                    
                    @if($sp->sanpham_noi_bat == 1)
                        <p style="color: red;">Nổi bật</p>
                    
                    @endif
                </td>
                <td style = 'max-width: 180px;  word-wrap:break-word;'>{!! $sp->sanpham_mo_ta !!}</td>
                <td>
                    @if($sp->sanpham_gia_khuyen_mai > 0)
                        {!! number_format("$sp->sanpham_gia_khuyen_mai",0,",",".") !!} vnđ <br><br>

                      <strike>{!! number_format("$sp->sanpham_gia",0,",",".") !!} vnđ </strike>
                    @else
                        {!! number_format("$sp->sanpham_gia",0,",",".") !!} vnđ 
                    @endif
                    
                   
                </td>
                
                
                <?php 
                    $thongke = App\ThongKe::where('sanpham_id',$sp->id)->select('thongke_so_luong_hien_tai')->latest('updated_at')->first(); 
                ?>
                <td>{{ $thongke['thongke_so_luong_hien_tai'] }} {{$sp->donvitinh->donvitinh_ten}}</td>
              
                <td>{!! $sp->loaisanpham->loaisanpham_ten !!}</td>
                {{-- <td>{!! $sp->nhacungcap->nhacungcap_ten !!}</td> --}}
                <td class="center">
                <div style="margin-top: 10px;">
                   
                <a onclick="return confirmDel('Bạn có chắc muốn xóa dữ liệu này?')" href="admin/sanpham/xoa/{{$sp->id}}" type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Xóa">
                    <i class="fa fa-trash-o  fa-fw"></i>
                </a>
                
                </div>
                <div style="margin-top: 10px;">
                    
                <a href="admin/sanpham/sua/{{$sp->id}}" type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Chỉnh sửa">
                    <i class="fa fa-pencil fa-fw"></i>
                </a>
                
                </div>
                <div style="margin-top: 10px;">
                    
                <a href="admin/sanpham/lich-su-hoat-dong/{{$sp->id}}" type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Lịch sử hoạt động">
                    <i class="fa fa-history"></i>
                </a>
                
                </div>
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

