<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tý Tea</title>
    <link rel="icon" type="image/png" href="{{ asset('public/frontend/img/logonew.png') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/barfiller.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/stylemain.css') }}" type="text/css">
</head>

<body>
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                    <a href="{{URL::to('/login-checkout')}}"><img src="{{ asset('public/frontend/img/icon/user.png') }}" width="30px" alt=""></a>
                                    <?php
                                        if($name = session()->get('customer_name'))
                                            echo 'Xin chào '.$name; 
                                        else {
                                            echo 'Đăng nhập';
                                        }
                                    ?>

                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="{{URL::to('/')}}"><img src="{{ asset('public/frontend/img/logonew.png') }}"  alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <div class="header__top__right__links">
                                    <form action="{{URL::to('/tim-kiem')}}" method="post">
                                        {{ csrf_field() }}
                                    <input type="text"  name="keyword_submit"  placeholder="Tìm kiếm..."></input>
                                    </form>
                                    {{-- <a href="{{URL::to('/wishlist')}}"><img src="{{ asset('public/frontend/img/icon/heart.png') }}" alt=""></a> --}}
                                </div>
                                <div class="header__top__right__cart">
                                    <a href="{{ URL::to('/show-cart') }}">
                                        <img src="{{ asset('public/frontend/img/icon/cart.png') }}" alt=""> 
                                        <span>
                                            {{-- Hiển thị số lượng sản phẩm trong giỏ hàng --}}
                                            @php
                                                $cart_count = Cart::count();
                                                echo $cart_count;
                                            @endphp
                                        </span>
                                    </a>
                                    <div class="cart__price">
                                        Tổng tiền 
                                        <span>
                                            {{-- Hiển thị tổng tiền --}}
                                            {{ number_format(Cart::subtotal(),0,',','.')  }} VNĐ
                                        </span>
                                    </div>
                                </div>
                                <div class="header__top__right__cart">
                                    @php
                                        $customer_id = Session::get('customer_id');
                                    @endphp

                                    @if ($customer_id != NULL)
                                        <a href="{{URL::to('/logout-checkout') }}"><img src="{{ asset('public/frontend/img/icon/logout.png') }}" width="30px" alt=""></a>
                                    @else
                                        <a href="{{URL::to('/login-checkout') }}"><img src="{{ asset('public/frontend/img/icon/enter.png') }}" width="30px" alt=""></a>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="{{URL::to('/')}}" data-page="home">Trang chủ</a></li>
                            <li><a href="{{ URL::to('/show-cart') }}" data-page="cart">Giỏ hàng</a></li>
                            @php
                            $customer_id = Session::get('customer_id');
                            $shipping_id = Session::get('shipping_id');
                            @endphp
                            @if ($customer_id != NULL && $shipping_id == NULL)
                            <li><a href="{{URL::to('/checkout') }}" data-page="checkout">Thanh toán</a></li>
                            @elseif($customer_id != NULL && $shipping_id != NULL)
                            <li><a href="{{URL::to('/payment') }}" data-page="payment">Thanh toán</a></li>
                            @else
                            <li><a href="{{URL::to('/login-checkout') }}" data-page="login">Thanh toán</a></li>
                            @endif
                            @if ($customer_id != NULL)
                            <li><a href="{{URL::to('/show-customer')}}" data-page="customer">Tài khoản</a></li>  
                            @else
                                
                            @endif                            
                        </ul>
                    </nav>
                </div>
                
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    {{-- <section class="hero">
            <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="{{ asset('public/frontend/img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="{{ asset('public/frontend/img/hero/hero-1.jpg') }}">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Hero Section End -->

    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($category as $cate)
                    <a href="{{ URL::to('/danh_muc_sp/'.$cate->category_id)}}"> 
                        <div class="categories__item"> 
                            <div class="categories__item__icon" style="text-align: center;">
                                <div style="display: flex; flex-direction: column; align-items: center;">
                                    <img src="{{ URL::to('/public/images/category/'.$cate->category_image) }}" style="width: 100px; height: 100px;"></img>
                                    <h5 style="margin-top: 10px;">{{$cate->category_name}}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    
    

    @yield('content')


    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="{{ asset('public/frontend/img/footer-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Thời gian mở cửa</h6>
                        <ul>
                            <li>Thứ Hai - Chủ Nhật: 08:00 – 21:00 </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="#"><img src="{{ asset('public/frontend/img/logonew.png') }}" alt=""></a>
                        </div>
                        <p>Chìm đắm trong thế giới hương vị tinh tế cùng TýTea - Nơi kết nối trà, sữa và đồ ăn vặt độc đáo!</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__newslatter">
                        <h6>Đăng ký</h6>
                        <p>Nhận những thông tin và ưu đãi mới nhất.</p>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Tìm kiếm...">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
        <df-messenger
        intent="WELCOME"
        chat-title="TyTea"
        agent-id="9bdbb5ed-bbf5-4a66-ac37-e59a809fa8fa"
        language-code="vi"
        ></df-messenger>
    <script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.barfiller.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('public/frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/mainnew.js') }}"></script>
    <script>
        document.getElementById('categorySelect').onchange = function() {
            var categoryId = this.value;
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ URL::to('/tim-kiem') }}';
            
            var csrfField = document.createElement('input');
            csrfField.setAttribute('type', 'hidden');
            csrfField.setAttribute('name', '_token');
            csrfField.setAttribute('value', '{{ csrf_token() }}');
            form.appendChild(csrfField);
    
            var categoryIdField = document.createElement('input');
            categoryIdField.setAttribute('type', 'hidden');
            categoryIdField.setAttribute('name', 'category_id');
            categoryIdField.setAttribute('value', categoryId);
            form.appendChild(categoryIdField);
    
            document.body.appendChild(form);
            form.submit();
        };
    </script>
    <script>
        function updateCheckboxValue(checkbox) {
            if (checkbox.checked) {
                checkbox.value = 1; // Chọn: đặt giá trị là 1
            } else {
                checkbox.value = 0; // Không chọn: đặt giá trị là 0
            }
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Lấy địa chỉ URL hiện tại
        var currentURL = window.location.href;

        // Lấy tất cả các thẻ <a> trong menu
        var menuLinks = document.querySelectorAll(".header__menu.mobile-menu ul li a");

        // Lặp qua mỗi liên kết trong menu
        menuLinks.forEach(function(link) {
            // Lấy trang được đánh dấu của liên kết
            var linkPage = link.getAttribute("data-page");

            // Kiểm tra nếu URL hiện tại chứa trang được đánh dấu hoặc là trang chủ
            if (currentURL.includes(linkPage) || (linkPage === "home" && currentURL === window.location.origin + "/")) {
                // Loại bỏ lớp "active" từ tất cả các mục menu
                var menuItems = document.querySelectorAll(".header__menu.mobile-menu ul li");
                menuItems.forEach(function(item) {
                    item.classList.remove("active");
                });

                // Thêm lớp "active" cho thẻ <li> chứa liên kết được bấm
                link.parentNode.classList.add("active");
            }
        });
    });
    </script>
</body>

</html>
