@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{'New Location'}}</h2>
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
                
                <form action="{{route('upazila.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Upazila / Thana Name'}}</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="upazila name" id="lowertxt" onkeyup="return forceLower(this);">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Select District'}}</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="district_id">
                                <option value="1">Dhaka</option>
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

    //<script>
    //    function forceLower(strInput) 
    //    {
    //        strInput.value=strInput.value.toLowerCase();
    //    }
   //</script>
//
   // <style>
   //     #lowertxt {
   //        /* text-transform:lowercase;*/
       //    text-transform: capitalize;
      //   }
    //</style>

@endsection