<style>
.cat-head
{
	font-family: 'Open Sans', sans-serif;
      font-style: normal;
      font-weight: 1000;

}

ul.blog-sidebar-menu li:nth-child(even) {
background: red;
}

ul.blog-sidebar-menu li:nth-child(odd) {
background: red;
}
ul.blog-sidebar-menu li{

  transition: background-color 0.5s ease;
}

ul.blog-sidebar-menu li:hover{
    background: green ;
    opacity: 0.7;
    color: black;
}

.list-group-item{
  text-align: center;
  border-radius: 15px;
  margin-top: 10px;
  padding: 20px;
 
 
}
.list-group-item a{
  color:white;
}
.list-group-item a:hover{
  color:white;
}


.brandlinks a.active {
  border-bottom: 2px solid #f1e152;
  box-shadow: 0 2px 0 #f1e152;
  background-color:white;
  color:black;
    
    /* Add any other styles to highlight the active link */
}


</style>


@extends("app")

@section('head_title', stripslashes($brandcategory->name) .' | '.getcong('site_name') )
@section('head_url', Request::url())


@section("content")


  <section class="main-container container">

<br><br>
<h1 style="font-size: clamp(32px,calc(32px + ((1vw - 3.75px) * 1.8122977346)),60px); text-align:center;
    line-height: clamp(40px,calc(40px + ((1vw - 3.75px) * 2.5889967638)),80px);
    color: #646464 ;
    margin-bottom: 1.5rem; animation: showup 7s infinite; margin-top:30px;><b> <a href="{{URL::to('products') }}" class="{{classActivePathPublic('products')}}"> {{$brandcategory->name}}</a></b> </h1>
<br>
<nav class="brandlinks">
    @foreach($brandcategories as $brand)
        <a href="{{ route('brandcategory.single', ['slug' => $brand->slug]) }}" style="font-size:20px;"   class="{{ $brandcategory->slug == $brand->slug ? 'active' : '' }}">
{{ $brand->name }}</a>
    @endforeach
</nav>

<aside class="col-sm-3">
    <!--  <div class="sidebar-box sidebar-blog-cat">-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

<!-- Assuming you have a CSS file to style the menu, include it here -->
<link rel="stylesheet" href="path/to/your/style.css">

<!-- Assuming you have a CSS file to style the menu, include it here -->
<link rel="stylesheet" href="path/to/your/style.css">
<div class="category-menu">
    <!-- <h4 class="cat-head">All Categories</h4> -->
    <ul class="menu-list">
    @php $allcategories= \App\Productscategory::all(); @endphp
        @foreach($allcategories as $result)
            <li class="menu-item">
                <a href="{{ route('category.single',['slug'=>$result->slug]) }}" class="category-link">
                    <span class="category-name">{{ $result->name }}</span>
                    <span class="product-count">{{ $result->productsbrand->count() }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>

    </aside>

    <div class="col-sm-9">
      <!-- Properties -->
      <div class="content-box"style="border-radius: 20px; margin-bottom:20px; margin-top:20px;">
      <section class="property-listing boxed-view clearfix" style="margin-top: 0px;padding: 0px;">
        <div class="inner-container clearfix">
      		     
              @if($brandcategory->productsbrand->count()>0)
                @foreach($brandcategory->productsbrand as $result)
                
                <div class="property-box col-xs-12 col-sm-4  wow fadeInUp ">

                <div class="inner-box" style="margin: -10px; border-radius: 20px;">
        	          <a href="{{route('brand.single',['id'=>$result->id])}}" class="img-container">
                      @if($result->image)
        	            <img src="{{asset($result->image)}}" alt="{{$result->name}}" style="border-radius: 20px;">
        	         @endif
        	          </a>
        	         
                      <a style="text-align:center" href="{{route('brand.single',['id'=>$result->id])}}" class="title" style="font-size:14px;">{{ Str::limit($result->name,100) }}</a>
        	          
        	   
        	         
        	          </div>
        	        </div>
                  
    
               
                @endforeach
                    @else
                <h2 style="text-align:center"> Opps ! No Brand Found. </h2>
                @endif
                
                
            </div>
        </section>
       
        </div>
    </div> 
  </section>

 
 
@endsection
