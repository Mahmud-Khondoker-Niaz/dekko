@extends("app")

@section('head_title', trans('Products').' | '.getcong('site_name') )
@section('head_url', Request::url())
@section("content")
<style>
    .small-images {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 10px;
        margin-top: 20px;
        
    }

    .small-box {
        position: relative;
        width: 100%;
        padding-top: 66.67%; /* 2:3 aspect ratio for landscape images */
        border-radius: 10px;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
       
    }

    .small-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
        
    }

    .small-box:hover .small-image {
        transform: scale(1.05);
    }
</style>
<div class="inner-container container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="top-section clearfix">
        <div class="col-xs-12 col-md-6 col-sm-12">
            <div class="main-image">
                <img id="mainImage" src="{{ URL::asset($brand->feature)}}" alt="{{ $brand->name }}" style="max-width: 100%; height: auto; border-radius: 15px;">
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-sm-12">
        <section class="about-section">
  <div class="container">
    <h2 class="about-heading">{{ $brand->name }}</h2>
  </div>
</section>            <p class="details">{!! $brand->description !!}</p>
            <div class="small-images">
        <div class="small-box" onclick="showImage('{{ URL::asset($brand->feature)}}')">
            <img src="{{ URL::asset($brand->feature)}}" alt="{{ $brand->name }}" class="small-image">
        </div>
        <div class="small-box" onclick="showImage('{{ URL::asset($brand->image)}}')">
            <img src="{{ URL::asset($brand->image)}}" alt="{{ $brand->name }}" class="small-image">
        </div>
    </div>
        </div>
    </div>
  
</div>




<!--#propmotions-slider-->
@if($brand->skus->count()>0)

<!--#propmotions-slider-->
<section id="promotions-slider" class="boxed-view clearfix">
  <div class="inner-container container">
    <div class="owl-carousel-ads-slider owl-theme">
      @foreach ($brand->skus as $result)
        <div class="items">
          <a href="javascript:void(0);" onclick="showPopup('{{ URL::asset($result->image) }}', '{{ $result->description }}')">
            <img class="lazyOwl" data-src="{{ URL::asset($result->image) }}" alt="" />
          </a>
        </div>
      @endforeach
    </div>





                              <div class="inner-container container" style="margin-top: 50px;
                              margin-bottom: 50px;"> 

                              <div class="top-section clearfix">
                              <div id="popup" class="popup"> 
                              <span class="close" onclick="hidePopup()">&times;</span>

                              <div class="col-xs-12 col-md-6 col-sm-12">
                                <p class="details" id="popup-description" style="max-width: 75rem;
                                                              margin: 0 auto clamp(30px,calc(30px + ((1vw - 3.75px) * 1.2944983819)),50px);
                                                              font-size: clamp(16px,calc(16px + ((1vw - 3.75px) * .5177993528)),24px);
                                                              color: #2b2b2b; text-align: justify; opacity: 10; font-variant: small-caps;">

                                                          
                                                            </div>
                              <div class="col-xs-12 col-md-6 col-sm-12"> <img id="popup-image" src="" alt="" style="max-width: 100%; height: auto;" /> </div>

                            </div>


                            </div>

                            </div>
  


                                    <div class="heading">
                                            <h4 class="heading-title">Related Products </h4>
                                        </div>
                                    <section id="propmotions-slider" class="boxed-view clearfix" style="background:#fafafa;  position: relative;">

                        <div class="inner-container container">
                            <div class="owl-carousel-ads-slider owl-theme">

                                      @foreach($related as $row)
                                            
                                                <div class="items">
                                                <a href="{{route('brand.single',['id' => $row->id])}}">        
                                                  <img src="{{asset($row->image)}}" class="blogimage" alt="{{$row->name}}">
                                                  <div class="card-body">
                                                    <h4 class="card-title" style="color: #000;font-weight: bold;">{{$row->name}}</h4>
                                                  </div>
                                                  </a>
                                                </div>
                                            
                                            @endforeach
                        </div>
                        </div>

                        </section>


</div>
</section>


@else

                                
     
                              <section id="propmotions-slider" class="boxed-view clearfix" style="background:#fafafa;  position: relative;">
                              
                    
                  <div class="inner-container container">
                  <h4 class="heading-title">Related Products </h4>

                      <div class="owl-carousel-ads-slider owl-theme">

                                @foreach($related as $row)
                                      
                                          <div class="items">

                                          <a href="{{route('brand.single',['id' => $row->id])}}">        
                                            <img src="{{asset($row->image)}}" class="card-img-top img-thumbnail" alt="{{$row->name}}">
                                            <div class="card-body">
                                              <h4 class="card-title" style="color: #000;font-weight: bold;">{{$row->name}}</h4>
                                            </div>
                                            </a>
                                          </div>
                                      
                                      @endforeach
                  </div>
                  </div>
                    

                  </section>
             
@endif
   
 
  
 
 
@endsection

<script>
  function showPopup(imageSrc, description) {
    var popup = document.getElementById("popup");
    var popupImage = document.getElementById("popup-image");
    var popupDescription = document.getElementById("popup-description");

    popupImage.src = imageSrc;
    // popupDescription.textContent = description;
    popupDescription.innerHTML = description;
    popup.style.display = "block";
  }

  function hidePopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
  }
  document.getElementById("popup").style.display = "none";
</script>
<script>
    function showImage(imageUrl) {
        var mainImage = document.getElementById("mainImage");
        mainImage.src = imageUrl;
    }
</script>