@extends("app")
@section("content")

@if(getcong('home_properties_layout')=='slider')

<!-- @include("_particles.slider") -->

@else

@include("_particles.mapsearch")

@endif

<div class="slider-container">
<div class="slider">
        @foreach(\App\Slider::orderBy('id', 'desc')->get() as $index => $slide)
            <div class="slide" id="slide{{ $index }}">
                <img src="{{ URL::asset('upload/slides/'.$slide->image_name.'.jpg') }}" alt="Slide Image">
            </div>
        @endforeach
       
    </div>
   
  </div>
 
<script>
  const slider = document.querySelector('.slider');

if (slider) {
    slider.classList.add('slide-animation');
}
  </script>
  
  <br>
  <!--About Header-->      
  <section class="about-section">
        <div class="container">
          <h2 class="about-heading">Our Product Categories</h2>
        </div>
      </section>

 <!--Nav--> 
<nav class="brandlinks">
@php     $all_cats = \App\Productscategory::orderBy('name', 'asc')->get();
 @endphp
@foreach($all_cats as $result)
<a href="{{route('category.single',['slug'=>$result->slug])}}" class="{{ $result->slug == $result->slug ? 'active' : '' }}" style="font-size:20px;"><b>{{$result->name}}</b></a>

@endforeach
</nav>


<!-- Recent Properties -->

  <section class="Home-page-section boxed-view clearfix">

                    <div class="inner-container container">
                      <div class="row">
                  
                    </div> <!--container-->

                    <!--#propmotions-slider-->
                  
                                        <section id="propmotions-slider" class="boxed-view clearfix" style="border-radius: 10px; background:#f9f9f9;  position: relative;">
                                      <div class="inner-container container">
                                        <div class="owl-carousel-ads-slider owl-theme" style="margin-right: 15px; margin-left: -1px;">
                                          @foreach(\App\Productscategory::orderBy('name', 'asc')->get() as $category)
                                            @foreach($category->productsbrand->sortBy('name') as $slide)
                                              <div class="items">
                                                <a href="{{ route('brand.single', ['id' => $slide->id]) }}">
                                                  <div class="round-image-container">
                                                    <img class="lazyOwl" data-src="{{ URL::asset($slide->image) }}" alt="">
                                                    <div class="overlay"></div>

                                                  </div>
                                                </a>
                                              </div>
                                            @endforeach
                                          @endforeach
                                        </div>
                                      </div>
                                    </section>
                              <!--#propmotions-slider-->
                              <br></br>

                <!--#counting-slider-->
                <br></br>
                <div class="container">
                        <div class="row">
                            <div class="col-md-3 visitors">
                                <div class="counter visitors">
                                    <h2>Since</h2>
                                    <h1><span id="visitorCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 brand">
                                <div class="counter brand">
                                    <h2>Brand</h2>
                                    <h1><span id="brandCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 sku">
                                <div class="counter sku">
                                    <h2>Units</h2>
                                    <h1><span id="skuCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 district">
                                <div class="counter district">
                                    <h2>Employees</h2>
                                    <h1><span id="districtCount">0</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                                <!--About Header--> 
                                      <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading">About Dekko Foods Ltd</h2>
                                        </div>
                                      </section>
                                      <!--4 Sections--> 
                                <section class="custom-listing boxed-view clearfix">
                                          <div class="inner-container clearfix">
                                          
                                            
                                            @php
                                              $pages = \App\Pages::where('status', '1')->orderBy('id')->get();
                                              $customTitles = [
                                                'History',
                                                'Hiring',
                                                'Mission and Vision',
                                                'Let You Know'
                                                
                                              
                                              ];
                                            @endphp
                                            
                                            @foreach ($pages as $index => $page)
                                              <div class="custom-box col-xs-12 col-sm-6 wow fadeInUp">
                                                <div class="inner-box">
                                                  <div class="custom-page-box">
                                                    <a href="{{ URL::to('page/'.$page->page_slug) }}" class="custom-title-box">
                                                      {{ isset($customTitles[$index]) ? $customTitles[$index] : $page->page_title }}
                                                    </a>
                                                    <div class="custom-content-box">
                                                      {!! substr(strip_tags($page->page_content), 0, 100) !!}
                                                      @if (strlen(strip_tags($page->page_content)) > 100) ... @endif
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            @endforeach
                                            
                                          </div>
                                        </section>


                                      <!--About Header--> 
                                      <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading">{{getcong('footer_widget1_title')}}</h2>
                                        </div>
                                      </section>
                    
                    



    <div class="inner-container container" style="margin-top: 50px;
       margin-bottom: 50px;">
          <div class="top-section clearfix">
         @php
            $result = \App\Blog::latest()->first();
           @endphp
         @if($result)
          <div class="col-xs-12 col-md-6 col-sm-12">
            <img src="{{URL::asset($result->feature)}}" class="blogimage" alt="{{$result->title}}" style="max-width: 100%; height: auto; border-radius:15px; "> 
           </div>
             <div class="col-xs-12 col-md-6 col-sm-12"">
            <h1> {{$result->title}}</h1>
             <p style="color: rgb(170, 170, 170);"> {{$result->created_at->format('j-F-Y')}}</p>

     <p class="details" style="max-width: 75rem;
         margin: 0 auto clamp(30px,calc(30px + ((1vw - 3.75px) * 1.2944983819)),50px);
           font-size: clamp(16px,calc(16px + ((1vw - 3.75px) * .5177993528)),24px);
              color: #2b2b2b; text-align: justify; opacity: 10; font-variant: small-caps;" > {!! Str::limit($result->description,350) !!}
         </p>
         <a href="{{route('blog.single',['id'=> $result->id]) }}" class="btn more-link" >Read More</a>

      </div>
       @endif
     
      </div>
    
     </div>
       
      </div>
       </div>


                                         <!--Bolg-->  <section id="propmotions-slider" class="boxed-view clearfix" style="background-color: #fbfdff;  position: relative;">

                                                            <div class="inner-container container">
                                                                <div class="owl-carousel-ads-slider owl-theme">

                                                                          @foreach(\App\Blog::orderBy('id','ASC')->get() as $result)
                                                                        <div class="items" >
                                                                        <a href="{{route('blog.single',['id'=> $result->id]) }}" >
                                                                    <p style="color: rgb(170, 170, 170);"> {{$result->created_at->format('j-F-Y')}}</p>

                                                                          <img src="{{URL::asset($result->feature)}}" class="blogimage" alt="{{$result->title}}"  style=" height: 250px;
                                                              width: 350px;" >

                                                                      
                                                                        </a>
                                                                      <br></br>
                                                                    <a href="{{route('blog.single',['id'=> $result->id]) }}" class="title" style="font-size:14px; color:black;">{{ Str::limit($result->title,80) }}</a>

                                                                      
                                                                      </div>

                                                                      @endforeach
                                                            </div>
                                                            </div>

                                                            </section> <!--Bolg-->




                            <!-- Board Of directors -->
                                              
                            <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading">Management Profile</h2>
                                        </div>
                                      </section>
