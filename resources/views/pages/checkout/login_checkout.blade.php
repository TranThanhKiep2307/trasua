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
                    <form action="#">
                        <input type="email" placeholder="Email">
                        <input type="password" placeholder="Mật khẩu">
                        <button type="submit" class="site-btn">Đăng nhập</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="class__form">
                    <div class="section-title">
                        <span>Đăng ký</span>
                    </div>
                    <form action="#">
                        <input type="text" placeholder="Họ tên">
                        <input type="phone" placeholder="Số điện thoại">
                        {{-- <select>
                            <option value="">Studying Class</option>
                            <option value="">Writting Class</option>
                            <option value="">Reading Class</option>
                        </select> --}}
                        <input type="email" placeholder="Email">
                        <input type="password" placeholder="Mật khẩu">
                        <button type="submit" class="site-btn">Đăng ký</button>
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
</section>

@endsection