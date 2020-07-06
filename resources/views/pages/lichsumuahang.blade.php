@extends('layouts.index')

@section('content') 
<!-- breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
        <li><a href=""><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
        <li class="active">Lịch sử mua hàng</li>
      </ol>
    </div>
  </div>
<!-- //breadcrumbs -->
<div class="register">

	<div class="container">
	
    <h2 class="page-header">
        Lịch sử mua hàng
        
    </h2>
  
<div class="panel panel-default">
<div class="panel-heading">
    <b><i>Danh sách đơn hàng</i></b>
    <a href="nguoidung"><input class="pull-right" style="border: none;" type="button" value="Quay lại"></a>
</div>
<!-- .panel-heading -->
<div class="panel-body">
    <div class="panel-group" id="accordion">
        @foreach ($donhang as $dh)
        <?php 
             
            switch ($dh->tinhtrangdonhang_id) {
                case '1':
                    $color = "danger";
                    break;
                case '2':
                    $color = "primary";
                    break;
                default:
                    $color = "default";
                    break;
            }
        ?>
        <div class="panel panel-{{$color}}">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$dh->id}}" ><p style="color:black;"><b>Mã đơn hàng #{{ $dh->id }} | <i>Tình trạng:</i> {{$dh->tinhtrangdonhang->tinhtrangdonhang_ten}}</b></p></a>

                </h4>
            </div>
            <div id="collapse{{$dh->id}}" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="panel panel-{{$color}}">
                      <div class="panel-heading">
                        <h4 class="panel-title">Thông tin khách hàng</h4>
                      </div>
                      <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-hover">
                              <tbody>
                                  <tr>
                                      <td><b>Tên khách hàng</b></td>
                                      <td>{!! $user->name!!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Số điện thoại</b></td>
                                      <td>{!! $user->user_sdt !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Email</b></td>
                                      <td>{!! $user->email !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Địa chỉ</b></td>
                                      <td>{!! $user->user_dia_chi !!}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>    
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="panel panel-{{$color}}">
                      <div class="panel-heading">
                        <h4 class="panel-title">Thông tin giao hàng</h4>
                      </div>
                      <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-hover">

                              <tbody>
                                  <tr>
                                      <td><b>Người nhận hàng</b></td>
                                      <td>{!! $dh->donhang_nguoi_nhan !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Số điện thoại</b></td>
                                      <td>{!! $dh->donhang_nguoi_nhan_sdt !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Email</b></td>
                                      <td>{!! $dh->donhang_nguoi_nhan_email !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Địa chỉ</b></td>
                                      <td>{!! $dh->donhang_nguoi_nhan_dia_chi !!}</td>
                                  </tr>
                                  <tr>
                                      <td><b>Ghi chú</b></td>
                                      <td>
                                      @if ($dh->donhang_ghi_chu != "")
                                        {{ $dh->donhang_ghi_chu }}
                                      @else
                                        Không có ghi chú
                                      @endif
                                        
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
                        <div class="panel panel-{{$color}}" >
                          <div class="panel-heading">
                            <h3 class="panel-title" ><b>Danh sách sản phẩm</b></h3>
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
                                            @foreach ($dh->chitietdonhang as $ct)
                                                <tr>
                                                    <td>{!! $count = $count + 1 !!}</td>
                                                    <td>
                                                        {{$ct->sanpham->sanpham_ten}}
                                                    </td>
                                                    <td>
                                                    {!! number_format($ct->chitietdonhang_don_gia,0,",",".") !!} vnđ/{{$ct->sanpham->donvitinh->donvitinh_ten}}
                                                    </td>
                                                    <td>{!! $ct->chitietdonhang_so_luong !!} {{$ct->sanpham->donvitinh->donvitinh_ten}}</td>
                                                    <td>{!! number_format("$ct->chitietdonhang_thanh_tien",0,",",".") !!} vnđ </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                            <td colspan="5">
                                              <p>
                                                <b>Tổng tiền trước thuế : {!! number_format("$dh->donhang_tong_tien_truoc_thue",0,",",".") !!} vnđ </b>
                                              </p>
                                              <p>
                                                <b>Tax : {!! number_format("$dh->donhang_tax",0,",",".") !!} vnđ </b>
                                              </p>
                                            <b>Tổng tiền : {!! number_format("$dh->donhang_tong_tien",0,",",".") !!} vnđ </b>
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
        @endforeach
    </div>
</div>
<!-- .panel-body -->
</div>
<!-- /.panel -->
	</div>
</div> 
@endsection