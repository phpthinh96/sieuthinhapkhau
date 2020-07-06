<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <title>In hóa đơn</title>
    <style>
      body{
        font-family: DejaVu Sans, sans-serif, font-size: 12px;
      }
    </style>
  </head>
  
  <body >
    <div>
      <b><span>SUPER MARKET</span></b><br>
      Ninh Kiều - Cần Thơ<br>
      Phone: (0123) 456 789<br>
    </div><hr>
    <center><h2>ĐƠN ĐẶT HÀNG</h2></center>
    
    <table>
      <tr>
        <td width="120px"><strong>Khách hàng:</strong></td> <td>{!!$donhang->user->name!!}</td>
        <td><strong></td>
      </tr>
      <tr>
        <td width="120px"><strong>Địa chỉ:</strong></td> <td>{!!$donhang->user->user_dia_chi!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Điện thoại:</strong></td> <td> {!!$donhang->user->user_sdt!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Email:</strong></td> <td> {!!$donhang->user->email!!}</td>
        <td></td>
      </tr>
      <tr>
        <td width="120px"><strong>Ngày đặt:</strong></td> <td> {!!$donhang->created_at!!}</td>
        <td></td>
      </tr>
    </table><br><br>
    <table cellpadding="3px" style="border:thin solid;" >
      <thead>
        <tr>
          <td style="border:thin solid;" width="50px"><strong>STT</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Tên sản phẩm</strong></td>
          <td style="border:thin solid;" width="50px"><strong>Số lượng</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Đơn giá</strong></td>
          <td style="border:thin solid;" width="150px"><strong>Thành tiền</strong></td>
        </tr>
      </thead>
      <tbody>
        <?php $count = 0; ?>
            @foreach ($donhang->chitietdonhang as $ct)
            <tr >
              <td style="border:thin blue solid;border-style:dashed;">{!! $count = $count + 1 !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
                  {{$ct->sanpham->sanpham_ten}}
              </td>
              <td style="border:thin blue solid;border-style:dashed;">{!! $ct->chitietdonhang_so_luong !!}</td>
              <td style="border:thin blue solid;border-style:dashed;">
              {!! number_format($ct->chitietdonhang_don_gia,0,",",".") !!} vnđ 
              </td>
              
              <td style="border:thin blue solid;border-style:dashed;" >{!! number_format("$ct->chitietdonhang_thanh_tien",0,",",".") !!} vnđ </td>
          </tr>
            @endforeach
            <tr>
              <td  width="150px" >
                    <b>Ghi chú :</b>
              </td>
              <td colspan="4">
                    {{ $donhang->donhang_ghi_chu }}
                </td>
            </tr>
      </tbody>
    </table>
    <br>
    <table class="sumary-table">
      <tr>
        <td width="500px">Tổng tiền trước thuế - </td>
        <td style="border:thin blue solid;border-style:dashed;" width="152px">{!! number_format($donhang->donhang_tong_tien_truoc_thue, 0, ",", ".") !!} vnđ</td>
      </tr>
      <tr>
        <td width="500px">Tax - </td>
        <td style="border:thin blue solid;border-style:dashed;" width="152px">{!! number_format($donhang->donhang_tax, 0, ",", ".") !!} vnđ</td>
      </tr>
      <tr>
        <td width="500px">Tổng tiền - </td>
        <td width="152px" style="border:thin blue solid;border-style:dashed;">{!! number_format($donhang->donhang_tong_tien, 0, ",", ".") !!} vnđ</td>
      </tr>
    </table><br>
    <table style="margin-bottom:-300px;">
      <tr>
        <td width="500px"></td>
        <td>Ngày lập: <?php echo date("d-m-Y") ?></td>
      </tr>
      <tr>
        <td width="500px" class="customer-title">   <strong>Khách hàng</strong></td>
        <td class="writer-title"><strong>Người lập phiếu</strong></td>
      </tr>
      <tr>
        <td>(Ký và ghi rõ họ tên)</td>
        <td class="writer-name"><span>(Ký và ghi rõ họ tên)</span></td>
      </tr>
    </table>
  </body>
</html>
    
