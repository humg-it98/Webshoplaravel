@section('banner')
<div class="main-banner owl-carousel">
    @foreach($all_slider as $key => $slider)
    <div class="item"><a href="#"><img src={{URL::to('public/uploads/product/'.$slider->slider_image)}} alt="{{$slider->name}}" class="img-responsive" /></a></div>
    @endforeach
</div>

@endsection
