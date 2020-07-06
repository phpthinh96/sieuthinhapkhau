@extends('admin.layouts.index')

@section('content')

    <form action="admin/nhom/them" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/nhom/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Nhóm sản phẩm</i></a>
                <small style="color:white">/Thêm</small>
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
            <label>Tên</label>
            <input class="form-control" name="nhom_ten" value="{!! old('nhom_ten') !!}" placeholder="Nhập tên nhóm..." />
            <div style="color: red">
                {!! $errors->first('nhom_ten') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control ckeditor" rows="2" name="nhom_mo_ta" >{!! old('nhom_mo_ta') !!}</textarea>
            <div style="color: red">
                {!! $errors->first('nhom_mo_ta') !!}
            </div>
        </div>
    </div>
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/nhom/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
        </div>
    
        </div>
    <form>

@endsection