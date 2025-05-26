
<section id="main-slider">

@foreach(\App\Slider::orderBy('id', 'desc')->get() as $slide)
    <div class="items">
        <img src="{{ URL::asset('upload/slides/'.$slide->image_name.'.jpg') }}" alt="Slide Image">
        
    </div>
@endforeach
        
</section>

