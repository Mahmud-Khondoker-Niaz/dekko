
<style>
.cat-head
{
font-family: 'Open Sans', sans-serif;
  font-style: normal;
      font-weight: 1600;

}


.author-image {
    width: 50px;
    height: 50px;

    float: left;
}

img {
    border-radius: 50%;
}

.authorname {
    float: left;
    margin-left: 15px;
}

.authorname>h4 {

    margin: 5px 0px;


}

.time {
    font-size: 11px;
    font-style: italic;
    color: #aaaa;
}





</style>
@extends("app")

@section('head_title', stripslashes($blog->title) .' | '.getcong('site_name') )
@section('head_description', substr(strip_tags($blog->description),0,200))
@section('head_image', asset($blog->feature))
@section('head_url', Request::url())

@section("content")
   


    
 <section class="main-container container">


  	
    <div class="col-sm-12">
 
        <div class="content-box" style="padding:0;
    background-color: rgba(0,0,0,0.0);">
       <div class="blog-thumbs">
				<br>
                <h1 class="blog-title" style="text-align:center;   margin-top:80px;margin-bottom:30px;;
    font-size: 34px;
    line-height: 50px;"><b>{{$blog->title}}</b></h1>
             <img src="{{asset($blog->feature)}}" width="1600" height="836" alt="{{$blog->title}}" class="img-thumbnail">    
            </div>
  		 <div class="single-blog-posts-body">
           
			<br>
            <div class="blog-contents">
				<!-- <h1 class="blog-title" style="text-align:center;">{{$blog->title}}</h1> -->
               <!-- <ul class="post-info-header list-inline">
                  
                  <li>Posted on:  <b>{{$blog->created_at->format('d-m-y')}}</b></li>
                </ul>-->
				
				<br>
			@if($blog->check == 1)
<div class="author-box">
	<div class="row">
		<div class="col-md-3">
			<div class="author-img text-center">
				 <img src="{{ URL::asset('site_assets/img/dekko-logo.png') }}" class="rounded-circle" alt="author image" style=" height: 120px; ">
			</div>
		</div>
		<br>
		<div class="col-md-9">
			<div class="author-info" style="margin-top:50px;">
				<small><em>Written by,</em></small>
				<p><strong>Dekko Foods Ltd,</strong><br><small>Admin</small></p>
			</div>
		</div>
	</div>
</div>
@else
<div class="author-box">
					<div class="row">
						<div class="col-md-3">
						<div class="author-img text-center">
								 <img src="{{   asset($blog->image)	}}" class="rounded-circle" alt="author image" style=" height: 120px; ">
							</div>
						</div>
<br>
						<div class="col-md-9">
							<div class="author-info" style="margin-top:50px;">
								<small><em>Written by,</em></small>

								<p><strong>{{$blog->name}}</strong><br><small>{{$blog->designation}}.</small></p>

			
							
							</div>
						</div>
					</div>
					
				</div>
@endif
                <span class="blog-description" style=" text-align: justify;">
                    {!! $blog->description!!}
                </span>
            </div>


                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}

                        @endif
                    </div>



<br>
                  
           
            <div class="related-post mt-3">
                <div class="heading">
                    <h4 class="heading-title">Related Posts</h4>
                </div>
                <div class="row" style="margin-bottom:20px;">
                    @foreach($related->where('status',1)->take(4) as $row)
                    <div class="col-md-3">
                        <div class="card relatedpost">
                         <a href="{{route('blog.single',['id'=> $row->id]) }}">        
                          <img src="{{asset($row->feature)}}" class="card-img-top img-thumbnail" alt="{{$row->title}}">
                          <div class="card-body">
                            <h4 class="card-title" style="color: #000;font-weight: bold;">{{$row->title}}</h4>
                          </div>
                          </a>
                        </div>
                    </div>
                    @endforeach
                </div>

             </div> <!-- related-post-->
             
              
        </div>
   
    </div>
    </div>
  
  </section>

 
 
@endsection
