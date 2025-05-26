<header id="main-header">
    <div id="header-top">
      <div class="header-top-content container">
        <!-- Language Switcher -->
        <ul id="language-switcher" class="list-inline" style="border-right: 0px;">
           <li style="border:none;"><a href="tel:{{getcong('contact_us_phone')}}"><i class="fa fa-phone"></i>&nbsp; {{getcong('contact_us_phone')}}</a></li>
          <li style="border:none;"><a href="mailto:{{getcong('contact_us_email')}}"><i class="fa fa-envelope-o"></i>&nbsp; {{getcong('contact_us_email')}}</a></li>
        </ul>
        <!-- End of Language Switcher -->

        <!-- Login Links -->
        <ul id="login-boxes" class="list-inline">
         @if(Auth::check())
         <li><a href="{{ URL::to('dashboard') }}">{{trans('words.dashboard_text')}}</a></li>
          <li><a href="{{ URL::to('logout') }}">{{trans('words.logout')}}</a></li>
         @else
         <li><a href="{{ URL::to('login') }}">{{trans('words.login_text')}}</a></li>
         <li><a href="{{ URL::to('register') }}">{{trans('words.sign_up')}}</a></li>
         @endif
          
        </ul>
        <!-- End of Login Links -->
      </div>
    </div>

    <div class="main-header-cont container">
      <!-- Top Logo -->
      <div class="logo-main-box col-xs-6 col-sm-4 col-md-2">
      <a href="{{ URL::to('/') }}">@if(getcong('site_logo')) <img src="{{ URL::asset('upload/'.getcong('site_logo')) }}" alt="{{getcong('site_name')}}" width="175"> @else <span>{{getcong('site_name')}}</span> @endif</a>
         
      </div>
      <!-- End of Top Logo -->
      <!-- Main Menu -->
      <div class="top-menu-container col-xs-6 col-sm-8 col-md-10">

            <nav class="main-menu-area">
                  
              <ul class="menu">
              <li><a href="{{ URL::to('/') }}" class="{{classActivePathPublic('')}}">{{trans('words.home')}}</a>
              <li><a href="{{ URL::to('properties/') }}" class="{{classActivePathPublic('properties')}}">{{trans('words.all_properties')}}</a></li>

                <!-- <li><a  href="#"> All Properties </a></li> -->
           
                @php $serviceCategory=App\ServiceCategory::get(); @endphp
                @foreach($serviceCategory as $serviceCategorydata)

                @php
                $serviceSubcategory = App\ServiceSubcategory::where('service_category_id', $serviceCategorydata->id)->get();
                @endphp
                <li class="parent">
                  <a  href="{{route('pcategory.single',['slug'=>$serviceCategorydata->slug])}}">{{ $serviceCategorydata->name }}</a>
                   <ul class="sub-menu">
                    @foreach($serviceSubcategory as $serviceSubcategorydata)
                    <li class="parent2">
                      <a href="">{{ $serviceSubcategorydata->name }} <span class="fa fa-angle-right"></span></a>
                      <ul class="sub-menu submenu-2">
                        @php
                        $serviceChildcategory = App\ServiceChildcategory::where('service_subcategory_id', $serviceSubcategorydata->id)->get();
                        @endphp
                          
                          @foreach($serviceChildcategory as $serviceChildcategorydata)
                          <li><a href="">{{ $serviceChildcategorydata->name }}</a></li>
                          @endforeach

                      </ul>
                    </li>
                    @endforeach
                  </ul>
                 </li>
                 @endforeach

                <li><a href="{{ URL::to('agents/') }}" class="{{classActivePathPublic('agents')}}">{{trans('words.agents')}}</a>                     
                <li><a href="{{ URL::to('contact-us/') }}" class="{{classActivePathPublic('contact-us')}}">{{trans('words.contact')}}</a></li>
              </ul>

              
              <div id="main-menu-handle" class="responsive-menu"><i class="fa fa-bars"></i></div><!-- Mobile Menu handle -->
              <a id="submit-property-link" class="btn" href="{{ URL::to('submit-property') }}"><span>{{trans('words.submit_property')}}</span></a>
              

          </nav>
        <!-- END of Main Menu -->

           
      <!-- End of Main Menu -->
    </div>
    
  </header>


