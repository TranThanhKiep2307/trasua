@extends('welcome')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <span>Thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Bạn có mã giảm giá? <a href="#">Nhấn vào đây</a> để nhập mã giảm giá</h6>
                        <h6 class="checkout__title">Thông tin khách hàng</h6>
                        <form action="{{URL::to('/save-checkout')}}" method="POST">
                            {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Họ và tên<span>*</span></p>
                                    <input type="text" name="shipping_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Số điện thoại<span>*</span></p>
                                    <input type="text" name="shipping_phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="shipping_email">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ<span>*</span></p>
                            <input type="text" name="shipping_address" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Lưu ý về đơn đặt hàng của bạn, ví dụ: Giao ở trước cống Trường CNTT
                                <input type="checkbox" id="diff-acc" name="shipping_ynnote" onchange="updateCheckboxValue(this)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        
                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <input type="text" name="shipping_infnote"
                            placeholder="Lưu ý về đơn đặt hàng của bạn, ví dụ: Giao ở trước cống Trường CNTT" >
                        </div>
                        <button type="submit" name="save_order" class="site-btn">Xác nhận thông tin</button>
                    </form>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->



@endsection