@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
 <div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit image: </h2>
        </div>
        <div class="card-body">
            <form action="{{route('gallery.update',['id'=>$gallery->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

               
                <div class="form-group">
                    <label for="formGroupExampleInput">Caption</label>
                    <input type="text" class="form-control" name="caption" value="{{$gallery->caption}}" id="formGroupExampleInput" placeholder="Example input">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <input type="text" class="form-control" name="description" value="{{$gallery->description}}" id="formGroupExampleInput" placeholder="Example input">

                   
                </div>
            
               
                <div class="form-group">
                    <label for="formGroupExampleInput2">Image</label>
                    <input type="file" class="form-control" name="image"  value="{{$gallery->image}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($gallery->image)}}" width="100">
                    
                   
                </div>
                
                

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update" id="formGroupExampleInput2" placeholder="Another input">
</div>
      
            </form>
        </div>
    </div>
</div>

 

@stop
