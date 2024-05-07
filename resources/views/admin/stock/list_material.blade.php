@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê sản phẩm</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê sản phẩm</li>
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
                                        <th class="border-top-0">Mã sản phẩm</th>
                                        <th class="border-top-0">Tên sản phẩm</th>
                                        <th class="border-top-0">Tên danh mục</th>
                                        <th class="border-top-0">Giá sản phẩm</th>
                                        <th class="border-top-0">Hình ảnh sản phẩm</th>
                                        <th class="border-top-0">Số lượng</th>
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
                                    @foreach($list_material as $key => $product)
                                        <tr>
                                            <td>{{$stt}}</td>
                                            <td>{{$product->product_id}}</td>
                                            <td>{{ Str::limit($product->product_name, 15)}}</td>
                                            <td>{{ Str::limit($product->category_name, 15) }}</td>
                                            <td>{{ number_format($product->product_price, 0, ',', '.') }} VNĐ</td>
                                            <td class="mt-4">
                                                @if($product->product_image && file_exists(public_path('images/products/'.$product->product_image)))
                                                    <img src="{{ URL::to('/public/images/products/'.$product->product_image) }}" class="rounded-circle" width="90px" />
                                                @else
                                                    NULL
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <form action="{{URL::to('/edit-list-material/'.$product->product_id)}}" method="POST" class="d-flex">
                                                        @csrf
                                                        <input type="number" name="endpro_number" value="{{$product->endpro_number}}" class="form-control  me-2" style="width: 70px;">
                                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-check"></i></button>                                                    </form>
                                                </div>
                                            </td>                                            
                                        </tr>
                                        @php
                                            $stt++;
                                        @endphp
                                    @endforeach
                                </tbody>

                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                {{ $list_material->links() }}
                            </div>
                        </div>
                   </div>
                </div>
            </div>          
        </div>
    </div>  
</div>

@endsection