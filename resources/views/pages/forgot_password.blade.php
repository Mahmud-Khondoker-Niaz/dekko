@extends("app")

@section('head_title', trans('words.forgot_password').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
   <section class="property-listing boxed-view clearfix" id="agentRegister">
     <div class="inner-container container">
         <div  class="row">
            <div class="col-md-8 col-md-offset-2">
       
                <div id="login-form" class="login-form">
                    <h2 class="hsq-heading type-1">{{trans('words.forgot_password')}}</h2>
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                    {{ Session::get('flash_message') }}
                                </div>
                        @endif

                    {!! Form::open(array('url' => 'password/email','class'=>'search-form','id'=>'loginform','role'=>'form')) !!} 
                      <div class="form-group agr-fields">
                            <input type="email" class="form-control" placeholder="{{trans('words.email')}}" name="email" id="email" /><!-- Email Field -->
                        </div>
                        
                        <div class="search-button-container button-box">
                        <button class="btn">{{trans('words.send')}}</button>
                        <br/>&nbsp;

                        <div class="search-fields" style="font-size: 15px; color:#fff;">                            
                                {{trans('words.remember_password')}} <a style="color:#ecc807;" href="{{ url('login') }}">{{trans('words.login_here')}}</a></p>
                        </div>

                        </div>

                    {!! Form::close() !!}  
                </div>

    
             </div>   <!--col-md-->
        </div>  <!--row-->
    </div> <!--container-->
  </section>
  
 
@endsection
