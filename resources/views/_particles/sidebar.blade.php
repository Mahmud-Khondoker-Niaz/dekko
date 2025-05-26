
 @include("_particles.ads_widget")  



<div class="sidebar-box" style="margin-top:19px; ">
  <h3>{{trans('words.featured_properties')}}</h3>
  <div class="box-content">
    <div class="featured-properties">
      <div class="property-box">
        
        @foreach(\App\Properties::where('featured_property',1)->orderBy('id','desc')->take(3)->get() as $property)
        <a href="{{ url('properties/'.$property->property_slug.'/'.$property->id) }}" class="clearfix">
          <span class="img-container col-xs-4">
            <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt="Image of Property">
          </span>
          <span class="details col-xs-8">
            <span class="title">{{ Str::limit($property->property_name,20) }}</span>
            <span class="location">{{ Str::limit($property->address,30) }}</span>
            <span class="price">{{getcong('currency_sign').' '.$property->price}}</span>
          </span>
        </a>
        @endforeach
     
      </div>
    </div>
  </div>
</div>

<!--End of Sidebar Box-->