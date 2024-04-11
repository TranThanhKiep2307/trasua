@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Cập nhật sản phẩm</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cập nhật sản phẩm</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<h5>'.$message.'</h5>';
                            Session::put('message',null);
                        }
                        ?>
                        <center class="card-title mt-2">Cập nhật Sản Phẩm</center>
                        @foreach($edit_product as $key => $edit_pro)
                        <form class="form-horizontal form-material mx-2" action="{{URL::to('/update-product/'.$edit_pro->product_id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Danh Mục Sản Phẩm</label>
                                <div class="col-md-12">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="category_product">
                                        @foreach($cate_product as $key => $cate)
                                        @if ($cate->category_id == $edit_pro->category_id)
                                        <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>                                          
                                        @else                                           
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Tên Sản Phẩm</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="product_name" 
                                    value="{{$edit_pro->product_name}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Giá Sản Phẩm</label>
                                <div class="col-md-12">
                                    <input type="number" class="form-control ps-0 form-control-line" name="product_price"
                                    value="{{$edit_pro->product_price}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Hình Ảnh Sản Phẩm</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control ps-0 form-control-line" name="product_image">
                                    <img src="{{URL::to('/public/images/products/'.$edit_pro->product_image)}}" class="rounded-circle" width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Mô tả Sản Phẩm</label>
                                <div class="col-md-12">
                                    <textarea class="form-control ps-0 form-control-line" name="product_decs">{{$edit_pro->product_decs}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Trạng Thái Sản Phẩm</label>
                                <div class="col-md-12">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="product_status">
                                        <option value="0">Còn bán</option>
                                        <option value="1">Tạm thời ngưng bán</option>
                                    </select>
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="add-product">Cập nhật Sản Phẩm</button></center>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection