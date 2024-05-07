@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê nguyên liệu</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê nguyên liệu</li>
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
                                        <th class="border-top-0">Mã nguyên liệu</th>
                                        <th class="border-top-0">Tên nguyên liệu</th>
                                        <th class="border-top-0">Tên nhà cung cấp</th>
                                        <th class="border-top-0">Giá nguyên liệu</th>
                                        <th class="border-top-0">Số lượng nguyên liệu</th>
                                        <th class="border-top-0">Hình ảnh nguyên liệu</th>
                                        <th class="border-top-0">Mô tả nguyên liệu</th>
                                        <th class="border-top-0">Trạng thái nguyên liệu</th>
                                        <th class="border-top-0">Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <style>
                                        .me-3.fa.fa-toggle-on,
                                        .me-3.fas.fa-pencil-alt {
                                            color: green;
                                            font-size: 30px;
                                        }

                                        .me-3.fa.fa-toggle-off,
                                        .me-3.fas.fa-trash {
                                            color: red;
                                            font-size: 30px;
                                        }
                                    </style>
                                    @php
                                    $stt = 1;
                                    @endphp
                                    @foreach($all_material as $key => $all)
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{$all->material_id}}</td>
                                        <td>{{ Str::limit($all->material_name, 15)}}</td>
                                        <td>{{ Str::limit($all->supplier_name, 15) }}</td>
                                        <td>{{ number_format($all->material_price, 0, ',', '.') }} VNĐ</td>
                                        <td>{{$all->material_number}} {{$all->material_unit}}</td>
                                        <td class="mt-4">
                                            @if($all->material_image &&
                                            file_exists(public_path('images/material/'.$all->material_image)))
                                            <img src="{{ URL::to('/public/images/material/'.$all->material_image) }}"
                                                class="rounded-circle" width="90px" />
                                            @else
                                            NULL
                                            @endif
                                        </td>
                                        <td>
                                            @if($all->material_decs)
                                            {{ Str::limit($all->material_decs, 15) }}
                                            @else
                                            NULL
                                            @endif
                                        </td>

                                        <td>
                                            @if($all->material_stt == 0)
                                            <a class="me-3 fa fa-toggle-on"
                                                href="{{URL::to('/off-material/'.$all->material_id)}}"></a>
                                            @elseif($all->material_stt == 1)
                                            <a class="me-3 fa fa-toggle-off"
                                                href="{{URL::to('/on-material/'.$all->material_id)}}"></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="me-3 fas fa-pencil-alt"
                                                href="{{URL::to('/edit-material/'.$all->material_id)}}"
                                                aria-hidden="true"></a>
                                            <a onclick="return confirm('Bạn chắc xóa danh mục này chứ?')"
                                                class="me-3 fas fa-trash"
                                                href="{{URL::to('/delete-material/'.$all->material_id)}}"
                                                aria-hidden="true"></a>
                                        </td>
                                    </tr>
                                    @php
                                    $stt++;
                                    @endphp
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $all_material->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection