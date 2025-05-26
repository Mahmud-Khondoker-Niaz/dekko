@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{'Update Location' }}</h2>
		
		<a href="{{ route('upazila.index') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>
	  
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
                <form action="{{route('upazila.update',['id'=>$upazila->id])}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Upazila'}}</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{ isset($upazila->name) ? $upazila->name : null }}" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Select Parent Category'}}</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="district_id">
                                <option  value="1" @if( $upazila->district_id == 1) selected @endif>Dhaka</option>
                            </select>    
                        </div>
                    </div>
                    
                    
                    <div class="form-group row">
                        <div class="col-md-offset-3 col-sm-9 ">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
   
    
</div>

@endsection