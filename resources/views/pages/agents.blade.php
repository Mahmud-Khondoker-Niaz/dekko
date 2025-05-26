@extends("app")

@section('head_title', trans('words.agents').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg')) {{ URL::asset('upload/'.getcong('title_bg')) }} @else {{ URL::asset('site_assets/img/breadcrumb-bg.jpg') }} @endif">
    <div class="inner-container container">
      
    </div>
  </section>
  <!--Breadcrumb Section--> 

  <section class="main-container container agent-box-container">
    <div class="title-box clearfix">
      <h2 class="hsq-heading type-1">Agents</h2>
      <div class="subtitle">&nbsp;</div>
    </div>

    <div class="agent-text">
       <b> SIKI recruitment process on behalf of the company:</b>
    
    </div>

  


  <div class="view-all-agents">
    @foreach($agents as $i => $agent) 
    <div class="col-xs-6 col-sm-4 col-md-3">
        <div class="agent-item">
            <div class="agent-profile">       
              @if($agent->profile_image)
                <img src="{{ URL::asset($agent->profile_image)}}" alt="{{ $agent->name }}">
              @else
              <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="{{ $agent->name }}">
              @endif                       
            </div>

             <div class="agent-info">
                <a href="{{URL::to('user/details',$agent->id) }}" class="agent-name" >{{$agent->name}}</a>
                <div class="ratting-box">
                  <ul class="list-inline agent-ratting-list"> 
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><i class="fa fa-star"></i></li>
                    <li><img src="{{ URL::asset('site_assets/img/agent-rating.png') }}" /></li>
                  </ul>
                </div>
                <div class="agent-experience-data">
                  <p>Experience : <b>{{$agent->yrs_exp}}</b></p>
                  <p>Age : <b>{{$agent->age}}</b></p>
                  
                </div>
              </div>

             
        </div>

      
    </div>
    @endforeach 
  </div>  <!--view-all-agents-->

  </section>
  <!-- Pagination -->
  @include('_particles.pagination', ['paginator' => $agents]) 
  <!-- End of Pagination -->

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

        @if(Session::has('danger'))
		    	toastr.danger("{{Session::get('danger')}}")
        @endif
    </script>
@stop