<section id="board-of-directors" class="bg-blue text-white text-center py-5">

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="{{ url('/upload/chairman.jpg') }}" alt="Chairman" class="director-image">
                                                                <h3>Shahadat Hossain Kiron</h3>
                                                                <p>Chairman</p>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="{{ url('/upload/MD.webp') }}" alt=" Managing Director" class="director-image">
                                                                <h3>Kalpan Hossain</h3>
                                                                <p>Managing Director</p>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="{{ url('/upload/D.webp') }}" alt=" Director" class="director-image">
                                                                <h3>Kashif Hossain</h3>
                                                                <p>Director</p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </section>
                                            <!-- Board Of directors -->
                    

    </section>
 
  <!-- End of Recent Properties -->






<!-- Number Counting Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to animate number counting
        function animateValue(element, start, end, duration) {
            let current = start;
            const range = end - start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / range));
            
            const timer = setInterval(() => {
                current += increment;
                element.textContent = current.toLocaleString(); // Format with commas
                if (current === end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // Trigger counting animation on page load
        document.addEventListener('DOMContentLoaded', () => {
            const visitorCountElement = document.getElementById('visitorCount');
            const brandCountElement = document.getElementById('brandCount');
            const skuCountElement = document.getElementById('skuCount');
            const districtCountElement = document.getElementById('districtCount');

            animateValue(visitorCountElement, 0, 2002, 2000); // Adjust values and duration as needed
            animateValue(brandCountElement, 0, 27, 2000);
            animateValue(skuCountElement, 0, 50, 2000);
            animateValue(districtCountElement, 0, 5000, 2000);
        });
    </script>
<!-- Number Counting Script -->

  

@endsection


