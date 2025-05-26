@extends("app")

@section('head_title', trans('words.all_properties').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!--Breadcrumb Section-->
 @include("_particles.slider")
      
  <!--Breadcrumb Section-->

  <section class="main-container container">
    <div class="content-box col-sm-8">
      <!-- Properties -->
      <section class="property-listing boxed-view clearfix" style="margin-top: 0px;padding: 0px;">
        <div class="inner-container clearfix">

          @foreach($properties as $i => $property)
          <div class="property-row-box">
            <div class="property-box wow fadeInUp">
              <div class="inner-box2">
                <div class="row">
                <div class="col-xs-5 col-sm-5">
                  <a href="{{ url('properties/'.$property->property_slug.'/'.$property->id) }}" class="img-container">
                    <img src="{{ URL::asset('upload/properties/'.$property->featured_image.'-s.jpg') }}" alt="Image of Property">
                   
                  </a>
                </div>
                
                <div class="col-xs-7 col-sm-7">  
                  <div class="bottom-sec column-view">
                    <a href="{{ url('properties/'.$property->property_slug.'/'.$property->id) }}" class="title"><h2>{{ Str::limit($property->property_name,35) }}</h2></a>
                    <h3 class="price size25">{{getcong('currency_sign').' '.$property->price}}</h3>
                    <div class="padding-bottom5 location-i"><i class="fa fa-map-marker"></i> {{ getPropertyLocationName($property->location)->name }}</div>
                    
                    <span class="padding-bottom5"> <strong>Property: </strong> {{ getPropertyTypeName($property->property_type)->types }}</span>
                    <div class="extra-info clearfix padding-bottom5">
                    <ul class="property-data list-inline"> 
                      <li class="bedroom ">
                        <i class="fa fa-bed"></i>
                        <div class="value">{{$property->bedrooms}}</div>
                        bed
                      </li>

                      <li class="bathroom ">
                        <i class="fa fa-bath"></i>
                        <div class="value">{{$property->bathrooms}}</div>
                        bath
                        </li>

                      <li class="area">
                        <i class="fa fa-columns" aria-hidden="true"></i>
                        <div class="value">{{$property->build_area}}</div>
                        sft
                        </li>
                    </ul>
                    </div>

                    <ul class="service-contacts list-inline clearfix">
                        <li><a class="call-now btn fly-btn1" href="tel:+8801917003909"><i class="fa fa-phone"> </i> CALL NOW</a> </li>
                        <li><a href="#" data-toggle="modal" data-target="#contactAgentModel{{$property->id}}" class="btn fly-btn2"><i class="fa fa-envelop"></i> EMAIL US</a></li>
                    </ul>

                  </div>
                </div> <!--col-xs-7-->
              </div> <!--row-->


              </div>
            </div>

            @include('_particles.enquiry_widget')
            
          </div>
 
          @endforeach

        </div>


        <!-- Pagination -->
        @include('_particles.pagination', ['paginator' => $properties]) 
        <!-- End of Pagination -->
      </section>
      <!-- End of Properties -->
    </div>
    <aside class="col-sm-4">
     @include("_particles.sidebar") 
    </aside>
  </section>

@endsection

