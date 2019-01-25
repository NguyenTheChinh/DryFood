
@extends('layouts.app')

@section('title')
    Hat macca, hat oc cho, thuc pham kho, qua lanh manh cho suc khoe
@endsection

@section('content')
<section class="sliderBanner">
        <div id="maccaCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
            <!-- Indicators -->
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="/uploadMedia/images/banner1.png" alt="banner1" class="img-responsive">
                </div>
            
                <div class="item">
                    <img src="/uploadMedia/images/banner1.png" alt="Chicago" class="img-responsive">
                </div>
            
                <div class="item">
                    <img src="/uploadMedia/images/banner1.png" alt="Chicago" class="img-responsive">
                </div>
            </div>
            

        </div>
    </section>

    <!--end section slider banner-->

    <section class="ourCompany">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="">
                        Gioi thieu chung ve cong ty
                    </a>
                </h2>
            </div>

            <div class="row ourCompanyContent">
                <div class="col-xs-12 col-sm-6">
                    <img src="http://tppvn.com.vn/wp-content/uploads/2017/08/qua-oc-cho-chuan-bi-thu-hoach-1024x683.jpg" alt="hinh anh cong ty" class="img-responsive">
                </div>

                <div class="col-xs-12 col-sm-6 ourCompanyContent__textIntro">
                    Công ty Toan Maca ra đời với mong muốn luôn đồng hành cùng người nông dân trồng Mắc ca Việt Nam để cùng đem lại những sản phẩm thơm ngon, bổ dưỡng, chất lượng nhất từ những hạt Macca của vùng cao nguyên Việt Nam đến với khách hàng.
                    Cung cấp những sản phẩm khô tốt nhất trên thị trường, với mong muốn mang lại những thực phẩm dinh dưỡng, có ích cho cộng đồng, xã hội,.....
                    Chúng tôi có bề dày lịch sử 30 năm trong thị trường phân phối quả khô..... <a href="">Xem thêm</a>
                </div>
            </div>
        </div>
    </section>
    <!--end section our Company-->

    <section class="product">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="">
                        San pham cua Toan macca
                    </a>
                </h2>
            </div>
            @foreach(array_chunk($selectProduct, 4) as $dataProductChunk)
            <div class="row productContent">
                @foreach ($dataProductChunk as $dataProduct)
                <div class="col-xs-12 col-sm-3">
                        <div class="thumbnail clearfix">
                            <div class="media-link">
                                <a href="/san-pham/{{$dataProduct->url}}">
                                    <img src="{{$dataProduct->avatar}}" alt="" class="img-responsive">
                                </a>
                            </div>
    
                            <div class="infoProduct text-center">
                                <h3 class="infoProduct__name">
                                    <a href="/san-pham/{{$dataProduct->url}}" title="san pham macca">{{$dataProduct->name}}</a>
                                </h3>
                                <p class="infoProduct__price">
                                    <span class="priceNotSale">{{$dataProduct->old_price}}</span> <span class="priceSale">{{$dataProduct->price}}</span>
                                </p>
    
                                <form action="/" method="POST">
                                    <input type="hidden" name="product_id" value="{{ $dataProduct->id }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="suubmit" class="btn btn-default btn-add-cart">add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                
    
            </div>
            @endforeach
        </div>
    </section>

    <!--end section product-->

    <section class="partner">
        <div class="container">
            <div class="blockTitle">
                <h2><a href="">Doi Tac va cac chung chi</a></h2>
            </div>

            <div class="row partnerContent owl-carousel">
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner1.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner1.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner1.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>
                <div class="partnerContent__item">
                    <img src="/uploadMedia/images/partner.png" alt="" class="img-responsive">
                </div>

            </div>
        </div>
    </section>
    <!--end section partner-->
    <section class="news">
        <div class="container">
            <div class="bncTitle">
                <hgroup class="v2_bnc_title_main">
                    <span class="v2_bnc_title_icon"><i class="fa fa-file"></i></span><h2>Tin tuc</h2>
                </hgroup>
            </div>

            @foreach (array_chunk($news, 3) as $newsChunk)
                <div class="newsContent row">
                    @foreach ($newsChunk as $newsData)
                        <div class="col-xs-12 col-sm-4">
                            <div class="thumbnail clearfix text-center">
                                <div class="media-link">
                                    <a href="/tin-tuc/{{ $newsData->url }}">
                                        <img src="{{ $newsData->image }}" alt="" class="img-responsive">
                                    </a>
                                </div>
        
                                <div class="newsInfo">
                                    <h3 class="newsInfo__name"><a title="{{ $newsData->title }}" href="/tin-tuc/{{ $newsData->url }}">{{ $newsData->title }}</a></h3>
                                    <div class="newsInfo__content">
                                        <?php echo "$newsData->subtitle" ?>
                                    </div>
                                    <a href="/tin-tuc/{{ $newsData->url }}" class="btn btn-default btn-read-more">Đọc thêm</a>
                                </div>
                            </div>
                        </div>    
                    @endforeach
                    
                </div>    
            @endforeach
        </div>
    </section>
    <!--end section news-->
@endsection