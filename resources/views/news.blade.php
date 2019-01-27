@extends ('layouts.app')

@section('title')
    Tin tuc, thong tin ve cac loai qua dinh duong hien nay
@endsection

@section('content')
    <section class="news">
        <div class="container">
            <div class="bncTitle">
                <hgroup class="v2_bnc_title_main">
                    <span class="v2_bnc_title_icon"><i class="fa fa-file"></i></span><h2>Tin tức</h2>
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