@extends ('layouts.app')


@section('title')
    cac san pham qua kho, qua oc cho, ...
@endsection

@section('content')
<section class="product">
        <div class="container">
            <div class="blockTitle">
                <h2>
                    <a href="">
                        San pham cua Toan macca
                    </a>
                </h2>
            </div>
            @foreach($selectProduct as $dataProduct)
            <div class="row productContent">
                <div class="col-xs-12 col-sm-3">
                    <div class="thumbnail clearfix">
                        <div class="media-link">
                            <a href="">
                                <img src="/uploadMedia/img/{{$dataProduct->image}}" alt="" class="img-responsive">
                            </a>
                        </div>

                        <div class="infoProduct text-center">
                            <h3 class="infoProduct__name">
                                <a href="" title="san pham macca">{{$dataProduct->name}}</a>
                            </h3>
                            <p class="infoProduct__price">
                                <span class="priceNotSale">{{$dataProduct->old_price}}</span> <span class="priceSale">{{$dataProduct->price}}</span>
                            </p>

                            <a href="" class="btn btn-default btn-add-cart">add to cart</a>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </section>

    <!--end section product-->
@endsection