@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê danh mục</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê danh mục</li>
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
                        <center class="card-title mt-2">Thêm Danh Mục Sản Phẩm</center>
                        <form class="form-horizontal form-material mx-2" action="{{URL::to('/save-category-product')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Tên danh mục</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="category_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Mô tả</label>
                                <div class="col-md-12">
                                    <textarea class="form-control ps-0 form-control-line" style="resize: none" rows="8" id="decs_cate" name="category_decs"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Hình ảnh danh mục</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control ps-0 form-control-line" name="category_image">
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="add-category-product">Thêm Danh Mục</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection