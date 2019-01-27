@extends('layouts.app1');
@section('style')
    <style>
        .error {
            color: red;
        }
    </style>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
    <script src="/js/paymentValidate.js"></script>
@endsection
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

        <form id="paymentForm" action="/order/create" method="post">
            @csrf
            <div class="paymentContent row">
                <div class="col-xs-12 col-sm-4">
                    <div class="cf-title address-list">
                        <div class="top">
                            <span class="icon">1</span> Địa chỉ
                        </div>
                        <div class="cf-middle-content">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Họ và tên"
                                       value="{{old('name')}}"
                                       required>
                                @if ($errors->has('name'))
                                    <span class="help-block error">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}"  required>
                                @if ($errors->has('email'))
                                    <span class="help-block error">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" name="phoneNumber" class="form-control" placeholder="Số Điện Thoại" value="{{old('phoneNumber')}}"  required>
                                @if ($errors->has('phoneNumber'))
                                    <span class="help-block error">
                    <strong>{{ $errors->first('phoneNumber') }}</strong>
                </span>
                                @endif
                            </div>
                            <div class="row address_genral">
                                <div class="col-xs-12 col-sm-6 form-group">
                                    <select name="city" id="first"
                                            class="form-control" required></select>
                                </div>
                                @if ($errors->has('city'))
                                    <span class="help-block error">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
                                @endif

                                <div class="col-xs-12 col-sm-6 form-group">
                                    <select name="district" id="second" class="form-control" required></select>
                                </div>
                                @if ($errors->has('district'))
                                    <span class="help-block error">
                    <strong>{{ $errors->first('district') }}</strong>
                </span>
                                @endif

                                <div class="col-xs-12 col-sm-12 form-group">
                                    <textarea class="form-control" name="infoDetailAddress" placeholder="Số nhà, đường/phố, tòa nhà, xã/phường ,....... Vui lòng điền đầy đủ thông tin." aria-required="true" required>{{old('infoDetailAddress')}}</textarea>
                                    @if ($errors->has('infoDetailAddress'))
                                        <span class="help-block error">
                    <strong>{{ $errors->first('infoDetailAddress') }}</strong>
                </span>
                                    @endif
                                </div>
                                <div class="col-xs-12 col-sm-12 form-group">
                                    <textarea class="form-control" name="notes" placeholder="Ghi chú"
                                              aria-required="true" required>{{old('notes')}}</textarea>
                                    @if ($errors->has('notes'))
                                        <span class="help-block error">
                    <strong>{{ $errors->first('notes') }}</strong>
                </span>
                                    @endif
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
                                <label for="payment0"><input id="payment0" type="radio" name="optradio" value="0"
                                                             checked  required>Thanh
                                    Toán
                                    Tại Nhà
                                    (COD)
                                </label>
                                <span class="checkmark"></span>
                            </div>
                            <div class="input-radio form-group radio">
                                <label for="payment1"><input id="payment1" type="radio" name="optradio"
                                                             value="1" {{old('optradio')=="1" ? 'checked':''}}
                                                             required>Thanh
                                    Toán
                                    Tại Cửa
                                    Hàng</label>
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
                                <?php $totalPrice = 0; ?>
                                @if(session()->has('cart'))
                                    @foreach(session()->get('cart') as $product)
                                        <?php $totalPrice += $product->enum * $product->price ?>
                                        @for($i=0;$i<$product->enum;$i++)
                                            <input style="display: none" type="text" name="ids[]"
                                                   value="{{$product->id}}" />
                                        @endfor

                                        <div class="media">
                                            <div class="media-link pull-left">
                                                <img src="{{$product->avatar}}" alt="" class="img-responsive">
                                            </div>

                                            <div class="media-body">
                                                <p class="nameProduct"><a target="_blank"
                                                                          href="/san-pham/{{$product->url}}">{{$product->name}}</a></p>
                                                <p><span class="quanityProduct">{{$product->enum}}</span> x <span
                                                            class="priceProduct">{{preg_replace('/\B(?=(\d{3})+(?!\d)
                                                            )/', ',', (string)$product->price).' đ'}} =
                                                        {{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$product->enum*$product->price).' đ'}}</span></p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                                <p style="margin-top : 30px" class="pull-left"><strong style="font-size : 16px">Tổng Tiền :</strong> <span class="totalPrice">{{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$totalPrice).' đ'}}</span></p>

                                <div class="pull-right" style="margin-top : 30px">
                                    <button class="btn btn-default btn-submit pull-right" type="submit">Đặt Hàng</button>
                                    <a href="/" class="btn btn-danger pull-right">Mua Thêm Hàng</a>
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

