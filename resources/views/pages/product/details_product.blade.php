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
                        <li>Số lượng trong kho: <span>{{$pro_dt->endpro_number}}</span></li>
                        <li>Tình trạng: 
                            <span>
                                @if($pro_dt->product_status == 0)
                                    @if($pro_dt->endpro_number > 0)
                                        Còn bán
                                    @else
                                        Ngưng bán
                                    @endif
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
                                    <input name="qty" type="number" value="1" max="{{$pro_dt->endpro_number}}">
                                    <input name="pro_id" type="hidden" value="{{$pro_dt->product_id}}">
                                </div>
                            </div>
                            @if($pro_dt->endpro_number > 0)
                                <button type="submit" name="submit" class="primary-btn">Thêm vào giỏ hàng</button>
                            @else
                                <button type="button" class="primary-btn" disabled>Thêm vào giỏ hàng</button>
                            @endif                        
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
                                <br>
                                <br>
                                <div class="blog__details__comment">
                                    <div class="blog__details__comment">
                                        @foreach ($pro_details as $all)
                                        @if($all->customer_name)
                                                <div class="blog__details__comment__item">
                                                    <div class="blog__details__comment__item__pic">
                                                        <img src="{{ asset('public/frontend/img/icon/user.png') }}" alt="">
                                                    </div>
                                                    <div class="rating">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $all->cm_star)
                                                                <span class="icon_star"></span>
                                                            @else
                                                                <span class="icon_star-half_alt"></span>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                    <div class="blog__details__comment__item__text">
                                                        <h6>{{$all->customer_name}}</h6>
                                                        <span>{{ \Carbon\Carbon::parse($all->created_at)->format('Y-m-d H:i:s') }}</span>
                                                        <hp>{{$all->cm_cmt}}</hp>
                                                    </div>
                                                </div>
                                                <!-- Nếu bạn muốn hiển thị phản hồi, bạn có thể làm như sau -->
                                                @if($all->cm_answer)
                                                    <div class="blog__details__comment__item blog__details__comment__item--reply">
                                                        <div class="blog__details__comment__item__pic">
                                                            <img src="{{ asset('public/frontend/img/logonew.png') }}" alt="">
                                                        </div>
                                                        <div class="blog__details__comment__item__text">
                                                            <h6>Tý Tea</h6>
                                                            <span>{{ \Carbon\Carbon::parse($all->updated_at)->format('Y-m-d H:i:s') }}</span>
                                                            <hp>{{ $all->cm_answer }}</hp>
                                                        </div>
                                                    </div>
                                                @endif
                                        @else
                                            <p>Không có comment nào được tìm thấy.</p>
                                        @endif
                                        @endforeach
                                    </div>                                    
                                </div>
                                <h5>Đánh giá</h5>
                                <div class="contact__form">
                                    <form action="{{URL::to('/add-cmt')}}" method="POST">
                                        {{ csrf_field() }}
                                        @php
                                            $customer_id = Session::get('customer_id');
                                        @endphp
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <input type="number" name="cm_star" min="1" max="5" placeholder="Số sao">
                                                <input type="hidden" name="product_id" value="{{$pro_dt->product_id}}">
                                                <input type="hidden" name="cm_answer" value="NULL">
                                                <input type="hidden" name="updated_at" value="NULL">
                                                @if($customer_id)
                                                    <input type="hidden" name="customer_id" value="{{ $customer_id }}">
                                                @else
                                                    <p>Vui lòng đăng nhập để đánh giá và bình luận.</p>
                                                @endif
                                                <input type="hidden" name="created_at" value="{{ now() }}" >
                                                @if($customer_id)
                                                    <button type="submit" name="add-customer" class="site-btn">Đánh giá</button>
                                                @endif
                                            </div>
                                            <div class="col-lg-8">
                                                <textarea placeholder="Đánh giá" name="cm_cmt"></textarea>
                                            </div>
                                        </div>
                                    </form>                                 
                                </div>
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