@extends('layouts.app1');

@section('title')
    Xac nhan don hang
@endsection

@section('content')
<section class="centerLogo text-center">
    <img src="uploadMedia/images/logo.png" alt="" class="img-responsive">
</section>

<section class="payment">
    <div class="container">
        <div class="blockTitle">
            <h2>
                <a href="javascript:void(0)">
                    Xác nhận đơn hàng
                </a>
            </h2>
        </div>

        <form action="">
            <div class="paymentContent row">
                <div class="col-xs-12 col-sm-4">
                    <div class="cf-title address-list">
                        <div class="top">
                            <span class="icon">1</span> Địa chỉ
                        </div>
                        <div class="cf-middle-content">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="phoneNumber" class="form-control" placeholder="Số Điện Thoại">
                            </div>
                            <div class="row address_genral">
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <select name="city" name="city" id="" class="form-control"></select>
                                </div>

                                <div class="col-xs-12 col-sm-6 form-group">
                                    <select name="district" name="city" id="" class="form-control"></select>
                                </div>

                                <div class="col-xs-12 col-sm-12 form-group">
                                    <textarea class="form-control" name="infoDetailAddress" placeholder="Số nhà, đường/phố, tòa nhà, xã/phường ,....... Vui lòng điền đầy đủ thông tin." required="" aria-required="true"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xs-12 col-sm-4">
                    <div class="cf-title methodPayment">
                        <div class="top">
                            <span class="icon">2</span> Phương thức thanh toán
                        </div>
                        <div class="cf-middle-content">
                            <div class="input-radio form-group radio">
                                <label><input type="radio" name="optradio" checked>Thanh Toán Tại Nhà (COD)</label>
                                <span class="checkmark"></span>
                            </div>
                            <div class="input-radio form-group radio">
                                <label><input type="radio" name="optradio">Thanh Toán Tại Cửa Hàng</label>
                                <span class="checkmark"></span>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-xs-12 col-sm-4">
                    <div class="cf-title productOrder">
                        <div class="top">
                            <span class="icon">3</span> Danh sách sản phẩm đã chọn
                        </div>
                        <div class="cf-middle-content">
                            <div class="productOrderContent">
                                <p>Danh Sách Sản Phẩm</p>
                                <div class="media">
                                    <div class="media-link pull-left">
                                        <img src="img/productDemo1.jpg" alt="" class="img-responsive">
                                    </div>

                                    <div class="media-body">
                                        <p class="nameProduct">Hạt Điều</p>
                                        <p><span class="quanityProduct">1</span>x <span class="priceProduct">190.0000</span></p>
                                    </div>
                                </div>

                                <div class="media">
                                    <div class="media-link pull-left">
                                        <img src="img/productDemo1.jpg" alt="" class="img-responsive">
                                    </div>

                                    <div class="media-body">
                                        <p class="nameProduct">Hạt Điều</p>
                                        <p><span class="quanityProduct">1</span>x <span class="priceProduct">190.0000</span></p>
                                    </div>
                                </div>

                                <p style="margin-top : 30px" class="pull-left"><strong style="font-size : 16px">Tổng Tiền :</strong> <span class="totalPrice">380.000đ</span></p>

                                <div class="pull-right" style="margin-top : 30px">
                                    <button class="btn btn-default btn-submit pull-right" type="submit">Đặt Hàng</button>
                                    <a href="" class="btn btn-danger pull-right">Mua Thêm Hàng</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</section>
@endsection

