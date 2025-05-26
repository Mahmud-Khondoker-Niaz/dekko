@extends("app")

@section('head_title', trans('words.all_properties').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

 <!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      <h1>{{trans('words.all_properties')}}</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="{{ URL::to('/') }}">{{trans('words.home')}}</a></li>
          <li>{{trans('words.all_properties')}}</li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->

  <section class="main-container container">
    <div class="content-box col-sm-8">
      <!-- Properties -->
      <section class=" boxed-view clearfix" style="margin-top: 0px;padding: 0px;">
        <div class="inner-container clearfix">
        
          @foreach($leglService as $i => $row)
          <div class="property-box wow fadeInUp">
            
            <div class="inner-box services-box">
                <div class="row">
                    <div class="col-md-3">
                        <div class="service-image">
                            <img src="{{url($row->service_image)}}" alt="{{$row->service_name}}" class="img-thumbnail">
                        </div>
                    </div>  

                    <div class="col-md-6">
                        <div class="service-text">
                            <h2>{{$row->service_name}}</h2>
                            <p>{{Str::limit($row->service_description, 70, ' ...')}}</p>
                        </div>
                    </div>     

                    <div class="col-md-3">
                        <div class="service-contacts">
                            <a class="call-now" href="tel:+8801713079178"><i class="fa fa-phone"> </i>{{$row->service_phone}}</a> 
                            <a href="" class="btn btn-primary">Appoint us</a>
                        </div>
                    </div>   
                 </div>     
            </div>

          </div>
          @endforeach
        </div>
        <!-- Pagination -->
       {{-- @include('_particles.pagination', ['paginator' => $properties]) --}}
        <!-- End of Pagination -->
      </section>
      <!-- End of Properties -->
    </div>
    <aside class="col-sm-4">
     @include("_particles.sidebar") 
    </aside>
  </section>

 
 
@endsection
