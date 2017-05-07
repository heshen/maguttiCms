<!--=== news side bar ===-->
@inject('posts','App\Botany')
<div class="col-md-3 mb25-max-sm">
    <h3 class="color-4  mb15">Latest news</h3>
    <div class="text-left wow flipInY animated  animated">
        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( 'botanies' )) }}"><h2 class="color-main mb25 txt-upper text-extra-spaced-mid">{{ $article->subtitle }}</h2></a>
    </div>
    @foreach (  $posts->Latest()->get() as  $index => $posta )

        <a href="{{ LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(),URL::to( $article->slug.'/'.$posta->id )) }}">
        <div class="media mb15 pb15 border-bottom-color-5">
            <div class="media-left">

                    <img class="media-object"  src="{!! ImgHelper::get($posta->img1, config('magutti.image.small')) !!}" border="0" width="64" heigth="64">

            </div>
            <div class="media-body">
                <h6 class="media-heading color-2 smallTitle">{{ $posta->created_at }}</h6>
                <h4 class="media-heading color-4 small">{{ $posta->name }}</h4>
            </div>
        </div>
        </a>
    @endforeach
</div> <!-- /end news sidebar -->