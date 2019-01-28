
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
                    <img src="/uploadMedia/images/Banner-01.png" alt="banner1" class="img-responsive">
                </div>
            
                <div class="item">
                    <img src="/uploadMedia/images/Banner-02.png" alt="Chicago" class="img-responsive">
                </div>
            
                {{-- <div class="item">
                    <img src="/uploadMedia/images/banner1.png" alt="Chicago" class="img-responsive">
                </div> --}}
            </div>
            

        </div>
    </section>

    <!--end section slider banner-->

    <section class="ourCompany">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="javascript:void(0)">
                        Giới thiệu chung về công ty
                    </a>
                </h2>
            </div>

            <div class="row ourCompanyContent">
                <div class="col-xs-12 col-sm-6">
                    <img src="http://tppvn.com.vn/wp-content/uploads/2017/08/qua-oc-cho-chuan-bi-thu-hoach-1024x683.jpg" alt="hinh anh cong ty" class="img-responsive">
                </div>

                <div class="col-xs-12 col-sm-6 ourCompanyContent__textIntro">
                        Công ty Trách Nhiệm Hữu Hạn Một Thành Viên Đạt Thủy thành lập từ năm 2008, với trên 10 năm kinh nghiệm trong ngành nông sản, đặc biệt là các sản phẩm khô cụ thể là ngô, khoai, sắn tại vùng Tây Bắc ( Sơn La, Điện Biên, Lai Châu, Hòa Bình ). Từ năm 2014, chúng tôi nhận thấy sự quan trọng và cần thiết đối với sức khỏe con người từ các loại hạt khô như Macca, Óc Chó, Điều, Hạnh Nhân... Những năm qua chúng tôi đã không ngừng nghiên cứu và liên tục bổ sung kiến thức từ các nhà thị trường trong và ngoài nước để hình thành những sản phẩm sản xuất bằng dây chuyền trong nhà kính đạt chất lượng cao nhất và an toàn vệ sinh tuyệt đối 100%. Chúng tôi với đội ngũ cán bộ công nhân viên công ty giàu nhiệt huyết và sự cần mẫn tỉ mỉ trong từng khâu sản xuất xin hứa trong tương lai không xa sẽ đem tới thị trường nội địa, và xuất khẩu những sản phẩm về hạt khô phong phú để luôn làm hài lòng quý khách!
                </div>
            </div>
        </div>
    </section>
    <!--end section our Company-->

    <section class="product">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="javascript:void(0)">
                        Sản Phẩm
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
                                    <span class="priceNotSale">{{ number_format($dataProduct->old_price)  }} Đ</span> <span class="priceSale">{{  number_format($dataProduct->price)}} Đ</span>
                                </p>

                                <button data-id="{{$dataProduct->id}}" class="btn btn-default btn-add-cart">add to cart</button>
                            </div>
                        </div>
                    </div>
                @endforeach
                
    
            </div>
            @endforeach
        </div>
    </section>

    <!--end section product-->

    {{-- <section class="partner">
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
    </section> --}}
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