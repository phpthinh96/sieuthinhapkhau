@extends('admin.layouts.index')

@section('content')

    <form action="admin/nhacungcap/sua/{{$nhacungcap->id}}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/nhacungcap/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Nhà cung cấp</i></a>
                 <small style="color:white">/Cập nhật</small>
              </h1>
            </div>
            <div class="panel-body">
        
            @if(session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @endif
    <div class="col-lg-12">
        <div class="form-group">
            <input type="checkbox" class="" name="change" id="change">
            <label>Tên</label>
            <input class="form-control change" name="nhacungcap_ten" placeholder="Nhập tên nhà cung cấp..." value="{!! $nhacungcap->nhacungcap_ten !!}" disabled="" />
            <div style="color: red">
                {!! $errors->first('nhacungcap_ten') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" name="nhacungcap_sdt" placeholder="Số điện thoại..." value="{!! $nhacungcap->nhacungcap_sdt !!}" />
            <div style="color: red">
                {!! $errors->first('nhacungcap_sdt') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Địa chỉ</label>
            <textarea class="form-control ckeditor" rows="2" name="nhacungcap_dia_chi" placeholder="Địa chỉ...">{!! $nhacungcap->nhacungcap_dia_chi !!}</textarea>
            
            <div style="color: red">
                {!! $errors->first('nhacungcap_dia_chi') !!}
            </div>
        </div>
    </div>
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/nhacungcap/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
        
        </div>
        </div>
    <form>

@endsection
@section('script')
            <script type="text/javascript">
                $(document).ready(function(){
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