@extends("app")

@section('head_title', getcong('contact_us_title').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")


<!-- begin:content -->
    <section class="main-container container">
     <div class="descriptive-section">       
     </div>
    <div class="contact-info clearfix">
      <div class="contact-info-box col-md-6 col-lg-4">
        <div class="inner-container">
          <i class="fa fa-envelope-o"></i>
          <div class="value">{{getcong('contact_us_email')}}</div>
        </div>
      </div>
      <div class="contact-info-box col-md-6 col-lg-4">
        <div class="inner-container">
          <i class="fa fa-phone"></i>
          <div class="value">{{getcong('contact_us_phone')}}</div>
        </div>
      </div>
      <div class="contact-info-box col-md-push-2 col-md-6 col-lg-push-0 col-lg-4">
        <div class="inner-container">
          <i class="fa fa-map-marker"></i>
          <div class="value">{{getcong('contact_us_address')}}</div>
        </div>
      </div>

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.1649610543423!2d90.40938371445569!3d23.741496195034447!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b88a8c1264eb%3A0x48d123d5cc5a3e85!2sShantinagar%20Plaza!5e0!3m2!1sen!2sbd!4v1636050812562!5m2!1sen!2sbd" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> -->
  <iframe src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=Dekko Legacy Group&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>





    @if(Session::has('flash_message_contact'))
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 </button>
                {{ Session::get('flash_message_contact') }}
            </div>
        @endif
                       

    {!! Form::open(array('url' => 'contact-us','class'=>'','id'=>'contactform','role'=>'form')) !!}
    <div class="contact-form">
      <div class="row">
        <div class="col-sm-6 field-box">
          <input type="text" name="name" placeholder="{{trans('words.name')}} *" value="{{ old('name') }}">
          @if ($errors->has('name'))
                    <span style="color:#fb0303">
                        {{ $errors->first('name') }}
                    </span>
          @endif
        </div>
        <div class="col-sm-6 field-box">
          <input type="email" name="email" placeholder="{{trans('words.email')}} *" value="{{ old('email') }}">
          @if ($errors->has('email'))
                    <span style="color:#fb0303">
                        {{ $errors->first('email') }}
                    </span>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 field-box">
          <input type="text" name="phone" placeholder="{{trans('words.phone')}}" value="{{ old('phone') }}">
        </div>
        <div class="col-sm-6 field-box">
          <input type="url" name="website" placeholder="{{trans('words.website')}}" value="{{ old('website') }}">
        </div>
      </div>
      <div class="row message">
        <textarea id="message" name="your_message" placeholder="{{trans('words.message')}} *">{{ old('your_message') }}</textarea>
        @if ($errors->has('your_message'))
                    <span style="color:#fb0303">
                        {{ $errors->first('your_message') }}
                    </span>
          @endif
      </div>
      <div class="row button-box">
        <button class="btn" type="Submit">{{trans('words.submit')}}</button>
      </div>
    </div>
    {!! Form::close() !!}
  </section>
    <!-- end:content -->
 
@endsection
