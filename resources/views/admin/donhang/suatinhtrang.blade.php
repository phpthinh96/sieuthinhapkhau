@extends('admin.layouts.index')

@section('content')
<form action="" method="POST">
    <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
    <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:60px;">
              <h3 >
                <a href="admin/donhang/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:blue;">Quản lý đơn hàng</i></a>
                /Tình trạng đơn hàng / Đơn hàng #{{$donhang->id}}
              </h3>
            <div class="navbar-right" style="margin-right:10px;margin-top:-50px;">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/donhang/danhsach" ><i class="btn btn-default" >Hủy</i></a>
            </div>
            </div>
            <div class="panel-body">
    <div class="row">
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin khách hàng</h3>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Tên khách hàng</b></td>
                          <td>{!! $donhang->user->name !!}</td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td>{!! $donhang->user->user_sdt !!}</td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td>{!! $donhang->user->email !!}</td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td>{!! $donhang->user->user_dia_chi !!}</td>
                      </tr>
                  </tbody>
              </table>
          </div>    
        </div>
        </div>
        <div class="col-lg-10">
            <div class="form-group">
                <label for="input" >Tình trạng đơn hàng</label>
                <div>
                    <select id="input" name="tinhtrangdonhang_id"  class="form-control">
                            @foreach($tinhtrangdonhang as $tt)     
                            <option
                            @if($donhang->tinhtrangdonhang_id == $tt->id)
                            {{'selected'}}
                            @endif
                             value="{{$tt->id}}">{{$tt->tinhtrangdonhang_ten}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Thông tin giao hàng</h3>
          </div>
          <div class="panel-body">
          <div class="table-responsive">
              <table class="table table-hover">

                  <tbody>
                      <tr>
                          <td><b>Người nhận hàng</b></td>
                          <td>{!! $donhang->donhang_nguoi_nhan !!}</td>
                      </tr>
                      <tr>
                          <td><b>Số điện thoại</b></td>
                          <td>{!! $donhang->donhang_nguoi_nhan_sdt !!}</td>
                      </tr>
                      <tr>
                          <td><b>Email</b></td>
                          <td>{!! $donhang->donhang_nguoi_nhan_email !!}</td>
                      </tr>
                      <tr>
                          <td><b>Địa chỉ</b></td>
                          <td>{!! $donhang->donhang_nguoi_nhan_dia_chi !!}</td>
                      </tr>
                      <tr>
                          <td><b>Ghi chú</b></td>
                          <td>
                          @if ($donhang->donhang_ghi_chu != "")
                            {{ $donhang->donhang_ghi_chu }}
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
    <div class="row">
        <div class="panel panel-default" >
          <div class="panel-heading">
            <h2 class="panel-title" ><b>Danh sách sản phẩm</b></h2>
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
                                <th>Số lượng hiện tại</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $count = 0; ?>
                            @foreach ($donhang->chitietdonhang as $ct)
                                <tr>
                                    <td>{!! $count = $count + 1 !!}</td>
                                    <td>
                                        {{$ct->sanpham->sanpham_ten}}
                                    </td>
                                    <td>
                                    {!! number_format($ct->chitietdonhang_don_gia,0,",",".") !!} vnđ/{{$ct->sanpham->donvitinh->donvitinh_ten}}
                                    </td>
                                    <td>{!! $ct->chitietdonhang_so_luong !!} {{$ct->sanpham->donvitinh->donvitinh_ten}}</td>
                                    <td>
                                       <?php 
                                            $thongke = App\ThongKe::where('sanpham_id',$ct->sanpham->id)->select('thongke_so_luong_hien_tai')->latest('updated_at')->first(); 
                                        ?>
                                        {{ $thongke['thongke_so_luong_hien_tai'] }} {{$ct->sanpham->donvitinh->donvitinh_ten}}
                                    </td>
                                    <td>{!! number_format("$ct->chitietdonhang_thanh_tien",0,",",".") !!} vnđ </td>
                                </tr>
                            @endforeach
                            <tr>
                            <td colspan="5">
                              <br><br><p>
                                <b>Tổng tiền trước thuế : {!! number_format("$donhang->donhang_tong_tien_truoc_thue",0,",",".") !!} vnđ </b>
                              </p>
                              <p><b>Tax : {!! number_format("$donhang->donhang_tax",0,",",".") !!} vnđ </b></p>
                            <b>Tổng tiền : {!! number_format("$donhang->donhang_tong_tien",0,",",".") !!} vnđ </b>
                                
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
    </form>
@stop