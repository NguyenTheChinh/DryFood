<header>
    <div class="container">
        <div class="logo pull-left">
            <a href="index.html">
                <img src="uploadMedia/images/logo.png" class="img-responsive" width="360px" height="125px" alt="cong ty">
            </a>
        </div>

        <div class="cart-and-hotline pull-right">
            <div class="shoppingCart">
                <a href="javascript:void(0)">
                    <span class="nameCart">Gio Hang</span> <span class="toolbar-count">
                        @if(session()->has('cart'))
                            {{count(session()->get('cart'))}}
                        @else
                            0
                        @endif
                    </span>
                </a>

            </div>

            <div class="shoppingCartIconMobile">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="toolbar-count">0</span> 
            </div>

            <div class="hotline">
                <span>Hotline</span> <a href="tel:" class="hotlinePhone">09984747474</a>
            </div>
        </div>

        <div class="shoppingCartContent">
            <div class="myCart text-center">
                Giỏ hàng của tôi
            </div>

            <?php $totalPrice = 0; ?>
            @if(session()->has('cart'))
                @foreach(session()->get('cart') as $product)
                    <?php $totalPrice += $product->enum * $product->price ?>
                    <div class="media clearfix">
                        <div class="media-link pull-left">
                            <img src="{{$product->avatar}}" alt="" class="img-responsive">
                        </div>
                        <div class="media-body">
                            <p class="nameProductCart"><a href="/san-pham/{{$product->url}}"
                                                          target="_blank">{{$product->name}}</a></p>
                            <div class="infoProductCart">
                                <p class="pull-left">SL: <span class="quanityProductCart">{{$product->enum}}</span>x
                                    <span class="priceProductCart">{{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$product->price).' đ'}}</span>
                                </p>
                                <p class="pull-right deleteProductCart"><a class="delete-product-cart"
                                                                           data-id="{{$product->id}}" title="delete
                                                                           item"><i
                                                class="fa fa-trash-o"></i></a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <p style="color : #919191; font-weight: 600;padding : 15px 0px;">Tong tien :<span
                        class="pull-right totalPrice"
                        style="color : #203872">{{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$totalPrice).' đ'}}</span>
            </p>

            <a href="/xac-nhan-don-hang" class="btn btn-default btn-buy-items pull-right">tien hanh dat hang</a>
        </div>
    </div>
</header>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/">Trang Chu</a></li>
                <li><a href="/gioi-thieu-cong-ty">Gioi Thieu</a></li>
                <li><a href="/san-pham">San Pham</a></li>
                <li><a href="/tin-tuc">Tin Tuc </a></li>
                <li><a href="/y-kien-khach-hang">Y Kien Khach Hang</a></li>
                <li><a href="javascript:void(0)">Phan Phoi</a></li>
                <li><a href="/lien-he">Lien He</a></li>
            </ul>
            <!-- <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul> -->
        </div>
    </div>
</nav>

<!--end navbar-->