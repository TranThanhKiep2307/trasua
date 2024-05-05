@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê đơn hàng</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê đơn hàng</li>

                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Thông tin khách hàng -->
                            <table class="table user-table no-wrap">
                                <thead>
                                    <h4 style="text-align: center">Thông tin khách hàng</h4>
                                    <tr>
                                        <th class="border-top-0">Tên khách hàng</th>
                                        <th class="border-top-0">Số điện thoại</th>
                                        <th class="border-top-0">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order_by_id->customer_name }}</td>
                                        <td>{{ $order_by_id->customer_phone }}</td>
                                        <td>{{ $order_by_id->customer_email }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <!-- Thông tin vận chuyển -->
                            <table class="table user-table no-wrap">
                                <thead>
                                    <h4 style="text-align: center">Thông tin vận chuyển</h4>
                                    <tr>
                                        <th class="border-top-0">Tên người nhận</th>
                                        <th class="border-top-0">Số điện thoại người nhận</th>
                                        <th class="border-top-0">Email người nhận</th>
                                        <th class="border-top-0">Địa chỉ nhận hàng</th>
                                        <th class="border-top-0">Hình thức thanh toán</th>
                                        <th class="border-top-0">Tổng giá đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $order_by_id->shipping_name }}</td>
                                        <td>{{ $order_by_id->shipping_phone }}</td>
                                        <td>{{ $order_by_id->shipping_email }}</td>
                                        <td>{{ $order_by_id->shipping_address }}</td>
                                        <td>
                                            @if($order_by_id->payment_method == 1)
                                            Thanh toán khi nhận hàng
                                            @elseif($order_by_id->payment_method == 2)
                                            Thanh toán qua thẻ
                                            @endif
                                        </td>
                                        <td>{{ $order_by_id->order_total}} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        
                            <!-- Thông tin đơn hàng -->
                            <table class="table user-table no-wrap">
                                <thead>
                                    <h4 style="text-align: center">Thông tin đơn hàng</h4>
                                    <tr>
                                        <th class="border-top-0">STT</th>
                                        <th class="border-top-0">Mã đơn hàng</th>
                                        <th class="border-top-0">Tên sản phẩm</th>
                                        <th class="border-top-0">Số lượng sản phẩm</th>
                                        <th class="border-top-0">Ghi chú</th>
                                        <th class="border-top-0">Giá sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order_details as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order_by_id->order_id }}</td>
                                        <td>{{ $detail->product_name }}</td>
                                        <td>{{ $detail->product_sales_qty }}</td>
                                        <td>{{ $detail->shipping_infnote }}</td>
                                        <td>{{ number_format($detail->product_price, 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection