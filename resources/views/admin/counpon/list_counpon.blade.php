@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Danh sách mã giảm giá</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh sách mã giảm giá</li>
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
                                        <th class="border-top-0">Tên mã giảm giá</th>
                                        <th class="border-top-0">Mã giảm giá</th>
                                        <th class="border-top-0">Số lượng mã</th>
                                        <th class="border-top-0">Tính năng mã</th>
                                        <th class="border-top-0">Số giảm</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <style>
                                        .me-3.fas.fa-pencil-alt  {
                                            color: green; 
                                            font-size: 30px;
                                        }
                                    
                                        .me-3.fas.fa-trash {
                                            color: red; 
                                            font-size: 30px;
                                        }
                                    </style>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @foreach($all_counpon as $key => $counpon)
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$counpon->counpon_name}}</td>
                                            <td>{{$counpon->counpon_code}}</td>
                                            <td>{{$counpon->counpon_time}}</td>
                                            <td>
                                                @if ($counpon->counpon_condition == 1)
                                                    Giảm theo %                                                    
                                                @elseif($counpon->counpon_condition == 2)
                                                    Giảm theo tiền                                                
                                                @endif
                                            </td>
                                            <td>
                                                @if ($counpon->counpon_condition == 1)
                                                    {{$counpon->counpon_number}} %
                                                @elseif($counpon->counpon_condition == 2)
                                                    {{ number_format($counpon->counpon_number, 0, ',', '.') }} VNĐ
                                                @endif
                                            </td>
                                            <td>
                                                <a class="me-3 fas fa-pencil-alt" href="{{URL::to('/edit-counpon/'.$counpon->counpon_id)}}" aria-hidden="true"></a>
                                                <a onclick="return confirm('Bạn chắc xóa danh mục này chứ?')" class="me-3 fas fa-trash" href="{{URL::to('/delete-counpon/'.$counpon->counpon_id)}}" aria-hidden="true"></a>
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