@extends('website.app')
@section('content')
@include('website.partials.page_banner')
<!--=== Content Part ===-->
<section id="news_section" class="section" data-role="home-news">
    <div class="container content pv25 mt10">
        <div class="row" id="widgets_news_homes">
            @include('website.botanies.botanies_sidebar')
            <div class="col-md-9">
                <div class="row">
                    @foreach (  $botanies as  $index => $post )
                        <div class="col-md-6 mb25">
                            <div >
                                <div class="mediaholder">
                                    <a href="botanies/{{ $post->id }}">
                                        <img src="{!! ImgHelper::get($post->img1, config('maguttiCms.image.defaults')) !!}" alt="{{ $post->name }} {{ $post->img_title1 }}" border="0" class="img-responsive-100">
                                    </a>
                                </div>
                                <div class="mv5">
                                    <span class="color-4">{{ $post->date }}</span>
                                </div>
                                <div class="media-body">
                                    <h4 class="mv5 color-main"> {{ $post->name }}</h4>
                                    {!! str_limit( $post->alias, 450 )  !!}
                                </div>
                                <a href="botanies/{{ $post->id }}" class="read-more mb5">{!! trans('website.read_more') !!}</a>
                            </div>
                        </div><!--/botanies -->
                    @endforeach

                </div>
            </div> <!-- / botaniescontainer -->
        </div>
    </div> <!-- /container -->
</section>
@endsection