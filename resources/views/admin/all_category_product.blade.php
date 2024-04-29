@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê danh mục</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê danh mục</li>
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
                                        <th class="border-top-0">Mã danh mục</th>
                                        <th class="border-top-0">Tên danh mục</th>
                                        <th class="border-top-0">Mô tả</th>
                                        <th class="border-top-0">Hình ảnh</th>
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
                                    @foreach($all_category_product as $key => $category_product)
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$category_product->category_id}}</td>
                                            <td>{{$category_product->category_name}}</td>
                                            <td style="text-align: left;">{{$category_product->category_decs}}</td>
                                            <td class="mt-4">
                                                @if($category_product->category_image && file_exists(public_path('images/category/'.$category_product->category_image)))
                                                    <img src="{{ URL::to('/public/images/category/'.$category_product->category_image) }}"  width="50px" />
                                                @else
                                                    NULL
                                                @endif
                                            </td>
                                            <td>
                                                <a class="me-3 fas fa-pencil-alt" href="{{URL::to('/edit-category-product/'.$category_product->category_id)}}" aria-hidden="true"></a>
                                                <a onclick="return confirm('Bạn chắc xóa danh mục này chứ?')" class="me-3 fas fa-trash" href="{{URL::to('/delete-category-product/'.$category_product->category_id)}}" aria-hidden="true"></a>
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