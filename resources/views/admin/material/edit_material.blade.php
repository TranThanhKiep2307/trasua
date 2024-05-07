@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Sửa nguyên liệu</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa nguyên liệu</li>
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
                        <center class="card-title mt-2">Sửa nguyên liệu</center>
                        @foreach ($all_material as $all)
                        
                        <form class="form-horizontal form-material mx-2" action="{{URL::to('/update-material/'.$all->material_id)}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Tên nguyên liệu</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$all->material_name}}" class="form-control ps-0 form-control-line" name="material_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nhà cung cấp nguyên liệu</label>
                                <div class="col-md-12">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="supplier">
                                        @foreach($supplier as $key => $sup)
                                        @if ($all->supplier_id == $sup ->supplier_id)
                                        <option selected value="{{$sup->supplier_id}}">{{$sup->supplier_name}}</option>
                                        @else
                                        <option value="{{$sup->supplier_id}}">{{$sup->supplier_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Hình ảnh nguyên liệu</label>
                                <div class="col-md-12">
                                    <input type="file" class="form-control ps-0 form-control-line" name="material_image">
                                    <img src="{{URL::to('/public/images/material/'.$all->material_image)}}" class="rounded-circle" width="100px">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Giá nguyên liệu</label>
                                <div class="col-md-12">
                                    <input type="number" value="{{$all->material_price}}" class="form-control ps-0 form-control-line" name="material_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Trạng thái nguyên liệu</label>
                                <div class="col-md-12">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="material_stt">
                                        @php
                                            if($all->material_stt == 0){
                                                echo '<option selected value="0">Còn hàng</option>';
                                            }
                                            else {
                                                echo '<option selected value="1">Hết hàng</option>';
                                            }
                                        @endphp
                                        <option value="0">Còn hàng</option>
                                        <option value="1">Hết hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Số lượng nguyên liệu</label>
                                <div class="col-md-12">
                                    <input type="number" value="{{$all->material_number}}" class="form-control ps-0 form-control-line" name="material_number">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Đơn vị nguyên liệu</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$all->material_unit}}" class="form-control ps-0 form-control-line" placeholder="kg, g, thùng,..." name="material_unit">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Mô tả nguyên liệu</label>
                                <div class="col-md-12">
                                    <textarea class="form-control ps-0 form-control-line" id="desc_pro" name="material_decs">{{$all->material_decs}}</textarea>
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="update-material">Sửa nguyên liệu</button></center>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection