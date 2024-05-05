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

@endsection