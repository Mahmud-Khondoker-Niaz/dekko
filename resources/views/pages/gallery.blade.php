@extends("app")

@section('head_title', trans('Gallery').' | '.getcong('site_name') )
@section('head_url', Request::url())
<style>


div.gallery:hover {
  border: 1px solid #037a6a;
  
}

div.gallery img {
  width: 100%;
  height: auto;
}


</style>
@section("content")


 

  

  <div class="property-listing">
                  <div class="row">
                    @foreach($galleries->where('status',1) as $i => $gallery) 
                   <div class="col-md-4">
                      <div class="prod-img boxShadow"> 
                          <div class="verticale-view wow fadeInUp">
                            <div class="row no-gutters">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="verticale-view-left">
      
              @if($gallery->image)
              <a target="_blank" href="{{ URL::asset($gallery->image)}}">
                <img src="{{ URL::asset($gallery->image)}}" alt="{{ $gallery->caption }}">
            </a>
              @else
              <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="{{ $gallery->name }}">
              @endif  
              

             <div class="bottom-sec">

                <h3 class="agent-name" >{{$gallery->caption}}</h3>
                
                
              </div>
</div>
</div>
</div>
</div>
</div>
</div>

      
    
    @endforeach 
   </div>
   
   </div>
    @include('_particles.pagination', ['paginator' => $galleries]) 
       
  </section>


  @endsection

  
  @section('styles')
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
  @stop

  @section('scripts')

    <script src="{{ URL::asset('site_assets/alert-toastr/toastr.js') }}"></script>

    <script>
        @if(Session::has('success'))
		    	toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('info'))
		    	toastr.info("{{Session::get('info')}}")
        @endif

        @if(Session::has('danger'))
		    	toastr.danger("{{Session::get('danger')}}")
        @endif
    </script>
@stop