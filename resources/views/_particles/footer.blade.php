<style>


/* Apply the red round shape to social icons */

  </style>
  <footer id="main-footer"class="footer-overlay">
    <div class="inner-container container">
      <div id="go-up" class="fa fa-angle">Top</div>
      <div class="top-section clearfix">
        <!-- <div class="col-md-4 widgets">
          <h4 class="title">{{getcong('footer_widget1_title')}}</h4> 
          
           
              <p style="   text-align: justify;"  >{!! stripslashes(getcong('footer_widget1')) !!}</p>
          
           
        </div> -->

        <div class="col-md-6 widgets">
          <h4 class="title">{{getcong('footer_widget2_title')}}</h4>
        
          {!! stripslashes(getcong('footer_widget2')) !!}
          <ul class="list-inline">
  <li><a href="{{getcong('social_facebook')}}" class="fa fa-lg fa-facebook social-icon" target="_blank"></a></li>
  <li><a href="{{getcong('social_twitter')}}" class="fa fa-lg fa-youtube-play social-icon" target="_blank"></a></li>
  <li><a href="{{getcong('social_linkedin')}}" class="fa fa-lg fa-linkedin social-icon" target="_blank"></a></li>
  <li><a href="{{getcong('social_instagram')}}" class="fa fa-lg fa-instagram social-icon" target="_blank"></a></li>
</ul>

            <div class="newsletter widget-box">
             <h4>{{trans('words.get_newsletter')}}</h4> 
  
              @if(Session::has('error_flash_message'))
                <div class="alert alert-danger">                  
                    {{ Session::get('error_flash_message') }}
                </div>
              @endif
              @if(Session::has('flash_message_subscribe'))
                <div class="alert alert-success">                 
                    {{ Session::get('flash_message_subscribe') }}
                </div>
              @endif

              {!! Form::open(array('url' => array('subscribe'),'name'=>'search_form','id'=>'newsletter-form','role'=>'form')) !!}   
              <meta name="_token" content="{!! csrf_token() !!}"/>

              <div class="input-group mb-3">
                <input type="email" name="email" id="email_id" placeholder="{{trans('words.email')}}" class="form-control" aria-label="Recipient's email" aria-describedby="button-addon2" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2">{{trans('words.submit')}}</button>
                </div>
              </div>

              {!! Form::close() !!} 
	
            
            </div>

        </div>
        <div class="col-md-6 widgets">
          <h4 class="title">{{getcong('footer_widget3_title')}}</h4>
            {!! stripslashes(getcong('footer_widget3')) !!}
        </div>
      </div>

      <div class="bott-section clearfix row">
        <div class="col-xs-12 col-md-6 copy-right">
           <p> {{getcong('site_copyright')}}</p>
        </div>
        <div class="col-xs-12 col-md-6 social-icons">
          <ul class="list-inline">
            @foreach(\App\Pages::where('status','1')->orderBy('id')->get() as $page_data)
            <li><a href="{{ URL::to('page/'.$page_data->page_slug) }}" class="">{{$page_data->page_title}}</a></li>
            @endforeach            
            
           </ul>
        </div>
      </div>
    </div>
  </footer>

  @section('styles')
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
  @stop

  @section('scripts')

    <script src="{{ URL::asset('site_assets/alert-toastr/toastr.js') }}"></script>

    <script>
        @if(Session::has('flash_message_client'))
		    	toastr.success("{{Session::get('flash_message_client')}}")
        @endif
    </script>
@stop