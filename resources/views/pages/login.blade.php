@extends("app")

@section('head_title', trans('words.sign_in').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")

   <section class="property-listing boxed-view clearfix" id="agentRegister">
     <div class="inner-container container">

        <div  class="row">
            <div class="col-md-8 col-md-offset-2">
       
                <div id="login-form" class="login-form">
                    <h2 class="hsq-heading type-1">{{trans('words.sign_in')}}</h2>
                        
                        @if(Session::has('flash_message'))
                                <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                    {{ Session::get('flash_message') }}
                                </div>
                        @endif

                        @if(Session::has('login_error_flash_msg'))
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @endif

                    {!! Form::open(array('url' => 'login','class'=>'search-form','id'=>'loginform','role'=>'form')) !!} 
                        <div class="form-group agr-fields">
                            <input type="email" class="form-control" placeholder="{{trans('words.email')}}" name="email" id="email"/>
                            @if ($errors->has('email'))
                                <span style="color:#fb0303">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group agr-fields">
                            <input class="form-control" placeholder="{{trans('words.password')}}" type="password" name="password" id="password"/>
                            @if ($errors->has('password'))
                                <span style="color:#fb0303">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                        @if(getcong('recaptcha')==1)
                        <div class="search-fields" align="center">

                            {!! NoCaptcha::display() !!}

                            @if ($errors->has('g-recaptcha-response'))
                                <span style="color:#fb0303">
                                    {{ $errors->first('g-recaptcha-response') }}
                                </span>
                            @endif
                            
                        </div> 
                        @endif 
                        
                        <div class="search-button-container button-box">
                            <button class="btn">{{'Login Now'}}</button>
                        </div>

                        <br/>&nbsp;

                        <!--<div class="search-fields" style="font-size: 15px; color:#fff;">                            -->
                        <!--        <p>{{trans('words.dont_have_account')}} <a style="color:#ecc807;" href="{{ url('register') }}">{{trans('words.register_here')}}</a>                <br>  -->
                        <!--    <a style="color:#ecc807;" href="{{ url('password/email') }}">{{trans('words.forgot_pass_text')}}</a></p>-->
                        <!--</div>-->

                    </div>

                    {!! Form::close() !!}  
                </div>



            </div>   <!--col-md-->
        </div>  <!--row-->
    </div> <!--container-->
  </section>
  
 
@endsection
