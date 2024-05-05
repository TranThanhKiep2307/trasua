@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Thêm mã giảm giá</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mã giảm giá</li>
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
                        <center class="card-title mt-2">Thêm mã giảm giá</center>
                        <form class="form-horizontal form-material mx-2" action="{{URL::to('/insert-counpon-code')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Tên mã giảm giá</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="counpon_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Mã giảm giá</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="counpon_code">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Số lượng mã</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="counpon_time">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12">Tính năng mã</label>
                                <div class="col-sm-12 border-bottom">
                                    <select class="form-select shadow-none border-0 ps-0 form-control-line" name="counpon_condition">
                                        <option value="0">Chọn mã</option>
                                        <option value="1">Giảm theo %</option>
                                        <option value="2">Giảm theo tiền</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Nhập số % hoặc số tiền giảm giá</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control ps-0 form-control-line" name="counpon_number">
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="insert_counpon_code">Thêm Mã Giảm Giá</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection