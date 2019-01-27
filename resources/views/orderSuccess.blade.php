@extends('layouts.app1');

@section('title')
    Đơn hàng thành công
@endsection

@section('content')
    <section class="centerLogo text-center">
        <img src="uploadMedia/images/logo.png" alt="" class="img-responsive">
    </section>

    <section class="successOrder">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="javascript:void(0)">
                        Cảm ơn quý khách đã tin tưởng đạt thủy
                    </a>
                </h2>
            </div>

            <div class="successOrderContent row">
                <h3 class="text-center">Đặt hàng thành công</h3>
                <p class="text-center">Mã đơn hàng : </p>

                <ul>
                    <li>Công ty trách nhiệm hữu hạn mtv Đạt Thủy chúng tôi sẽ thông tin chi tiết đơn hàng về email : phamtiendzbk@gmail.com</li>
                    <li>Công ty sẽ liên lạc lại với quý khách và tiến hành giao hàng. Cảm ơn chân thành quý khách đã mua hàng</li>
                    <li>Qúy khách vui lòng lưu giữ lại thông tin đơn hàng(ví dụ như mã đơn hàng,..) để tiện tra cứu</li>
                </ul>
                <div class="text-center">
                    <a href="/" class="text-center btn btn-default btn-back">Tiếp tục mua hàng</a>
                </div>
                

            </div>
        </div>
    </section>
@endsection