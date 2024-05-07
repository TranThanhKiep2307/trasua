@extends('admin_layout')
@section('admin_content')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Liệt kê bình luận</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Liệt kê bình luận</li>
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
                                        <th class="border-top-0">Tên sản phẩm</th>
                                        <th class="border-top-0">Tên khách hàng</th>
                                        <th class="border-top-0">Số sao</th>
                                        <th class="border-top-0">Nội dung bình luận</th>
                                        <th class="border-top-0">Trả lời bình luận</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <style>
                                        .me-3.fa.fa-toggle-on,
                                        .me-3.fas.fa-pencil-alt,
                                        .me-3.fas.fa-reply {
                                            color: green;
                                            font-size: 20px;
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
                                    @foreach($all_cmt as $key => $all)
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{ Str::limit($all->product_name, 20)}}</td>
                                        <td>{{ Str::limit($all->customer_name, 20) }}</td>
                                        <td>{{$all->cm_star }}/5</td>
                                        <td>{{ Str::limit($all->cm_cmt, 20) }}</td>
                                        <td>
                                            <div style="display: flex; align-items: center;">
                                                <form method="POST" action="{{ URL::to('/edit-cm/'.$all->cm_id) }}">
                                                    {{ csrf_field() }}
                                                    <textarea name="admin_reply" rows="2" cols="30">{{ $all->cm_answer }}</textarea>
                                                    <div style="margin-left: auto;">
                                                        <button type="submit" class="btn btn-primary">Trả lời</button>
                                                    </div>
                                                </form>
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
                                {{ $all_cmt->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection