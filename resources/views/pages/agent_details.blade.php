@extends("app")

@section('head_title', $agent->name.' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

<!-- @if(Session::has('flash_message'))
<script type="text/javascript">
   
  alert('{{ Session::get('flash_message') }}');

</script>
@endif -->

<!--Breadcrumb Section-->
  <section class="breadcrumb-box">
    <div class="inner-container container">
      
    </div>
  </section>
  <!--Breadcrumb Section-->

  <section class="main-container agent-box-container container" style="padding-top: 40px;">

    <div class="container ">
    <h1>@if($agent->usertype=='Agents' or $agent->usertype=='Admin') {{trans('words.agent')}} @else {{trans('words.owner')}} @endif {{trans('words.details')}}</h1>

      <div class="agent-box" style="background: #eee;padding:15px 15px;">
        <div class="row">

          <div class="agent-img-container col-lg-2">
          @if($agent->profile_image)
                <img src="{{ URL::asset($agent->profile_image)}}" alt="{{ $agent->name }}">
              @else
              <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="{{ $agent->name }}">
              @endif 
          </div>

          <div class=" col-lg-10">

            <div class="agent_name"><h4>{{$agent->name}}</h4></div>

            <ul class="list-inline agent-social">
              <li> <a href="{{$agent->facebook}}" class="fa fa-facebook" target="_blank"></a> </li>
              <li> <a href="{{$agent->linkedin}}" class="fa fa-linkedin" target="_blank"></a></li>
            </ul>

            <div class="agent_email"><h4 class="fa fa-envelope"> {{ $agent->email }}</h4></div>
            <div class="agent_phone"><h4 class="fa fa-phone"> {{ $agent->phone }}</h4></div>


           
              @if(Session::has('success'))
                <p style="color:green">{{ Session::get('success') }}</p>  
              @endif

          </div>

          <div class="col-lg-12">

            <div class="stats-desc">
              <ul class="user-stats"><li>Experience<strong>{{$agent->yrs_exp}}</strong></li>
              
              <li>Date Of Birth<strong>{{$agent->dob}}</strong></li>

              <li>Gender<strong>{{$agent->gender}}</strong></li>
              <li>Present Address<strong>{{$agent->present_address}}</strong></li>
              <li>Secondary School Certificate</li>
              <li>Passing Year<strong>{{$agent->passing_year_ssc}}</strong></li>
              <li>Higher Secondary Certificate</li>
              <li>Passing Year<strong>{{$agent->passing_year_hsc}}</strong></li>
              <li>Graduation</li>
              <li>Passing Year<strong>{{$agent->passing_year_graduation}}</strong></li>

</ul>


            
             <article class="seller-desc">
               <hr />
               
              {{$agent->about}}
             </article>
             </div>
          </div> <!--col-lg-12-->

        </div>
      </div>

    </div>


    
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