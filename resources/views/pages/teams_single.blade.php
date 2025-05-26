@extends("app")

@section('head_title', trans('Team Member').' | '.getcong('site_name') )
@section('head_url', Request::url())
<style>


    </style>
@section("content")
<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" >
    <div class="inner-container container">
      
    </div>
  </section>
  <!--Breadcrumb Section--> 

  <section class="main-container container agent-box-container">
    <div class="title-box clearfix">
      <h2 class="hsq-heading type-1">Team Members</h2>
      <div class="subtitle">&nbsp;</div>
    </div>


<div class="col-sm-12">
        <div class="content-box">
  		 <div class="single-blog-posts-body">
    <div class="blog-thumbs">
				<br>
             <img src="{{asset($teams->image)}}" alt="{{$teams->title}}" class="img-thumbnile" style=" display: block; margin-left: auto;
  margin-right: auto;">    
            </div>
</div>
</div>
</div>

<div class="content-box">
  		 <div class="single-blog-posts-body">
    <div class="blog-thumbs">
				<br>
             <h1 class="agent-name" style="text-align: center;"> {{$teams->name}}</h1>
            </div>
           
				
				<h3 class="agent-name" style="text-align: center;"><i>{{$teams->designation}} , SIKI Realtor</i></h3>
			
           		<p class="agent-name" style="text-align: center;"><i>Email: {{$teams->email}} </i></p>

				<p class="agent-name" style="text-align: center;"><i>Linkdn Profile: {{$teams->linkdn}} </i></p>
		

</div>
</div>

<div class="content-box">
  		 <div class="single-blog-posts-body">
   
           
				
			
           
				
				<p class="agent-name" style="text-align: center;"><i><b>Quotation:</b> "{{$teams->description}}" </i></p>
		

</div>
</div>
<br><br><br>


  </section>


  @endsection

  
  @section('styles')
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
  @stop

  @section('scripts')

    
@stop