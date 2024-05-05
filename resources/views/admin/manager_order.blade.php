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
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<h5>'.$message.'</h5>';
                                Session::put('message',null);
                            }
                            ?>
                            <table class="table user-table no-wrap">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th class="border-top-0">STT</th>
                                        <th class="border-top-0">Mã đơn hàng</th>
                                        <th class="border-top-0">Tên khách hàng</th>
                                        <th class="border-top-0">Địa chỉ giao hàng</th>
                                        <th class="border-top-0">Hình thức thanh toán</th>
                                        <th class="border-top-0">Tổng đơn hàng</th>
                                        <th class="border-top-0">Trạng thái đơn hàng</th>
                                        <th class="border-top-0">Chỉnh sửa đơn hàng</th>

                                        </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <style>
                                        .me-3.fa.fa-toggle-on, .me-3.fas.fa-pencil-alt  {
                                            color: green; 
                                            font-size: 30px;
                                        }
                                    
                                        .me-3.fa.fa-toggle-off, .me-3.fas.fa-trash {
                                            color: red; 
                                            font-size: 30px;
                                        }
                                    </style>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach($all_order as $key => $order)
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{ Str::limit($order->customer_name)}}</td>
                                            <td>{{ Str::limit($order->shipping_address) }}</td>
                                            <td>
                                                @if($order->payment_method == 1)
                                                    Thanh toán khi nhận hàng
                                                @elseif($order->payment_method == 2)
                                                    Thanh toán qua thẻ
                                                @endif
                                                </td>

                                            <td>{{$order->order_total}} VNĐ</td>
                                            
                                            
                                            <td>
                                                {{$order->order_stt}}
                                            </td>
                                            <td >
                                                <a class="me-3 fas fa-pencil-alt" href="{{URL::to('/view-order/'.$order->order_id)}}" aria-hidden="true"></a>
                                                <a onclick="return confirm('Bạn chắc xóa đơn hàng này chứ?')" class="me-3 fas fa-trash" href="{{URL::to('/delete-order/'.$order->order_id)}}" aria-hidden="true"></a>
                                            </td>
                                        </tr>
                                        @php
                                            $stt++;
                                        @endphp
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