@extends("app")

@section('head_title', trans('Our Team').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="@if(getcong('title_bg'))  @endif">
    <div class="inner-container container">
      
    </div>
  </section>
  <!--Breadcrumb Section--> 

  <section class="main-container container agent-box-container">
    <div class="title-box clearfix">
      <h2 class="hsq-heading type-1">Team Members</h2>
      <div class="subtitle">&nbsp;</div>
    </div>

  

  


  <div class="view-all-agents">
     @foreach($teams->where('status',1) as $i => $team) 
    <div class="col-xs-6 col-sm-4 col-md-3">
        <div class="agent-item">
            <div class="agent-profile">       
              @if($team->image)
                <img src="{{ URL::asset($team->image)}}" alt="{{ $team->name }}">
              @else
              <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="{{ $team->name }}">
              @endif                       
            </div>

             <div class="agent-info">

                <h3 class="agent-name" style="text-align:center;"> <a href="{{ url('team/'.$team->id) }}">{{$team->name}}</a></h3>
                
                <div class="container">
                  <p>Designation:<b>{{$team->designation}}</b></p>
                  <p>Email:<i>{{$team->email}}</i> </p>
                  <!--<p>Linkdn Profile : <b>{{$team->linkdn}}</b></p>-->
                  
                </div>
              </div>

             
        </div>

      
    </div>
    @endforeach 
  </div>  <!--view-all-agents-->

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

        @if(Session::has('danger'))
		    	toastr.danger("{{Session::get('danger')}}")
        @endif
    </script>
@stop