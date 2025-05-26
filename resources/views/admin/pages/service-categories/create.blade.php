@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($type->types) ? trans('words.edit').': '. $type->types : trans('words.add').' '.'Add New Category' }}</h2>
		
		<a href="{{ route('category.index') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>
	  
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
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}
                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Category'}}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($type->name) ? $type->name : null }}" class="form-control">
                    </div>
                </div>
                
                <hr>
                <div class="form-group row">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($type->id) ? trans('words.save_changes') : trans('words.submit') }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection