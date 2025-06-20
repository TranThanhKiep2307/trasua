@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê nhà cung cấp</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê nhà cung cấp</li>
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
                                        <th class="border-top-0">Mã nhà cung cấp</th>
                                        <th class="border-top-0">Tên nhà cung cấp</th>
                                        <th class="border-top-0">Số điện thoại</th>
                                        <th class="border-top-0">Địa chỉ</th>
                                        <th class="border-top-0">Chỉnh sửa</th>
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
                                    @foreach($all_supplier as $key => $all_sup)
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$all_sup->supplier_id}}</td>
                                            <td>{{$all_sup->supplier_name}}</td>
                                            <td>{{$all_sup->supplier_phone}}</td>
                                            <td>{{Str::limit($all_sup->supplier_address, 20)}}</td>
                                            <td>
                                                <a class="me-3 fas fa-pencil-alt" href="{{URL::to('/edit-supplier/'.$all_sup->supplier_id)}}" aria-hidden="true"></a>
                                                <a onclick="return confirm('Bạn chắc xóa danh mục này chứ?')" class="me-3 fas fa-trash" 
                                                href="{{URL::to('/delete-supplier/'.$all_sup->supplier_id)}}" aria-hidden="true"></a>
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