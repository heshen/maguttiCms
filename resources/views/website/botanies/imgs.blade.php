@foreach(range(1,6) as $i)
    @php($title_v = 'img_title' . $i)
    @php($img_v = 'img' . $i)
    @if(!empty($botanies->$img_v))
<div class="col-sm-12 mb25">
    <h5 class="color-4 wow bounceInRight smally">{{ $botanies->$title_v }}</h5>

    <img src="{!!  ma_get_image_from_repository($botanies->$img_v) !!}"
         alt="{{ $botanies->name }},{{ $botanies->$title_v }}" border="0" class="img-responsive-100">
</div>
    @endif
@endforeach