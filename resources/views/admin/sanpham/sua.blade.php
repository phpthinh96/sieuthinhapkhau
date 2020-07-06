@extends('admin.layouts.index')

@section('content')

    <form action="admin/sanpham/sua/{{$sanpham->id}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/sanpham/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Sản phẩm</i></a>
                <small style="color:white">/Cập nhật</small>
              </h1>
            
            </div>
            <div class="panel-body">
           
                @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
                @if(session('loi'))
                    <div class="alert alert-danger">
                        {{session('loi')}}
                    </div>
                @endif
        <div class="col-lg-12">
                     
            <div class="form-group">
                    <label>Nhà cung cấp</label>
                        <select class="form-control" name="nhacungcap_id">
                             
                            @foreach($nhacungcap as $ncc)
                            <option
                                @if($sanpham->nhacungcap_id == $ncc->id)
                                    {{'selected'}}
                                @endif
                             value="{{$ncc->id}}">{{$ncc->nhacungcap_ten}}</option>
                        @endforeach
                 </select>
                 <div style="color: red">
                {!! $errors->first('nhacungcap_id') !!}
            </div>
            </div>
        </div>
        <div class="col-lg-6">
            
        
            <div class="form-group">
                    <label>Nhóm sản phẩm</label>
                        <select class="form-control" name="nhom_id" id="nhom" >
                            @foreach($nhom as $ntp)
                            <option
                            @if($sanpham->loaisanpham->nhom_id == $ntp->id)
                                        {{"selected"}}
                            @endif
                             value="{{$ntp->id}}">{{$ntp->nhom_ten}}</option>
                        @endforeach
                 </select>
                <div style="color: red">
                {!! $errors->first('nhom_id') !!}
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                    <label>Loại sản phẩm</label>
                        <select class="form-control" name="loaisanpham_id" id="loaisanpham">
                        @foreach($loaisanpham as $lsp)
                            <option
                            @if($sanpham->loaisanpham_id == $lsp->id)
                                        {{"selected"}}
                            @endif
                             value="{{$lsp->id}}">{{$lsp->loaisanpham_ten}}</option>
                        @endforeach
                    </select>
                    <div style="color: red">
                {!! $errors->first('loaisanpham_id') !!}
            </div>
            </div>
        </div>
    <div class="col-lg-12">
        <div class="form-group">
            <input type="checkbox" class="" name="change" id="change">
            <label>Tên sản phẩm</label>
            <input class="form-control change" name="sanpham_ten" value="{!! $sanpham->sanpham_ten  !!}" disabled="" />
            <div style="color: red">
                {!! $errors->first('sanpham_ten') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Ảnh</label>
             <p style="text-align: center;"><img width="300px" height="200px" src="images/sanpham/{{$sanpham->sanpham_anh}}"></p>
            <input type="file" name="sanpham_anh" class="form-control" 
            />
            <div style="color: red">
                {!! $errors->first('sanpham_anh') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control ckeditor" rows="2" name="sanpham_mo_ta" >{!! $sanpham->sanpham_mo_ta !!}</textarea>
            <div style="color: red">
                {!! $errors->first('sanpham_mo_ta') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="sanpham_gia" value="{!! $sanpham->sanpham_gia !!}" placeholder="Nhập giá..." />
            <div style="color: red">
                {!! $errors->first('sanpham_gia') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label>Giá khuyến mãi (nếu có)</label>
            <input class="form-control" name="sanpham_gia_khuyen_mai" value="{!! $sanpham->sanpham_gia_khuyen_mai !!}" placeholder="Nhập giá khuyến mãi..." />
            <div style="color: red">
                {!! $errors->first('sanpham_gia_khuyen_mai') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Số lượng nhập vào</label>
            <input class="form-control" name="sanpham_so_luong_nhap" value="{!! $sanpham->sanpham_so_luong_nhap !!}" placeholder="Nhập số lượng nhập..." />
            <div style="color: red">
                {!! $errors->first('sanpham_so_luong_nhap') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Đơn vị tính</label>
                <select class="form-control" name="donvitinh_id">
                    
                    @foreach($donvitinh as $dvt)
                    <option 
                    @if($sanpham->donvitinh_id == $dvt->id)
                        {{'selected'}}
                    @endif
                    value="{{$dvt->id}}">{{$dvt->donvitinh_ten}}</option>
                @endforeach
                </select>
            <div style="color: red">
                {!! $errors->first('donvitinh_id') !!}
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="form-group">
            <label>Nổi bật</label>
                <label class="radio-inline">
                    <input
                    @if($sanpham->sanpham_noi_bat == 0)
                        {{'checked'}}
                    @endif
                     name="sanpham_noi_bat" value="0" type="radio">Không
                </label>
                <label class="radio-inline">
                    <input 
                    @if($sanpham->sanpham_noi_bat == 1)
                        {{'checked'}}
                    @endif
                    name="sanpham_noi_bat" value="1" type="radio">Có
                </label>
        </div>
    </div>
                           
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/sanpham/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        
        </div>
        </div>
        </div>
        </div>
    <form>

@endsection
@section('script')
   <script>

        $(document).ready(function()
           {
                    
                $("#nhom").change(function(){
                    var nhom_id = $(this).val();
                    $.get("admin/ajax/loaisanpham/"+nhom_id,function(data){
                        $("#loaisanpham").html(data);
                    });
                });

                // var nhom_id = $("#nhom").val();
                //     $.get("admin/ajax/loaisanpham/"+nhom_id,function(data){
                //         $("#loaisanpham").html(data);
                //     });

                $('#change').change(function(){
                        if ($(this).is(':checked')) {
                            $('.change').removeAttr('disabled');
                        } else {
                            $('.change').attr('disabled','');
                        }
                    });

        });


                    
                

   </script>

                

          
@endsection