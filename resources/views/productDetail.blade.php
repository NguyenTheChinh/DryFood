@extends ('layouts.app')


@section('title')
    cac san pham qua kho, qua oc cho, ...
@endsection

@section('content')
    <section class="infoProduct">
        <div class="container">
            <h1 class="nameProduct">hạt macca</h1>
            <ul class="breadcrumb">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="/">Trang chủ</a></li>
                <li><a href="/san-pham">Sản Phẩm</a></li>
                <li><a href="/san-pham/{{ $product->url }}">{{ $product->url }}</a></li>
            </ul>


            <div class="detailProductContent row">
                <div class="col-xs-12 col-sm-5">
                    <div class="fotorama detailProductContent__img" data-nav="thumbs">
                        @foreach ($arrImg as $imgPath)
                            <img src="{{ $imgPath }}" alt="" class="img-responsive">
                        @endforeach


                        {{-- <img src="{{ $product->image }}[0]" class="img-responsive">
                        <img src="{{ $product->image }}" class="img-responsive">
                        <img src="{{ $product->image }}" class="img-responsive"> --}}
                        {{-- <img src="/upl" class="img-responsive"> --}}

                    </div>
                </div>

                <div class="col-xs-12 col-sm-7">
                    <div class="detailProductContent__boxname">
                        <h2>{{ $product->name }}</h2>
                    </div>

                    <div class="detailProductContent__boxinfo">
                        <hr>
                        <p class="key">Mã sản phẩm: {{ $product->code }}</p>
                        <hr>
                        <p class="priceNotSale">Gía cũ : <span>{{ number_format($product->old_price) }} Đ</span></p>
                        <hr>
                        <p class="priceSale key">Giá bán : <span>{{ number_format($product->price) }} Đ</span></p>

                        <div class="detailProductDecreption">
                            {{-- {{ html_entity_decode($product->subtitle) }} --}}
                            <?php echo "$product->subtitle"?>
                        </div>
                        <hr>
                        <p class="quanity">số lượng : <select name="ProductQuantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option><option value="91">91</option><option value="92">92</option><option value="93">93</option><option value="94">94</option><option value="95">95</option><option value="96">96</option><option value="97">97</option><option value="98">98</option><option value="99">99</option><option value="100">100</option></select></p>


                        <button data-id="{{$product->id}}" class="btn btn-default btn-add-cart">Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="describe">
        <div class="container">
            <div class="bncTitle">
                <hgroup class="v2_bnc_title_main">
                    <span class="v2_bnc_title_icon"><i class="fa fa-file"></i></span><h2>Mô Tả</h2>
                </hgroup>
            </div>

            <div class="describeContent ck-content">
                <?php echo "$product->description"?>

                <script>
                    /*js them bang vao mo ta*/
                    $(".describeContent table").wrap("<div class='table-responsive'></div>");
                    $(".describeContent table").addClass("table");
                </script>
            </div>
        </div>
    </section>

    <!--end section describe-->


    <section class="otherProduct">
        <div class="container">
            <div class="bncTitle">
                <hgroup class="v2_bnc_title_main">
                    <span class="v2_bnc_title_icon"><i class="fa fa-file"></i></span><h2>Các sản phầm liên quan</h2>
                </hgroup>
            </div>

            @foreach(array_chunk($selectProduct, 4) as $dataProductChunk)
                <div class="row productContent">
                    @foreach ($dataProductChunk as $dataProduct)
                        <div class="col-xs-12 col-sm-3">
                            <div class="thumbnail clearfix">
                                <div class="media-link">
                                    <a href="/san-pham/{{$dataProduct->url}}">
                                        <img src="{{$dataProduct->avatar}}" alt=""
                                             class="img-responsive">
                                    </a>
                                </div>

                                <div class="infoProduct text-center">
                                    <h3 class="infoProduct__name">
                                        <a href="/san-pham/{{$dataProduct->url}}"
                                           title="san pham macca">{{$dataProduct->name}}</a>
                                    </h3>
                                    <p class="infoProduct__price">
                                        <span class="priceNotSale">{{  number_format($dataProduct->old_price) }} Đ</span> <span
                                                class="priceSale">{{  number_format($dataProduct->price) }} Đ</span>
                                    </p>
                                    <button class="btn btn-default btn-add-cart"
                                            data-id="{{$dataProduct->id}}">add to cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            @endforeach


        </div>
    </section>

    <!--end section other product-->

    <section class="commentFacebook">
        <div class="container">
            <div class="bncTitle">
                <hgroup class="v2_bnc_title_main">
                    <span class="v2_bnc_title_icon"><i class="fa fa-file"></i></span><h2>Bình luận của khách hàng</h2>
                </hgroup>
            </div>

            <div class="commentBox">
                <div class="fb-comments" data-href="http://healthynuts.com.vn/" data-width="100%" data-numposts="10" style="width : 100%"></div>
            </div>

            <script>
                $(".fb-comments iframe").css("width","100%");
            </script>
        </div>
    </section>
@endsection