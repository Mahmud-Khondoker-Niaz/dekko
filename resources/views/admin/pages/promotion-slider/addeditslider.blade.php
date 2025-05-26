@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($slide->slider_title) ? trans('words.edit').': '. $slide->slider_title : trans('words.add').' '.trans('words.slide') }}</h2>
		
		<a href="{{ URL::to('admin/slider') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>
	  
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
                {!! Form::open(array('url' => array('admin/promotionslider/addslide'),'class'=>'form-horizontal padding-15','name'=>'user_form','id'=>'user_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 
                <input type="hidden" name="id" value="{{ isset($slide->id) ? $slide->id : null }}">
                  
                
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">{{trans('words.slider_name')}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="name" value="{{ isset($slide->name) ? $slide->name : null }}" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">{{'Slider Link'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="link" value="{{ isset($slide->link) ? $slide->link : null }}" class="form-control">
                    </div>
                </div>

				 
				<div class="form-group">
                    <label for="avatar" class="col-sm-3 control-label">{{trans('words.slider_image')}}</label>
                    <div class="col-sm-9">
                        <div class="media">
                            <div class="media-left">
                                @if(isset($slide->photo))
                                 
									<img src="{{ URL::asset($slide->photo) }}" width="200" alt="person">
								@endif
								                                
                            </div>
                            <div class="media-body media-middle">
                                <input type="file" name="photo" class="filestyle"> 
                            </div>
                        </div>
	
                    </div>
                </div>
				
				  
                 
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                    	<button type="submit" class="btn btn-primary">{{ isset($slide->slider_title) ? trans('words.save_changes') : trans('words.submit') }}</button>
                         
                    </div>
                </div>
                
                {!! Form::close() !!} 
            </div>
        </div>
   
    
</div>

@endsection