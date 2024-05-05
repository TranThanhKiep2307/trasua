@extends('welcome')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="product__details__img">
                <div class="product__details__big__img">
                    <img class="big_img" src="{{asset('/public/frontend/img/VCB.jpg')}}" alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="product__details__text">
                <div class="product__label">Thông tin tài khoản</div>
                <h4>Ngân hàng: VIETCOMBANK</h4>
                <h5>STK: 1015096963</h5>
                <h5>Tên tài khoản: TRAN THANH KIEP</h5>
                <p>Hãy quét mã QR sau để thanh toán hoặc nhập STK này chúng tôi sẽ liên hệ với bạn sớm nhất!!!</p>
            </div>
        </div>
    </div>
</div>

@endsection