@extends('welcome')
@section('content')

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            @foreach ($all_product as $pro)
            <a href="{{URL::to('/chi_tiet_sp/'.$pro->product_id)}}">
                <div class="col-lg-3 x col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{URL::to('public/images/products/'.$pro->product_image)}}">
                            <div class="product__label">
                                <span>{{$pro->category_name}}</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$pro->product_name}}</a></h6>
                            <div class="product__item__price">{{ number_format($pro->product_price, 0, ',', '.') }} VNĐ</div>
                            <div class="cart_add">
                                <a href="#">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <span>Đánh giá</span>
                    <h2>Bình luận của khách hàng</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="testimonial__slider owl-carousel">
                <div class="col-lg-6">
                    <div class="testimonial__item">
                        <div class="testimonial__author">
                            <div class="testimonial__author__pic">
                                <img src="public/frontend/img/testimonial/ta-1.jpg" alt="">
                            </div>
                            <div class="testimonial__author__text">
                                <h5>Kerry D.Silva</h5>
                                <span>New york</span>
                            </div>
                        </div>
                        <div class="rating">
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star"></span>
                            <span class="icon_star-half_alt"></span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua viverra lacus vel facilisis.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->
@endsection