@extends('admin_layout')
@section('admin_content')

<div class="page-wrapper">
  <div class="page-breadcrumb">
      <div class="row align-items-center">
          <div class="col-md-6 col-8 align-self-center">
              <h3 class="page-title mb-0 p-0">Thay đổi trạng thái đơn hàng</h3>
              <div class="d-flex align-items-center">
                  <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{URL::to('/dashboard')}}">Trang chủ</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Thay đổi trạng thái đơn hàng</li>
                      </ol>
                  </nav>
              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                    <center class="card-title mt-2">Thay đổi trạng thái đơn hàng</center>
                    @foreach ($order as $or)
                    <form class="form-horizontal form-material mx-2" action="{{URL::to('/update-stt-order/'.$or->order_id)}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-12">Chọn trạng thái</label>
                            <div class="col-sm-12 border-bottom">
                                <select class="form-select shadow-none border-0 ps-0 form-control-line" name="order_stt">
                                    <option value="{{$or->order_stt}}">
                                        @if ($or->order_stt == 0)
                                        Đang chờ xử lí
                                        @elseif($or->order_stt == 1)
                                        Đang thực hiện
                                        @elseif($or->order_stt == 2)
                                        Đã thanh toán
                                        @elseif($or->order_stt == 3)
                                        Đang giao hàng
                                        @elseif($or->order_stt == 4)
                                        Đã hoàn thành
                                        @endif
                                    </option>
                                    <option value="0">Đang chờ xử lí</option>
                                    <option value="1">Đang thực hiện</option>
                                    <option value="2">Đã thanh toán</option>
                                    <option value="3">Đang giao hàng</option>
                                    <option value="4">Đã hoàn thành</option>
                                </select>
                            </div>
                        </div>
                        <center><button type="submit" class="btn btn-success mx-auto mx-md-0 text-white" name="change-order">Cập nhật trạng thái</button></center>
                    </form>                    
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  
@endsection