@extends("app")

@section('head_title', stripslashes($property->property_name) .' | '.getcong('site_name') )
@section('head_description', substr(strip_tags($property->description),0,200))
@section('head_image', asset('/upload/properties/'.$property->featured_image.'-b.jpg'))
@section('head_url', Request::url())

@section("content")

@if(Session::has('flash_message_agent'))
<script type="text/javascript">
   
  alert('{{ Session::get('flash_message_agent') }}');

</script>
@endif
<section id="property-slider-section" @if(count($property_gallery_images)==0) style="margin-bottom: 0px;" @endif>
    
    <!-- Main Slider -->
    <div id="property-main-slider">
      <div class="items">
        <div class="img-container" data-bg-img="{{ URL::asset('upload/properties/'.$property->featured_image.'-b.jpg') }}"></div><!-- Change the URL section based on your image\'s name -->
      </div>

      @foreach($property_gallery_images as $key=>$gallery_img)
      <div class="items">
        <div class="img-container" data-bg-img="{{ URL::asset('upload/gallery/'.$gallery_img->image_name) }}"></div> 
      </div>
      @endforeach
   
    </div>
    <!-- End of Main Slider -->
    @if(count($property_gallery_images)>0)
    <div id="property-thumb-slider" class="container">
      <div class="items">
        <div class="img-container" data-bg-img="{{ URL::asset('upload/properties/'.$property->featured_image.'-b.jpg') }}"></div>
      </div>
      @foreach($property_gallery_images as $key=>$gallery_img)
      <div class="items">
        <div class="img-container" data-bg-img="{{ URL::asset('upload/gallery/'.$gallery_img->image_name) }}"></div> 
      </div>
      @endforeach
    
    </div>
    @endif
  </section>

  <section class="main-container container">
      <div class="property-summery">

         <div class="pro-headings">
          <h2> {{$property->property_name}}</h2>
          <div class="share-save">
              <a href="#" class="btn btn-default btn-lg" role="button" aria-disabled="true"><i class="fa fa-heart-o" aria-hidden="true"></i> Save</a>
              <a href="https://www.facebook.com/sharer/sharer.php?u={{ url('properties/'.$property->property_slug.'/'.$property->id) }}" class="btn btn-default btn-lg" role="button" aria-disabled="true"><i class="fa fa-share" aria-hidden="true"></i> Share</a>
          </div> 
        </div>   

        <div class="short-info">  
            <div class="bottom-sec ">
              <div class="property-price"><small>BDT</small> {{$property->price}}</div>
              <div class="property-address"> {{ $property->address }}</div>
              <div class="property-address">Type: {{ getPropertyTypeName($property->property_type)->types }}</div>

              <div class="extra-info clearfix padding-bottom5">
                <ul class="property-data list-inline short-date"> 
                  <li class="bedroom ">
                    
                    <div class="value"><i class="fa fa-bed"></i> {{$property->bedrooms}}  bed</div>
                   
                  </li>

                  <li class="bathroom ">
                    
                    <div class="value"> <i class="fa fa-bath"></i> {{$property->bathrooms}}  bath</div>
                   
                  </li>

                  <li class="area">
                    
                    <div class="value"><i class="fa fa-columns" aria-hidden="true"></i> {{$property->build_area}} sft</div>
                    
                    </li>
               </ul>
              </div>

              <div class="short-note">
                  <div class="row">
                    <div class="col-md-8">
                      <ul class="short-note-list list-inline">
                          <li class="overview active"><a href="#OverviewBox"><i class="fa fa-braille" aria-hidden="true"></i> Overview</a></li>
                          <li class="amenities"><a href="#AmenitiesBox"><i class="fa fa-eye" aria-hidden="true"></i> Amenities</a></li>
                          <li class="nearestplace"><a href="#NearestPlacesBox"><i class="fa fa-map-marker" aria-hidden="true"></i> Nearest Places</a></li>
                          <li class="nearestplace"><a href="#ContactBox"><i class="fa fa-envelope" aria-hidden="true"></i> Contact</a></li>
                          <li class="loancal"><a href="#LoanBox"><i class="fa fa-calculator" aria-hidden="true"></i> Loan Calculation</a></li>
                      </ul> 
                    </div>
                    <div class="col-md-4">
                      <div class="share-box pull-right"> {!! stripslashes(getcong('addthis_share_code')) !!}</div>
                    </div>
      
                  </div>  
              </div>  

            </div>
          </div> <!--short-info-->
          
          <div class="quick-peekk">
              <h3> Quick Peek</h3>
              <div class="row">
                  
                  <div class="col-md-6">
                     <div class="table-responsive">
                          <table class="table">
                            
                            <tbody>
                              <tr>
                                <td>Type:</td>
                                <td><b>{{ getPropertyTypeName($property->property_type)->types }} <b></td>
                              </tr>
                              <tr>
                                <td>Price: </td>
                                <td><b>{{$property->price}}</b></td>
                              </tr>
                              
                              <tr>
                                <td>Bedroom:</td>
                                <td><b>{{$property->bedrooms}}</b></td>
                              </tr>
                              
                              <tr>
                                <td>Bath:</td>
                                <td><b>{{$property->bathrooms}} </b></td>
                              </tr>
                              
                              <tr>
                                <td>Balcony:</td>
                                <td><b>{{$property->balcony}}</b></td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div><!--table-responsive-->
                  </div>
                  
                  <div class="col-md-6">
                     <div class="table-responsive">
                          <table class="table">
                            
                            <tbody>
                              <tr>
                                <td>Size:</td>
                                <td><b>{{$property->build_area }} {{trans('words.build_unit')}}</b></td>
                              </tr>
                              <tr>
                                <td>Location: </td>
                                <td><b>{{$property->location}}</b></td>
                              </tr>
                              
                              <tr>
                                <td>Facing:</td>
                                <td><b>{{$property->facing}}</b></td>
                              </tr>
                              
                              <tr>
                                <td>Floor:</td>
                                <td><b>{{$property->available_floor}}</b></td>
                              </tr>
                              
                              <tr>
                                <td>Parking:</td>
                                <td><b>{{$property->garage}}</b></td>
                              </tr>
                              
                            </tbody>
                          </table>
                      </div><!--table-responsive-->
                  </div>
                  
                  
              </div> <!--row--> 
          </div><!--quick-peek-->

      </div><!--property-summery-->

    <div class="content-box col-sm-8">
      <div class="t-sec clearfix">
        <div class="col-md-4 left-sec">
          @if(Auth::check() && Auth::user()->usertype =='Agents')
          <div class="property-interest">  
        
            <form action="{{route('agentinterest')}}" method="post" enctype="multipart/form-data">
              {{csrf_field()}}
              
              <input type="hidden" name="property_id" value="{{$property->id}}">
              <input type="hidden" name="property_name" value="{{$property->property_name}}">
                        
              <button type="submit" class="btn btn-lg interest" name="submit"><i class="fa fa-heart-o"></i> Interest For Sale</button>    

            </form>

              @if(Session::has('success'))
              <p style="color:green">{{ Session::get('success') }}</p>  
              @endif
              
              @if(Session::has('error'))
              <p style="color:red">{{ Session::get('error') }}</p>  
              @endif
              
              @if(Session::has('warning'))
              <p style="color:yellow">{{ Session::get('warning') }}</p>  
              @endif
              <br>
        
          </div>
          @endif

          <!--Highlight Section-->
          <div class="highlight-container">
            @if($property->land_area!=null)
            <div class="highlight-details-box">
              <div class="value">{{$property->land_area}}</div>
              <div class="text">{{trans('words.land_area')}}</div>
              <div class="unit">{{trans('words.land_unit')}}</div>
            </div>
           @endif

            <!--@if($property->build_area!=null)
            <div class="highlight-details-box">
              <div class="value">{{$property->build_area}}</div>
              <div class="text">{{trans('words.build_area')}}</div>
              <div class="unit">{{trans('words.build_unit')}}</div>
            </div>
           @endif

          @if($property->bedrooms!=null)
            <div class="highlight-details-box">
              <div class="value">{{$property->bedrooms}}</div>
              <div class="text">{{trans('words.bedroom')}}</div>
            </div>
          @endif

          @if($property->bathrooms!=null)
            <div class="highlight-details-box">
              <div class="value">{{$property->bathrooms}}</div>
              <div class="text">{{trans('words.bathroom')}}</div>
            </div>
          @endif
          
          @if($property->balcony!=null)
            <div class="highlight-details-box">
            <div class="value"><img src="{{ URL::asset('site_assets/img/Balcony.png') }}" width="32px;"> </div>
              <div class="text">{{trans('words.balcony')}}</div>
              <div class="unit"> {{$property->balcony}}</div>
            </div>
          @endif

          @if($property->garage!=null)
          <div class="highlight-details-box">
              <div class="value"><img src="{{ URL::asset('site_assets/img/Car-Parking.png') }}" width="32px;"> </div>
              <div class="text highlight-title">
                {{trans('words.garages')}}
              </div>
              <div class="unit"> {{$property->garage}}</div>
            </div>          
          @endif-->


          @if($property->facing!=null)
          <div class="highlight-details-box">
              <div class="value"><img src="{{ URL::asset('site_assets/img/Facing.png') }}" width="32px;"> </div>
              <div class="text highlight-title">
                {{trans('words.facing')}}
              </div>
              <div class="unit"> {{$property->facing}}</div>
            </div>          
          @endif


          @if($property->no_of_floor!=null)
          <div class="highlight-details-box">
              <div class="value"><img src="{{ URL::asset('site_assets/img/No-of-Floors.png') }}" width="32px;"> </div>
              <div class="text highlight-title">
                {{trans('words.no_of_floor')}}
              </div>
              <div class="unit"> {{$property->no_of_floor}}</div>
            </div>          
          @endif

          <!-- @if($property->available_floor!=null)
          <div class="highlight-details-box">
              <div class="value"><img src="{{ URL::asset('site_assets/img/Available-Floor.png') }}" width="32px;"> </div>
              <div class="text highlight-title">
                {{trans('words.available_floor')}}
              </div>
              <div class="unit"> {{$property->available_floor}}</div>
            </div>          
          @endif -->

          </div>

         {{-- @if($property->map_latitude!=null AND $property->map_longitude!=null)
          <!-- Property Map -->
          <div class="property-details-map-container">
            <div id="property-details-map"></div>
          </div>
          @endif --}}

        </div>
        <div class="col-md-8 right-sec">
          <div class="information-box">
            <div id="AmenitiesBox">
              <h3>{{trans('words.amenities')}} </h3>
              <div class="box-content">
               
                <div class="attachment-container ">
                  <div class="row amenities">
                    @if($property->amenities_servent_bed)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Servant-Bed.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_servent_bed}}</div>
                        <div class="dl-times" style="font-size: 0.9em;"></div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_servent_bath)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Servant-Bath.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_servent_bath}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_gym)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Gym.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_gym}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_front_yard)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Front-yard.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_front_yard}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_splash_pool)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Splash-Pool.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_splash_pool}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_roof_deck)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Roof-Deck.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_roof_deck}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_reception)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Reception.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_reception}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_rooftop_garden)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Rooftop-Garden.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_rooftop_garden}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_generator)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Generator.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_generator}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_substation)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Substation.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_substation}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_lift)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Lift.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_lift}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_kitchen_veranda)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Kitchen-Veranda.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_kitchen_veranda}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_kitchen_cabinet)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Kichen-Cabinet.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_kitchen_cabinet}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_corner_plot)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Corner-Plot.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_corner_plot}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_guest_lobby)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Guest-Lobby.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_guest_lobby}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_cctv)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/CCTV.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_cctv}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_swimming_pool)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Swimming-Pool.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_swimming_pool}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_guest_parking)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Guest-Parking.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_guest_parking}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_laundry_room)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Laundry-Room.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_laundry_room}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_bbq)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/BBQ.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_bbq}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_terrace)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Terrace.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_terrace}}</div>
                      </a>
                    </div>
                    @endif

                    @if($property->amenities_sauna)
                    <div class="col-sm-6">
                      <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                        <div class="size"><img src="{{ URL::asset('site_assets/img/amenites/Sauna.png') }}" width="32px;"></div>
                        <div class="title">{{$property->amenities_sauna}}</div>
                      </a>
                    </div>
                    @endif
                 </div>
                   
              </div>
            </div> 

            <div id="OverviewBox">
               <h3>{{'Overview'}} </h3>
              <div class="b-sec pro-details">

                  <div id="showbox_about">
                    {!!Str::limit($property->description, 200, ' ...')!!}
                    <span class="readmore-btn"> + Read More</span>
                   </div>
                
                   <div id="hidebox_about" style="display:none;">
                    {!! $property->description !!}
                      <span class="readmore-btn-less"> - Show Less</span>
                   </div>
              </div>
            </div>  
          </div>
        </div>


          @if($property->video_code!=null)
          <div class="information-box">
            <h3>{{trans('words.video_presentation')}}</h3>
            <div class="box-content">
              <div class="video-box">
                {!! stripslashes($property->video_code) !!}
              </div>
            </div>
          </div>
          @endif

        </div>
        
      </div>   

      <div class="b-sec">
        

          <div class="information-box" id="NearestPlacesBox">
            <h3>{{trans('words.nearest_palces_single')}}</h3>
            <div class="box-content">
              <div class="attachment-container">
                <div class="row">
                  @if($property->nearest_school_km)
                  <div class="col-sm-6">
                  <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/education.png') }}" width="32px;"></div>
                    <div class="title">{{trans('words.school')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_school_km}}</div>
                  </a>
                  </div>
                  @endif
                  @if($property->nearest_hospital_km)
                  <div class="col-md-6">
                  <a href="javascript:void();" class="attachment-box" style="margin-bottom: 10px;">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/hospital.png') }}" width="32px;" style="margin-top: 3px;"></div>
                    <div class="title">{{trans('words.hospital')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_hospital_km}}</div>
                  </a>
                  </div> 
                  @endif
                  @if($property->nearest_mall_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                  <a href="javascript:void();" class="attachment-box">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/mall.png') }}" width="36px;"></div>
                    <div class="title">{{trans('words.mall')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_mall_km}}</div>
                  </a>
                  </div>
                  @endif
                  @if($property->nearest_bus_stand_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                  <a href="javascript:void();" class="attachment-box">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/bus.png') }}" width="40px;" style="margin-top: 3px;"></div>
                    <div class="title">{{trans('words.bus_station')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_bus_stand_km}}</div>
                  </a>
                  </div>
                  @endif

                  @if($property->nearest_railway_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                  <a href="javascript:void();" class="attachment-box">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/railway.png') }}" width="40px;" style="margin-top: 3px;"></div>
                    <div class="title">{{trans('words.railway')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_railway_km}}</div>
                  </a>
                  </div>
                  @endif

                  @if($property->nearest_airport_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                  <a href="javascript:void();" class="attachment-box">
                    <div class="size"><img src="{{ URL::asset('site_assets/img/features/airport.png') }}" width="40px;" style="margin-top: 3px;"></div>
                    <div class="title">{{trans('words.airport')}}</div>
                    <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_airport_km}}</div>
                  </a>
                  </div>
                  @endif

                  @if($property->nearest_park_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Park.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_park_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_park_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_mosque_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Mosque.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_mosque_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_mosque_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_playground_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Playground.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_playground_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_playground_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_departmental_store_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Departmental-Store.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_departmental_store_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_departmental_store_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_restaurant_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Restaurant.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_restaurant_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_restaurant_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_fire_service_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Fire-Service.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_fire_service_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_fire_service_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_police_station_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Police-Station.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_police_station_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_police_station_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_pharmacy_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Pharmacy.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_pharmacy_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_pharmacy_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_grocery_bazar_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Grocery-Kacha-Bazar.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_grocery_bazar_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_grocery_bazar_km}}</div>
                    </a>
                  </div>
                  @endif

                  @if($property->nearest_govt_office_km)
                  <div class="col-md-6" style="margin-bottom: 10px;">
                    <a href="javascript:void();" class="attachment-box">
                      <div class="size"><img src="{{ URL::asset('site_assets/img/features/Govt-Office.png') }}" width="40px;" style="margin-top: 3px;"></div>
                      <div class="title">{{trans('words.nearest_govt_office_km')}}</div>
                      <div class="dl-times" style="font-size: 0.9em;"><i class="fa fa-road"></i>{{$property->nearest_govt_office_km}}</div>
                    </a>
                  </div>
                  @endif

                </div>                
              </div>
            </div>
          </div>

            @if($property->floor_plan!=null)
            <div class="information-box floor-plan">
              <h3>{{trans('words.floor_plan')}}</h3>
              <div class="box-content" align="center">
                <ul class="image-main-box clearfix">
                  <li class="item col-xs-12">
                    <figure>
                      <img src="{{ URL::asset('upload/floorplan/'.$property->floor_plan.'-s.jpg') }}" alt="Floor Plan"/>
                      <a href="{{ URL::asset('upload/floorplan/'.$property->floor_plan.'-b.jpg') }}" class="more-details" style="border:none;border-bottom:0px;">Enlarge</a>
                    </figure>
                  </li>
                
                </ul>
              </div>
            </div>
            @endif

        <div class="information-box property-agent-container" id="ContactBox">

          <h3>@if($agent->usertype=='Agents') {{trans('words.contact_agent')}} @else {{trans('words.contact_owner')}} @endif</h3>
          <div class="box-content clearfix">
            <div class="col-md-5 agent-container">
              <div class="agent-box">
                <div class="inner-container">
                  <a href="{{URL::to('user/details/'.$agent->id)}}" class="img-container">
                     @if($agent->image_icon)
                    <img src="{{ URL::asset('upload/members/'.$agent->image_icon.'-b.jpg') }}" alt="{{$agent->name}}">
                    @else
                    <img src="{{ URL::asset('site_assets/img/agent_default.jpg') }}" alt="{{$agent->name}}">
                    @endif
                  </a>
                  <div class="bott-sec">
                    <div class="name"><a href="{{URL::to('user/details/'.$agent->id)}}">{{$agent->name}}</a></div>
                     <div class="desc">
                      {{$agent->about}}
                    </div>
                    <a href="{{URL::to('user/details/'.$agent->id)}}" class="view-listing">{{trans('words.view_listing')}}</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-7 contact-form-container" id="agentscontact_sec">
              
              {!! Form::open(array('url'=>'agentscontact','method'=>'POST', 'id'=>'agent_contact_form')) !!}

              <input type="hidden" name="property_id" value="{{$property->id}}">
              <input type="hidden" name="lead_name" value="{{$property->property_name}}">
                         
              <input type="hidden" name="agent_id" value="{{$agent->id}}">
              <input type="hidden" name="lead_type" value="property">


              <div class="contact-form">
                <div class="field-box">
                  <input type="text" placeholder="{{trans('words.name')}} *" name="name">
                  @if ($errors->has('name'))
                    <span style="color:#fb0303">
                        {{ $errors->first('name') }}
                    </span>
                 @endif
                </div>
                <div class="field-box">
                  <input type="email" placeholder="{{trans('words.email')}} *" name="email">
                  @if ($errors->has('email'))
                    <span style="color:#fb0303">
                        {{ $errors->first('email') }}
                    </span>
                 @endif
                </div>
                <div class="field-box">
                  <input type="text" placeholder="{{trans('words.phone')}}" name="phone">
                </div>
                <textarea id="message" name="message" placeholder="{{trans('words.message')}} *"></textarea>
                @if ($errors->has('message'))
                    <span style="color:#fb0303">
                        {{ $errors->first('message') }}
                    </span>
                    <br><br>
                 @endif
                <button type="submit" class="btn btn-lg submit" name="submit">{{trans('words.submit')}}</button>
              </div>
              {!! Form::close() !!}

            </div>
          </div>
        </div>         
      </div>

      <!-- <div class="information-box related-properties">
          <h3>{{trans('words.comments')}}</h3>
          {!! stripslashes(getcong('disqus_comment_code')) !!}
      </div> -->

    </div>

    <aside class="col-sm-4">
      <!--Sidebar Box-->
     
      <div class="clearfix"></div>

      <div class="sidebar-box" id="contact-agent">
        <div class="widget-heading bg-yellow text-center">
            <h3>Contact Agent</h3>
         </div>

        <div class="box-content">

            <div class="agent-box">
                <div class="agent-top">
                    <div class="agent-image">
                      <img src="{{URL::asset('site_assets/img/male-avatar.png')}}" alter="agents"/>
                    </div>
                    <div class="agent-contacts">
                        <ul class="list-inline agent-contact-list">
                            <li class="agent-phone"><a href=""><i class="fa fa-phone"></i></a></li>
                            <li class="agent-whatsapp"><a href=""><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="agent-info">
                    <h2 class="agent-name">Anisur Rahman<h2>
                    <div class="ratting-box">
                      <ul class="list-inline"> 
                        <li class="ratting-count"><span>4.7</span></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>

                    <div class="agent-experience">
                      <p>Experience : <b>13 yrs</b></p>
                      <p>Sold : <b>120</b></p>
                      <p>Deals in Hand : <b>19</b></p>

                    </div>
                </div>
            </div> <!--agent-box-->

            <div class="agent-box">
                <div class="agent-top">
                    <div class="agent-image">
                      <img src="{{URL::asset('site_assets/img/male-avatar.png')}}" alter="agents"/>
                    </div>
                    <div class="agent-contacts">
                        <ul class="list-inline agent-contact-list">
                            <li class="agent-phone"><a href=""><i class="fa fa-phone"></i></a></li>
                            <li class="agent-whatsapp"><a href=""><i class="fa fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="agent-info">
                    <h2 class="agent-name">Anisur Rahman<h2>
                    <div class="ratting-box">
                      <ul class="list-inline"> 
                        <li class="ratting-count"><span>4.7</span></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                      </ul>
                    </div>

                    <div class="agent-experience">
                      <p>Experience : <b>13 yrs</b></p>
                      <p>Sold : <b>120</b></p>
                      <p>Deals in Hand : <b>19</b></p>

                    </div>
                </div>
            </div> <!--agent-box-->

            <div class="view-agents pull-right"><a href="">Contact More >></a></div>


         </div>  
      </div>    


      <div class="sidebar-box" id="LoanBox">
        <h3>{{trans('words.mortgage_calculator')}}</h3>
        <div class="box-content">

          <div class="property-search-form loan-calculation">
             <div class="mdl-card mdl-shadow--2dp animated slideInUp">
              <div class="mdl-card__supporting-text cyan">

                <div class="monthly-amounts">
                   <span class="cd-currency">BDT</span>
                   <p id="installment_value" class="installment-value animated slideInDown"> 0.00 </p>
                   <p class="installment-label animated slideInDown">Per Month</p>
                </div>

                <div class="total-amounts">
                   <p class="installment-label animated slideInDown">TOTAL LOAN AMOUNT</p>
                   <p class="text-center total-bdt">BDT</p>
                   <p id="totalinstallment_value" class="totalinstallment-value animated slideInDown"> 0.00</p>
                </div>

                <div class="total-breakdown">
                   <p class="installment-label animated slideInDown">Payment Breakdown</p>
                    <div class="progress breakdown-progress">
                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="breakdown-point row">
                        <div class="col-md-6">
                            <span class="interest">Interest</span>
                        </div>
                        <div class="col-md-6">
                            <span class="interest pull-right">Principle</span>
                        </div>
                    </div>  
                </div>


                
              </div>
              <div class="mdl-card__supporting-text">
                <form action="#">
                @php
                  $price=$property->price;
                  $pro_price= str_replace(',','',$price);

                  $sft_price=$property->rate_per_sft;
                  $deposit_sft_price= str_replace(',','',$sft_price);
                  $depercent= (10/100)*$pro_price;

                @endphp

                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <label class="" for="sample4">Total Price</label>
                    <input  type="text" class="form-control" pattern="-?[0-9]*(\.[0-9]+)?" id="property_price" min="1" max="{{ $pro_price }}" value="{{ $pro_price }}"  tabindex="1">
                    <span class="mdl-textfield__error">Price is not a number!</span>

                    <input id="price_slider" class="mdl-slider mdl-js-slider" type="range" min="0" max="{{ $pro_price }}" value="{{ $pro_price }}" tabindex="1">

                  </div>

                  <br>

                  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label class="" for="sample4">Down Payment </label>

                    <div class="form-group">
                      <div class="input-group">
                        <input type="text" class="form-control deposite-value" id="deposit" value="10" tabindex="2">
                        <div class="input-group-addon" id="deposit_percent">10%</div>
                      </div>
                    </div>

                    <span class="mdl-textfield__error">Deposit is not a number!</span>
                    <input id="deposit_slider" class="mdl-slider mdl-js-slider" type="range" min="0" max="100"  tabindex="2">

                  </div>

                  <br>

                  <div class="mdl-textfield mdl-js-textfield animated slideInLeft">
                    <p>
                      <label class="slider-label">Loan Period:</label>
                      <label class="slider-value">Year(s)</label>
                      <!-- <label id="repayment_value" class="slider-value"></label> -->
                      </p>
                      <input id="repayment_value" class="slider-value form-control" type="text" pattern="-?[0-9]*(\.[0-9]+)?"  min="1" max="10" value="6">
                      <input id="repayment_slider" class="mdl-slider mdl-js-slider" type="range" min="1" max="10" value="6" tabindex="3">
                  </div>
                  <br>

                  <div class="mdl-textfield mdl-js-textfield animated slideInLeft ">
                  <p>
                      <label class="slider-label">Interest Rate:</label>
                      <!-- <label id="interest_value" class="slider-value"></label> -->
                      <label class="slider-value">%</label>
                    </p>

                     <input id="interest_value" class="slider-value form-control" type="text" pattern="-?[0-9]*(\.[0-9]+)?" min="1" max="18" value="5">
                    <input id="interest_slider" class="mdl-slider mdl-js-slider" type="range" min="1" max="18" value="5" step="1" tabindex="4">
                  </div>

                </form>
              </div>
            </div>

           </div>   
        </div>
      </div>

      @section("styles")
       
         <link rel="stylesheet" href="{{ URL::asset('site_assets/loancalculation/material.cyan-amber.min.css') }}">
          <!-- Material Design icon font -->
         <link rel="stylesheet" href="{{ URL::asset('site_assets/loancalculation/icon.css') }} ">
      @endsection
      @section("scripts")
          <!-- Material Design Lite -->
         <script src="{{ URL::asset('site_assets/loancalculation/material.min.js') }}"></script>
         <script src="{{ URL::asset('site_assets/loancalculation/humanize.min.js') }}"></script>

         <script>
           $( document ).ready(function() {
            calc_loan();
          });

            var calc_loan = function() {
            var value = 0;
            var n = $('#repayment_slider').val()*12;

            var r = ($('#interest_slider').val()/100)/12; //interest

            var R = Math.pow(r+1,n);

            var P = $('#property_price').val();

            var d = ($('#deposit').val()/100)*$('#property_price').val();

            value=(P-d)*((r*(R))/(R-1));
            $('.installment-value').text(Humanize.formatNumber(value, 2));

            totalinstallment= (value*n);
            $('.totalinstallment-value').text(Humanize.formatNumber(totalinstallment, 2) );
          }

       

          $('#repayment_value').text($('#repayment_slider').val());
          //interest
           $('#interest_value').text($('#interest_slider').val());

           $('#deposit').text($('#deposit_slider').val()); 

       
          $('#price_slider').change(function(event) {
            $('#property_price').val($('#price_slider').val());
            calc_loan();
          });

          //deposit
          $('#deposit_slider').change(function(event) {
            $('#deposit').val($('#deposit_slider').val());
            calc_loan();
          });


          //  $('#deposit').change(function(event) {
          //   calc_loan();
          // });


          $('#repayment_slider').change(function(event) {
            $('#repayment_value').val($('#repayment_slider').val());
            calc_loan();
          });

          //interest  
          $('#interest_slider').change(function(event) {
            $('#interest_value').val($('#interest_slider').val());
            calc_loan();
          });


         </script>


          <script type="text/javascript">
              //show hide read more

              $(document).ready(function() {
                  $(".readmore-btn").click(function(){
                  $("#hidebox_about").slideDown();
                  $("#showbox_about").hide(); 
                });
                
                  $(".readmore-btn-less").click(function(){
                  $("#showbox_about").show(300);
                  $("#hidebox_about").slideUp(); 
                });

              });

            </script>

      @endsection  


      &nbsp;
      <div class="clearfix"></div>

      
       @include("_particles.sidebar") 
       
    </aside>
  </section>
 
@endsection


@section('styles')
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
  @stop

  @section('scripts')



    <script src="{{ URL::asset('site_assets/alert-toastr/toastr.js') }}"></script>

    <script>
        @if(Session::has('success'))
			toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('info'))
		    	toastr.info("{{Session::get('info')}}")
        @endif

        @if(Session::has('warning'))
		    	toastr.warning("{{Session::get('warning')}}")
        @endif

        @if(Session::has('error'))
		    	toastr.error("{{Session::get('error')}}")
        @endif

    </script>
@stop
