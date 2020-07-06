@extends('admin.layouts.index')

@section('content')

    <form action="admin/loaisanpham/them" method="POST">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/loaisanpham/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Loại sản phẩm</i></a>
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
            <label>Loại sản phẩm</label>
            <input class="form-control" name="loaisanpham_ten" value="{!! old('loaisanpham_ten') !!}" placeholder="Nhập tên loại sản phẩm..." />
            <div style="color: red">
                {!! $errors->first('loaisanpham_ten') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control ckeditor" rows="2" name="loaisanpham_mo_ta" >{!! old('loaisanpham_mo_ta') !!}</textarea>
            <div style="color: red">
                {!! $errors->first('loaisanpham_mo_ta') !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
             <label>Nhóm sản phẩm</label>
                <select class="form-control" name="nhom_id">
                    <option selected hidden disabled>
                                        --Chọn nhóm sản phẩm--
                                  </option>
                        @foreach($nhom as $ntp)     
                            <option value="{{$ntp->id}}">{{$ntp->nhom_ten}}</option>
                        @endforeach
                </select>
            <div style="color: red">
                {!! $errors->first('nhom_id') !!}
            </div>
        </div>
    </div>
                           
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/loaisanpham/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        
        </div>
        </div>
        </div>
        </div>
    <form>

@endsection