@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{ isset($type->types) ? trans('words.edit').': '. $type->types : trans('words.add').' '.' New Post' }}</h2>		
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
            <form action="{{route('frontd.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Title'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" placeholder="service Title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Post Image'}}</label>
                    <div class="col-sm-9">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Post Link'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="link" class="form-control" placeholder="Link url">
                    </div>
                </div>




                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Post Section '}}</label>
                    <div class="col-sm-9">
                  
                        <select name="type" id="post_type" class="form-control">
                            <option value="">Select Post Section</option>
                            <option value="on sale left ads">On Sale Left ads</option>
                            <option value="on sale bottom ads">On Sale Bottom ads</option>
                            <option value="on sale property">On Sale Property</option>
                            <option value="premium collection">Premium Collection</option>
                            <option value="verified plots">Verified Plots</option>
                            <option value="service">Service</option>
                            <option value="commercial projects">Commercial Projects</option>
                            <option value="sidebar ads">Sidebar Ads Banner</option>
			    <option value="home-sidebar-ads1">Home  Sidebar Ads1</option>
                        </select>

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


@endsection