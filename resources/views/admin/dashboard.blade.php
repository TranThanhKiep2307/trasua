@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Chào mừng đến với Trang quản lý</h3>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doanh số trong ngày</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-success"></i> {{ number_format($dailyIncome, 0, ',', '.') }} VNĐ</h2>
                            <span class="text-muted">Doanh thu hôm nay</span>
                        </div>
                        <span class="text-success">{{ $dailyIncomePercentage }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $dailyIncomePercentage }}%; height: 6px;"
                                aria-valuenow="{{ $dailyIncomePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Doanh số trong tuần</h4>
                        <div class="text-end">
                            <h2 class="font-light mb-0"><i class="ti-arrow-up text-info"></i> {{ number_format($weeklyIncome, 0, ',', '.') }} VNĐ</h2>
                            <span class="text-muted">Doanh thu tuần này</span>
                        </div>
                        <span class="text-info">{{ $weeklyIncomePercentage }}</span>
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $weeklyIncomePercentage }}%; height: 6px;"
                                aria-valuenow="{{ $weeklyIncomePercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        </div>
    </div>
    
        </div>
        
    </div>
    
</div>
@endsection
