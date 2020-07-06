@extends('admin.layouts.index')

@section('content')

    <form action="admin/donvitinh/sua/{{$donvitinh->id}}" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/donvitinh/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Đơn vị tính</i></a>
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
            <label>Đơn vị tính</label>
            <input class="form-control" name="donvitinh_ten" placeholder="Nhập tên đơn vị tính..." value="{!! $donvitinh->donvitinh_ten !!}" />
            <div style="color: red">
                {!! $errors->first('donvitinh_ten') !!}
            </div>
        </div>
    </div>
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/donvitinh/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
        </div>
     
        </div>
    <form>

@endsection