@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Thống kê doanh thu</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thống kê doanh thu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doanh thu theo ngày</h4>
                    @foreach($turnoverByDay as $turnover)
                    <div class="text-end">
                        <span class="text-muted">Ngày: {{ date("d/m/Y", strtotime($turnover->date)) }}</span>
                        <h2 class="font-light mb-0">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</h2>
                    </div>
                    <span class="text-success">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($turnover->total_turnover / 9999999) * 100 }}%; height: 6px;"
                            aria-valuenow="{{ $turnover->total_turnover }}" aria-valuemin="0" aria-valuemax="9999999"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doanh thu theo tháng</h4>
                    @foreach($turnoverByMonth as $turnover)
                    <div class="text-end">
                        <span class="text-muted">Tháng: {{ $turnover->month }}</span>
                        <h2 class="font-light mb-0">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</h2>
                    </div>
                    <span class="text-success">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($turnover->total_turnover / 99999999) * 100 }}%; height: 6px;"
                            aria-valuenow="{{ $turnover->total_turnover }}" aria-valuemin="0" aria-valuemax="99999999"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doanh thu theo năm</h4>
                    @foreach($turnoverByYear as $turnover)
                    <div class="text-end">
                        <span class="text-muted">Năm: {{ $turnover->year }}</span>
                        <h2 class="font-light mb-0">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</h2>
                    </div>
                    <span class="text-success">{{ number_format($turnover->total_turnover, 0, ',', '.') }} VNĐ</span>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($turnover->total_turnover / 999999999) * 100 }}%; height: 6px;"
                            aria-valuenow="{{ $turnover->total_turnover }}" aria-valuemin="0" aria-valuemax="999999999"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
 
    
</div>

@endsection