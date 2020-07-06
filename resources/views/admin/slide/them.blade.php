@extends('admin.layouts.index')

@section('content')

    <form action="admin/slide/them" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
        <div class="row">
        <div class="col-lg-12 ">
        <div class="panel panel-green">
            <div class="panel-heading" style="height:80px;">
              <h1 >
                <a href="admin/slide/danhsach" style="color:blue;"><i class="fa fa-product-hunt" style="color:orange;">Slide</i></a>
                <small style="color:white">/Thêm</small>
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
        <div class="form-group">
            <label>Ảnh</label>
            <input type="file" name="slide_anh" class="form-control" />
            <div style="color: red">
                {!! $errors->first('slide_anh') !!}
            </div>
        </div>
        <div class="navbar-right">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="admin/slide/danhsach" ><i class="btn btn-default" >Hủy</i></a>
        </div>
        </div>
        </div>
       
        </div>
        </div>
    <form>

@endsection