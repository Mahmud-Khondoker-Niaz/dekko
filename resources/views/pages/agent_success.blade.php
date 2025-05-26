@extends("app")

@section('head_title', trans('words.sign_up').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<section class="property-listing boxed-view clearfix" id="agentRegister">
     <div class="inner-container container">
       
       <div  class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-top: 136px;">
<div class="alert alert-success text-center" style="font-size: 22px;">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <b >Congratulations {{ $name}} !!</b><br/> 
            You are now registered with FloorFly. Please check your email and verify your account.
</div>

</div>
</div>
</div>
</section>
@endsection  