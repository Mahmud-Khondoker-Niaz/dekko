@extends("admin.admin_app")

@section("content")

<div id="main">
	<div class="page-header">
		<h2> {{ isset($type->types) ? trans('words.edit').': '. $type->types : trans('words.add').' '.' New Child Category' }}</h2>
		
		<a href="{{ route('childcategory.index') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>
	  
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
                
                <form action="{{route('childcategory.store')}}" method="post" enctype="multipart/form-data">

                    {{csrf_field()}}


                    <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Category'}}</label>
                        <div class="col-sm-9">
                    
                            <select id="pcategory" class="form-control">
                                <option value="">Select Country</option>
                                @foreach($pcategories as $category)
                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Service Sub Category'}}</label>
                        <div class="col-sm-9">
                        <select name="service_subcategory_id" id="subcategory" class="form-control">
                            <option value="">Select Subcategory</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">{{'Sub Category Name'}}</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="sub cat name">
                        </div>
                    </div> 

                    
                    
                    <hr>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-sm-9 ">
                            <button type="submit" class="btn btn-primary">Submit Now</button>
                            
                        </div>
                    </div>
                
                </form>
            </div>
        </div>
   
    
</div>
<script>
$(document).ready(function(){

    $("#pcategory").on('change', function(){
       var cat_id = $("#pcategory").val();
       $.ajax({
        type: "GET",
            type:"GET",
            url:"{{ route('catget.subcategory') }}",
            data: {cat_id:cat_id},
            success:function(data){
                $("#subcategory").html(data.html5);
            }
       });
    });

});


</script>
@endsection