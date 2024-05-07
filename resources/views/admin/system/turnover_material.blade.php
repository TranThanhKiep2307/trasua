@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Thống kê nguyên liệu</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thống kê nguyên liệu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            @foreach($productQuantities as $quantity)
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$quantity->material_name}}</h4>
                        <div class="text-end">
                            <span class="text-muted">Số lượng nguyên liệu</span>
                            <h2 class="font-light mb-0">{{ $quantity->total_quantity }} {{ $quantity->material_unit }}</h2>
                        </div>
                        <span class="text-success">{{ $quantity->total_quantity }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($quantity->total_quantity / 2000) * 100 }}%; height: 6px;"
                                aria-valuenow="{{$quantity->total_quantity }}" aria-valuemin="0" aria-valuemax="2000"></div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>  
</div>

@endsection