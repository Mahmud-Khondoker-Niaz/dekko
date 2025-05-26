@extends("app")

@section('head_title', trans('Travel').' | '.getcong('site_name') )
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
      <h2 class="hsq-heading type-1">Travel Section</h2>
      <div class="subtitle">&nbsp;</div>
    </div>

    @foreach ($travel as $object)
<div class="col-sm-12">
        <div class="content-box">
  		 <div class="single-blog-posts-body">
    <div class="blog-thumbs">
    
    

           
             <img src="{{asset($object->image_page)}}"  class="img-thumbnile">   
             
            </div>

</div>
</div>
</div>



<div class="content-box">
  		 <div class="single-blog-posts-body">
   
           
				
			
           
				
				<p class="agent-name" style="text-align: center;">"  {!! $object->description!!}" </p>
                @endforeach

</div>
</div>



  </section>


  @endsection

  
  @section('styles')
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
  @stop

  @section('scripts')

    
@stop