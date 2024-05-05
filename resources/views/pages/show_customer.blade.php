@extends('welcome')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Thông tin khách hàng</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <span>Thông tin khách hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Class Section Begin -->
<section class="class-page spad">
    <div class="container">
        <div class="row">
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            <div class="col-lg-12">
                <div class="class__sidebar">
                    <h5>Thông tin khách hàng</h5>
                    <form action="{{URL::to('/update-customer/'.$customer->customer_id)}}" method="POST">
                        {{ csrf_field() }}
                        <input type="text" name="customer_name" value="{{$customer->customer_name}}">
                        <input type="text" name="customer_phone" value="{{$customer->customer_phone}}">
                        <input type="email" name="customer_email" value="{{$customer->customer_email}}">
                        <input type="password" name="customer_password" value="{{$customer->customer_password}}">
                        <button type="submit" name="submit" class="site-btn">Cập nhật</button>
                    </form>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="class__sidebar">
                    <h5>Đổi mật khẩu</h5>
                    <form action="#">
                        <input type="password" placeholder="Mật khẩu cũ">
                        <input type="password" placeholder="Mật khẩu mới">
                        <button type="submit" class="site-btn">Đổi mật khẩu</button>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
</section>
<!-- Class Section End -->

@endsection