@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Sửa nhà cung cấp</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa nhà cung cấp</li>
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
                        <center class="card-title mt-2">Sửa nhà cung cấp</center>
                        @foreach ($all_supplier as $all)                          
                        <form class="form-horizontal form-material mx-2" action="{{URL::to('/update-supplier/'.$all->supplier_id)}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Tên nhà cung cấp</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$all->supplier_name}}" class="form-control ps-0 form-control-line"   name="supplier_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Số điện thoại nhà cung cấp</label>
                                <div class="col-md-12">
                                    <input type="number" value="{{$all->supplier_phone}}" class="form-control ps-0 form-control-line" name="supplier_phone"></input>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 mb-0">Địa chỉ nhà cung cấp</label>
                                <div class="col-md-12">
                                    <input type="text" value="{{$all->supplier_address}}" class="form-control ps-0 form-control-line" name="supplier_address">
                                </div>
                            </div>
                            <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="update-supplier">Sửa nhà cung cấp</button></center>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection