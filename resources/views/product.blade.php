@extends ('layouts.app')


@section('title')
    cac san pham qua kho, qua oc cho, ...
@endsection

@section('content')
<section class="product">
    <div class="container">
        <div class="blockTitle">
            <h2>
                <a href="javascript:void(0)">
                    Sản phẩm
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
@endsection