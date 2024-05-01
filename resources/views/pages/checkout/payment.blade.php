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
                    {{-- <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Bạn có mã giảm giá? <a href="#">Nhấn vào đây</a> để nhập mã giảm giá</h6>
                        <h6 class="checkout__title">Thông tin khách hàng</h6>
                        
                    </div> --}}
                    <div class="col-lg-12 col-md-12">
                        <div class="checkout__order">
                            <h6 class="order__title">Đơn hàng của bạn</h6>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="shopping__cart__table">
                                        @php
                                        $content = Cart::content();
                                        @endphp
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Sản phẩm</th>
                                                    <th style="text-align: center;">Số lượng</th>
                                                    <th style="text-align: center;">Tổng tiền</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($content as $c_content)
                                                <tr>
                                                    <td class="product__cart__item">
                                                        <div class="product__cart__item__pic">
                                                            <img src="{{URL::to('public/images/products/'.$c_content->options->image)}}"
                                                                width="100px" alt="">
                                                        </div>
                                                        <div class="product__cart__item__text">
                                                            <h6>{{$c_content->name}}</h6>
                                                            <h5>{{number_format($c_content->price, 0, ',', '.')}} VNĐ</h5>
                                                        </div>
                                                    </td>
                                                    <form action="{{URL::to('/update-qty-cart')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="rowId_cart" value="{{$c_content->rowId}}">
                                                        <td class="quantity__item">
                                                            <div class="quantity"
                                                                style="display: flex; flex-direction: column; align-items: center;">
                                                                <div class="pro-qty" style="margin-bottom: 5px;">
                                                                    <input type="text" name="quantity_cart" value="{{$c_content->qty}}">
                                                                </div>
                                                                <div class="continue__btn update__btn" style="margin-top: 5px;">
                                                                    <button type="submit" name="update_qty_cart"
                                                                        style="padding: 5px 10px;">Cập nhật</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </form>
                    
                                                    <td class="cart__price">
                                                        @php
                                                        $subtotal = $c_content->price * $c_content->qty;
                                                        echo number_format($subtotal, 0, ',', '.') . ' VNĐ';
                                                        @endphp
                                                    </td>
                                                    <td class="cart__close"><a href="{{URL::to('/delete-cart/'.$c_content->rowId)}}"><span
                                                                class="icon_close"> </a></span></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <div class="continue__btn">
                                                <a href="{{URL::to('/danh_muc_sp/3')}}">Order thêm topping</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="cart__discount">
                                        <h6>Mã giảm giá</h6>
                                        <form action="#">
                                            <input type="text" placeholder="Mã giảm giá">
                                            <button type="submit">Áp dụng</button>
                                        </form>
                                    </div>
                                    <div class="cart__total">
                                        <h6>Tổng đơn hàng</h6>
                                        <ul>
                                            {{-- <li>Tổng sản phẩm <span>{{number_format(Cart::subtotal(), 0, ',', '.')}} VNĐ</span></li>
                                            --}}
                                            <li>Phí vận chuyển <span>Miễn phí</span></li>
                                            <li>Tổng đơn hàng <span>{{number_format(Cart::subtotal(), 0, ',', '.')}} VNĐ</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="cart__total">
                                <h6>Chọn hình thức thanh toán</h6>
                                <form action="{{URL::to('/order-place')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán khi nhận hàng
                                        <input type="checkbox" id="payment" name="payment_option" value="Tiền mặt">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Thanh toán chuyển khoản
                                        <input type="checkbox" id="paypal" name="payment_option" value="Chuyển khoản">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            
                            </div>
                           
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<!-- Checkout Section End -->



@endsection