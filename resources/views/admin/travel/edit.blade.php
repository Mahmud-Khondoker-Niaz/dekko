@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
 <div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit Travel Content: </h2>
        </div>
        <div class="card-body">
            <form action="{{route('travel.update',['id'=>$team->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

               
             
                <div class="form-group">
                    <label for="formGroupExampleInput2">Home Image</label>
                    <input type="file" class="form-control" name="image_home"  value="{{$team->image_home}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($team->image_home)}}" width="100">
                    
                   
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Page Image</label>
                    <input type="file" class="form-control" name="image_page"  value="{{$team->image_page}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($team->image_page)}}" width="100">
                    
                   
                </div>
              
                 <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <!--<textarea class="form-control" id="p-desc" name="description"  value="{{$team->description}}">{{$team->description}}</textarea>-->
                     <textarea id="elm1" name="description" class="form-control summernote" value="{{  stripslashes($team->description)}}">{{$team->description}} </textarea>
                    
                   
                </div>
               
               
                
                

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update" id="formGroupExampleInput2" placeholder="Another input">
</div>
      
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>
 

@stop
