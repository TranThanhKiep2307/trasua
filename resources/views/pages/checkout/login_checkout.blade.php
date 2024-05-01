@extends('welcome')
@section('content')

<section class="class spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="class__form">
                    <div class="section-title">
                        <span>Đăng nhập</span>
                    </div>
                    <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{ csrf_field() }}  
                        <input type="email_acc" placeholder="Email hoặc Số điện thoại">
                        <input type="password_acc" placeholder="Mật khẩu">
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Ghi nhớ đăng nhập
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <button type="submit" name="submit" class="site-btn">Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="class__form">
                    <div class="section-title">
                        <span>Đăng ký</span>
                    </div>
                    <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{csrf_field()}}
                        <input type="text" name="customer_name" placeholder="Họ tên">
                        <input type="phone" name="customer_phone" placeholder="Số điện thoại">
                        {{-- <select>
                            <option value="">Studying Class</option>
                            <option value="">Writting Class</option>
                            <option value="">Reading Class</option>
                        </select> --}}
                        <input type="email" name="customer_email" placeholder="Email">
                        <input type="password" name="customer_password" placeholder="Mật khẩu">
                        <button type="submit" class="site-btn">Đăng ký</button>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
</section>

@endsection