@extends("app")

@section('head_title', trans('Your Requirements').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
<section class="breadcrumb-box" data-parallax="scroll" >
    <div class="inner-container container">
      
    </div>
  </section>
<style type="text/css">
 @media (max-width: 991px) {
    .mobile-only {
        display:block !important;
    }
 
    .desktop-only {
        display:none !important;
    }
} 

</style> 

 <script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>


<!-- begin:content -->
    <section class="main-container container">
    <div class="descriptive-section">
      <h2 class="hsq-heading type-1">Submit Your Requirements</h2>
 
         @if(Session::has('success'))
                  <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                      {{ Session::get('success') }}
                  </div>
        @endif
 
    </div>
    <div class="submit-main-box clearfix">
    <form action="{{route('add_property.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

        <div class="row t-sec">
          <div class="col-md-12 l-sec">
            <div class="information-box">
              <h3>{{trans('words.basic_details')}}</h3>

                <div class="field-row">
                <div class="col-md-4">
                  <input type="text" placeholder="Your Name" name="name" id="p-title" >
                  @if ($errors->has('name'))
                    <span style="color:#fb0303">
                        {{ $errors->first('name') }}
                    </span>
                 @endif
</div>
                
                <div class="col-md-4">
                  <input type="text" placeholder="Contact Number" name="number" id="p-title" >
                  @if ($errors->has('number'))
                    <span style="color:#fb0303">
                        {{ $errors->first('number') }}
                    </span>
                 @endif
                 </div>
                    <div class="col-md-4">
                      <input type="text" name="size"  id="p-title"
                           placeholder="Topic" value="{{ old('rate_per_sft') }}">  
                    </div>
                 
</div>

</div>
<div class="information-box">
<div class="field-row clearfix">
<div class="col-md-12">
                <input type="text" placeholder="{{trans('words.address')}}" name="address" id="address" value="{{ old('address') }}">
                @if ($errors->has('address'))
                    <span style="color:#fb0303">
                        {{ $errors->first('address') }}
                    </span>
                 @endif

            </div>
</div>
</div>


</div>




 
    
               


              </div>
            </div>

            <div class="information-box">
              <h3>{{ trans('words.featured_image') }}</h3>
                <div class="box-content">
                   
                    <input type="file" name="featured_image" id="featured_image" style="color: green;padding: 5px;border: 1px dashed #123456;background-color: #f9ffe5;"/><br/>
                   @if ($errors->has('featured_image'))
                    <span style="color:#fb0303">
                        {{ $errors->first('featured_image') }}
                    </span>
                 @endif
                </div>    
            </div>
           
            <div class="information-box">
                <h3>{{trans('words.description')}}</h3>
                <div class="box-content">
                    <div class="field-row">
                      <textarea name="description" id="p-desc" placeholder="{{trans('words.description')}}">{{ old('description') }}</textarea>
                      @if ($errors->has('description'))
                        <span style="color:#fb0303">
                            {{ $errors->first('description') }}
                        </span>
                     @endif
                     <script>CKEDITOR.replace( 'p-desc' );</script>
                    </div>
                </div>  
            </div> 

          </div>

                   
      
       
        

            <link rel="stylesheet" href="{{ URL::asset('site_assets/css/gallery_style.css') }}">
          
            <div class="b-sec" align="center"><br>
          <button type="submit" class="btn btn-lg submit">{{'SUBMIT NOW'}}</button>
        </div>
        
      </div>
      

        


      

      
        
</form>
    </div>
  </section>
    <!-- end:content -->
 
@endsection

@section('styles')
      <style>
        button.multiselect.dropdown-toggle.btn.btn-default {
            min-width: 495px;
            height: 45px;
            border: 2px solid #ddd;
        }
        li.multiselect-item.multiselect-filter .input-group .input-group-addon,
        input.form-control.multiselect-search {
            height: 30px !important;
        }
        body.submit-property .information-box .box-content .field-row .input-group .input-group-addon {
            font-size: 1.2em;
        }
      </style>          
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('site_assets/dist-select/css/bootstrap-multiselect.css') }}" type="text/css"/>
  @stop

  @section('scripts')

    <script>
        @if(Session::has('success'))
			toastr.success("{{Session::get('success')}}")
        @endif

        @if(Session::has('info'))
		    	toastr.info("{{Session::get('info')}}")
        @endif

        @if(Session::has('warning'))
		    	toastr.warning("{{Session::get('warning')}}")
        @endif

        @if(Session::has('error'))
		    	toastr.error("{{Session::get('error')}}")
        @endif

    </script>
@stop

