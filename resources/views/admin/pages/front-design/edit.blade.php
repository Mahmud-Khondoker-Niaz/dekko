@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{  'Update Post' }}</h2>		
		<a href="{{ route('frontd.index') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>	  
	</div>

	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

	 @if(Session::has('flash_message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            {{ Session::get('flash_message') }}
        </div>
	@endif
   
    <div class="panel panel-default">
        <div class="panel-body">
        
            <form action="{{route('frontd.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Post Title'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="{{$data->title}}">
                    </div>
                </div>

               

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Post Link'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="link" class="form-control" value="{{$data->link}}">
                    </div>
                </div>

           

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Category'}}</label>
                    <div class="col-sm-9">
                  
                        <select name="type" id="type" class="form-control">
                            <option value="">Select Post Section</option>
                            <option value="on sale left ads" @if( $data->type == 'on sale left ads') selected @endif>On Sale Left ads</option>
                            <option value="on sale bottom ads" @if( $data->type == 'on sale bottom ads') selected @endif>On Sale Bottom ads</option>
                            <option value="on sale property" @if( $data->type == 'on sale property') selected @endif>On Sale Property</option>
                            <option value="premium collection" @if( $data->type == 'premium collection') selected @endif>Premium Collection</option>
                            <option value="verified plots" @if( $data->type == 'verified plots') selected @endif>Verified Plots</option>
                            <option value="service" @if( $data->type == 'service') selected @endif>Service</option>
                            <option value="commercial projects" @if( $data->type == 'commercial projects') selected @endif>Commercial Projects</option>
                            
                            <option value="sidebar ads" @if( $data->type == 'sidebar ads') selected @endif>Sidebar Ads Banner</option>
 			    <option value="home-sidebar-ads1" @if( $data->type == 'home-sidebar-ads1') selected @endif>home-sidebar-ads1</option>
                          
                        </select>

                    </div>
                </div>



                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'post Image'}}</label>
                    <div class="col-sm-9">
                    
                    <div style="width:10%; float:left">
                        <img src="{{url($data->image)}}" style="max-width:95%"/>
                    </div>
                    <div style="width:90%; float:left">
                        <input type="file" name="image" class="form-control" >
                    </div>    
                    </div>
                </div>

       

                
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">{{ isset($type->id) ? trans('words.save_changes') : trans('words.submit') }}</button>                        
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>

<script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>
<script>


</script>


@endsection