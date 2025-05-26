@extends('admin.admin_app')
@section('content')
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
      <h2 class="hsq-heading type-1" Style="text-align:center">Clients' Requirements</h2>
      <div class="property-price" Style="text-align:center"><b>Requested From:</b> {{$properties->name}} </div>
      <div class="property-price" Style="text-align:center"><b>Contact:</b> {{$properties->number}} </div>
      <div class="property-price" Style="text-align:center"><b>Topic Name :</b> {{$properties->size}} </div>
             

              <div class="property-address location-i" Style="text-align:center"><i class="fa fa-map-marker"><b>Address : </b></i> {{ $properties->address }}</div>
      <div class="subtitle">&nbsp;</div>
    </div>


<div class="col-sm-12">
        <div class="content-box">
  		 <div class="single-blog-posts-body">
    <div class="blog-thumbs">
				<br>
             <img src="{{asset($properties->featured_image)}}" alt="{{$properties->title}}" width="300px" height="300px" class="img-thumbnile" style="display: block;
  margin-left: auto;
  margin-right: auto;" >    
            </div>
</div>
</div>
</div>

<div class="row">
  <div class="col-md-9">
<div class="short-info">  
            <div class="bottom-sec ">
 
<div class="property-price" Style="text-align:justify"><b>Description:</b> {!!$properties->description!!} </div>

            
            


                  
               

           
            </div>
          </div>		
</div>
<br><br><br>
<div class="col-md-12">
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