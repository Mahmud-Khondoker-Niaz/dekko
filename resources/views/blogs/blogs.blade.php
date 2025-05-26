<style>

.blog-pagination:hover {
  background-color: #f2f2f2;
}

.blog-pagination.active {
  background-color: #333;
  color: #fff;
}
.blog-pagination{
  justify-content: center; 
  display: flex; 
  margin-bottom: 100px; 
  border-radius: 4px;
}

</style>

@extends("app")


@section('head_title', trans('Blog').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
 

    @if($blogs->count()>0)
              @foreach($blogs as $result)
    <div class="inner-container container" style="margin-top: 50px;
        margin-bottom: 50px;">
 
      <div class="top-section clearfix">

              <div class="col-xs-12 col-md-6 col-sm-12">
              <a href="{{route('blog.single',['id'=> $result->id]) }}">   <img src="{{URL::asset($result->feature)}}" class="blogimage" alt="{{$result->title}}" style="max-width: 100%; height: auto; border-top-left-radius: 80px 80px;"> 
</a>  
            </div>
                <!-- Description-->
                <div class="col-xs-12 col-md-6 col-sm-12"">
                    <h1>  {{$result->title}} </h1>
                    <p style="color: rgb(170, 170, 170);"> {{$result->created_at->format('j-F-Y')}}</p>
                  <p class="details" style="max-width: 75rem;
                    margin: 0 auto clamp(30px,calc(30px + ((1vw - 3.75px) * 1.2944983819)),50px);
                    font-size: clamp(16px,calc(16px + ((1vw - 3.75px) * .5177993528)),24px);
                    color: #2b2b2b; text-align: justify; opacity: 10; font-variant: small-caps;" > {!! Str::limit($result->description,250) !!}
                  </p>
                  <a href="{{route('blog.single',['id'=> $result->id ]) }}" class="btn more-link" >Read More</a>

                </div>
                <!-- End Description-->
       
        
      </div>
     
    </div>

    @endforeach
            @endif

      

    
      
            


        <!-- Pagination -->
        <div class="blog-pagination">
            {{ $blogs->links() }}
        </div>
        <!-- End of Pagination -->

      </section>
      
      </div>
      
      <!-- End of Properties -->
    </div>
  
  </section>

 
 
@endsection
