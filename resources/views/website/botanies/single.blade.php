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



                    <div class="col-sm-12">
                        <h5 class="color-4 wow bounceInRight smally"><i class="fa fa-calendar"></i> {{ $botanies->created_at }}</h5>
                        <h1 class=" mt5 mv15 text-uppercase color-2 wow bounceInLeft">{{ $botanies->name }}</h1>
                        <table>
                            <tbody>
                            <tr>
                                <td>中文名称：</td>
                                <td>{{$botanies->name }}</td>
                            </tr>
                            <tr>
                                <td>别名:</td>
                                <td>{{$botanies->alias }}</td>
                            </tr>
                            <tr>
                                <td>英文名称:</td>
                                <td>{{$botanies->english_name }}</td>
                            </tr>
                            <tr>
                                <td>拉丁文名称:</td>
                                <td>{{$botanies->latin_name }}</td>
                            </tr>
                            <tr>
                                <td>分类:</td>
                                <td><a href="{{$botanies->taxon }}">{{$taxonomy -> name}}</a></td>
                            </tr>
                            <tr>
                                <td>科:</td>
                                <td>{{$botanies->family }}</td>
                            </tr>
                            <tr>
                                <td>科(拉丁):</td>
                                <td>{{$botanies->latin_family }}</td>
                            </tr>
                            <tr>
                                <td>属:</td>
                                <td>{{$botanies->genus }}</td>
                            </tr>
                            <tr>
                                <td>属(拉丁):</td>
                                <td>{{$botanies->latin_genus }}</td>
                            </tr>
                            <tr>
                                <td>特征:</td>
                                <td>{{$botanies->trait }}</td>
                            </tr>
                            <tr>
                                <td>分布:</td>
                                <td>{{$botanies->distribution }}</td>
                            </tr>
                            <tr>
                                <td>生境:</td>
                                <td>{{$botanies->growth_env }}</td>
                            </tr>
                            <tr>
                                <td>用途:</td>
                                <td>{{$botanies->purpose }}</td>
                            </tr>
                            <tr>
                                <td>药用价值:</td>
                                <td>{{$botanies->medical }}</td>
                            </tr>
                            </tbody>

                        </table>

                        @include('website.botanies.botanies_share')




                        @foreach (  $botanies->media->where('collection_name','images','=')->all() as $media)

                            <div class="media mb15 pb15 border-bottom-color-5">

                                <div class="media-left">
                                    <img class="media-object" alt="{{ $media->title }}" src="{!! ma_get_image_on_the_fly_cached($media->file_name,200,150,'jpg') !!}" border="0" width="200" heigth="150">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading color-4 small">{{ $media->title }}</h4>
                                </div>
                            </div>

                        @endforeach
                    </div>
                    @include('website.botanies.imgs')

                </div>
            </div> <!-- / newscontainer -->
        </div>
    </div> <!-- /container -->
</section>
@endsection