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
                    <div class="col-lg-8 col-md-6">
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
                                Lưu ý về đơn đặt hàng của bạn, ví dụ: thông báo đặc biệt về giao hàng
                                <input type="checkbox" id="diff-acc" name="shipping_ynnote" onchange="updateCheckboxValue(this)">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        
                        
                        
                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <input type="text" name="shipping_infnote"
                            placeholder="Lưu ý về đơn đặt hàng của bạn, ví dụ: thông báo đặc biệt về giao hàng" >
                        </div>
                        <button type="submit" name="save_order" class="site-btn">Xác nhận thông tin</button>
                    </form>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h6 class="order__title">Đơn hàng của bạn</h6>
                            <div class="checkout__order__products">Sản phẩm<span>Giá tiền</span></div>
                            <ul class="checkout__total__products">
                                <li><samp>01.</samp> Vanilla salted caramel <span>2</span> <span>$ 300.0</span></li>
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Phí vận chuyển <span>Miễn phí</span></li>
                                <li>Tổng tiền <span>$750.99</span></li>
                                <li>Tổng thanh toán <span>$750.99</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Thanh toán khi nhận hàng
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Thanh toán chuyển khoản
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->



@endsection