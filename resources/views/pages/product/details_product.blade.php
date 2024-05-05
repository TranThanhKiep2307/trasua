@extends('welcome')
@section('content')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Chi tiết sản phẩm</h2>
                </div>
            </div>
            @foreach ($pro_details as $pro_dt)
                
            
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <a href="./shop.html">Cừa hàng</a>
                    <span>{{$pro_dt->product_name}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__img">
                    <div class="product__details__big__img">
                        <img class="big_img" src="{{ asset('public/images/products/'.$pro_dt->product_image)}}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <div class="product__label">Cupcake</div>
                    <h4>{{$pro_dt->product_name}}</h4>
                    <h5>{{ number_format($pro_dt->product_price, 0, ',', '.') }} VNĐ</h5>

                    <p>{{$pro_dt->product_decs}}</p>
                    <ul>
                        <li>Mã sản phẩm: <span>{{$pro_dt->product_id}}</span></li>
                        <li>Danh mục: <span>{{$pro_dt->category_name}}</span></li>
                        <li>Tình trạng: 
                            <span>
                                @if($pro_dt->product_status == 0)
                                    Còn bán
                                @elseif($pro_dt->product_status == 1)
                                    Ngưng bán
                                @endif
                            </span>
                        </li>
                    </ul>
                    <form action="{{URL::to('/save-cart')}}" method="post">
                        {{csrf_field()}}
                        <div class="product__details__option">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input name="qty" type="number" value="1" max="20">
                                    <input name="pro_id" type="hidden" value="{{$pro_dt->product_id}}">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                            {{-- <a href="" class="heart__btn"><span class="icon_heart_alt"></span></a> --}}
                        </div> 
                    </form>
                    
                </div>
            </div>
        </div>
        <div class="product__details__tab">
            <div class="col-lg-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Đánh giá</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p>{{$pro_dt->product_decs}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p>This delectable Strawberry Pie is an extraordinary treat filled with sweet and
                                    tasty chunks of delicious strawberries. Made with the freshest ingredients, one
                                    bite will send you to summertime. Each gift arrives in an elegant gift box and
                                    arrives with a greeting card of your choice that you can personalize online!3
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- Shop Details Section End -->

<!-- Related Products Section Begin -->
<section class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h2>Sản phẩm tương tự</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="related__products__slider owl-carousel">
                @foreach ($pro_related as $pr_rl)
                
                <div class="col-lg-3">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('public/images/products/'.$pr_rl->product_image)}}">
                            <div class="product__label">
                                <span>{{$pr_rl->category_name}}</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">{{$pr_rl->product_name}}</a></h6>
                            <div class="product__item__price">{{$pr_rl->product_name}}</div>
                            <div class="cart_add">
                                <a href="#">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Related Products Section End -->

@endsection