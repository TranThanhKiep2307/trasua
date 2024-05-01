@extends('welcome')
@section('content')

<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__text">
                    <h2>Kết quả tìm kiếm</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="breadcrumb__links">
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                    <a href="./shop.html">Cừa hàng</a>
                    <span>{{ $keyword }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <form id="searchForm" action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{ csrf_field() }}
                            <select id="categorySelect" name="category_id">
                                <option value="">Danh mục</option>
                                @foreach ($category as $cate)
                                    <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="keyword_submit" placeholder="Tìm kiếm">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-lg-5 col-md-5">
                    <div class="shop__option__right">
                        <select>
                            <option value="">Default sorting</option>
                            <option value="">A to Z</option>
                            <option value="">1 - 8</option>
                            <option value="">Name</option>
                        </select>
                        <a href="#"><i class="fa fa-list"></i></a>
                        <a href="#"><i class="fa fa-reorder"></i></a>
                    </div>
                </div> --}}
            </div>
        </div>
        @if (count($search_product) > 0)
            <div class="row">
                @foreach ($search_product as $pro)
                    <a href="{{URL::to('/chi_tiet_sp/'.$pro->product_id)}}">
                        <div class="col-lg-3 col-md-6 col-sm-6">
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
        @else
            <h3>Không có sản phẩm bạn cần tìm. Chúng tôi sẽ cập nhật thêm!!!</h3>
        @endif
        {{-- <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__last__text">
                        <p>Showing 1-9 of 10 results</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</section>

@endsection