@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{ isset($type->types) ? trans('words.edit').': '. $type->types : trans('words.add').' '.' New Service' }}</h2>		
		<a href="{{ route('services') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>	  
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
            <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Name'}}</label>
                    <div class="col-sm-9">
                        <input type="text" name="service_name" class="form-control" placeholder="service name">
                    </div>
                </div>

               

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Cost (৳)'}}</label>
                    <div class="col-sm-9">
                        <input type="number" name="service_cost" class="form-control" placeholder="service cost">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Phone'}}</label>
                    <div class="col-sm-9">
                        <input type="number" name="service_phone" class="form-control" placeholder="service phone">
                    </div>
                </div>
                

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Category'}}</label>
                    <div class="col-sm-9">
                  
                        <select name="category_id" id="pcategory" class="form-control input-lg dynamic">
                            <option value="">Select Country</option>
                            @foreach($category_list as $category)
                            <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Sub Category'}}</label>
                    <div class="col-sm-9">
                        <select name="subcategory_id" id="subcategory" class="form-control">
                         <option>Select Subcategory</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Child Category'}}</label>
                    <div class="col-sm-9">

                        <select name="childcategory_id" id="childcategory" class="form-control input-lg">
                         <option>Select Childcategory</option> 
                        </select>

                    </div>
                </div>


                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Image'}}</label>
                    <div class="col-sm-9">
                        <input type="file" name="service_image" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-3 control-label">{{'Service Description'}}</label>
                    <div class="col-sm-9">
                        <textarea type="text" name="service_description" id="p-desc" class="form-control" placeholder="service description" row="10"></textarea>
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
$(document).ready(function(){

    $("#pcategory").on('change', function(){
       var cat_id = $("#pcategory").val();
       $.ajax({
        type: "GET",
            type:"GET",
            url:"{{ route('get.subcategory') }}",
            data: {cat_id:cat_id},
            success:function(data){
                $("#subcategory").html(data.html5);
            }
       });
    });

    $("#subcategory").on('change', function(){
       var sub_cat_id = $("#subcategory").val();
       $.ajax({
            type:"GET",
            url:"{{ route('get.child.subcategory') }}",
            data: {sub_cat_id:sub_cat_id},
            success:function(data){
                $("#childcategory").html(data.html6);
            }
       });
    });

});

</script>

@endsection