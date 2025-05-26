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
                <li><a  href="#"> Home </a></li>
                <li><a  href="#"> All Properties </a></li>

                @foreach(App\ServiceCategory::with('subcats'))
                
                <li class="parent">
                  <a  href="#">Services</a>
                   <ul class="sub-menu">
                    <li class="parent2">
                      <a href="#">Legal Services <span class="fa fa-angle-right"></span></a>
                      <ul class="sub-menu submenu-2">
                         <li><a href="#">Land Registration</a></li>
                          <li><a href="#">Apartment Registration</a></li>
                          <li><a href="#">Mortgage Assistance</a></li>	
                          <li><a href="#">Legal Vetting </a></li>
                          <li><a href="#">Soil Test </a></li>
                          <li><a href="#">Project Cost Estimation </a></li>
                          <li><a href="#">Project Design </a></li>
                          <li><a href="#">Project Fencing </a></li>
                          <li><a href="#">Rajuk Approval </a></li>
                      </ul>
                    </li>

                    <li class="parent2">
                      <a href="#">Property Services <span class="fa fa-angle-right"></span></a>
                      <ul class="sub-menu submenu-2">
                        <li><a href="#">A/C Servicing & Repair</a></li>
                        <li><a href="#">Furniture Cleaning & Polishing</a></li>
                        <li><a href="#">Interior Design</a></li>
                        <li><a href="#">Marble & Tiles Cleaning & Polishing</a></li>
                        <li><a href="#">Office Carpet Cleaning</a></li>
                        <li><a href="#">Painting</a></li>
                        <li><a href="#">Plumbing & Electrical Work</a></li>
                        <li><a href="#">Property Maintenance & Cleaning</a></li>
                        <li><a href="#">Renovation Work</a></li>
                        <li><a href="#">Rooftop Gardening</a></li>
                        <li><a href="#">Sink Repair</a></li>
                        <li><a href="#">Water Tank / Reservoir Cleaning</a></li>

                      </ul>
                    </li>
                  </ul>
                 </li>

                 <li class="parent">
                  <a  href="#">Apoint </a>
                   <ul class="sub-menu">
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Property Sales</a></li>
                    <li><a href="#">Property Buy</a></li>
                    <li><a href="#">Special Requirement</a></li>
                  </ul>
                 </li>

                 <li class="parent">
                  <a  href="#">Seller </a>
                   <ul class="sub-menu">
                    <li><a href="#">submit property</a></li>
                    <li><a href="#">mange property</a></li>
                    <li><a href="#">profile</a></li>
                  </ul>
                 </li>



                <li><a  href="#"> Agent</a></li>
                <li><a  href="#"> CONTACT</a></li>
              </ul>

              
              <div id="main-menu-handle" class="responsive-menu"><i class="fa fa-bars"></i></div><!-- Mobile Menu handle -->
              <a id="submit-property-link" class="btn" href="{{ URL::to('submit-property') }}"><span>{{trans('words.submit_property')}}</span></a>
              

          </nav>
                <!-- END of Main Menu -->

           
      <!-- End of Main Menu -->
    </div>
    
  </header>


