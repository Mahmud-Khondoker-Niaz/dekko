@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
 <div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit member: </h2>
        </div>
        <div class="card-body">
            <form action="{{route('team.update',['id'=>$team->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

               
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" name="name" value="{{$team->name}}" id="formGroupExampleInput" placeholder="Example input">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">Designation</label>
                    <input type="text" class="form-control" name="designation" value="{{$team->designation}}" id="formGroupExampleInput" placeholder="Example input">

                   
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="text" class="form-control" name="email" value="{{$team->email}}" id="formGroupExampleInput" placeholder="Example input">
                    
                   
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Linkdn</label>
                    <input type="text" class="form-control" name="linkdn" value="{{$team->linkdn}}" id="formGroupExampleInput" placeholder="Example input">
                    
                   
                </div>
                 <div class="form-group">
                    <label for="formGroupExampleInput2">Description</label>
                    <textarea class="form-control" id="p-desc" name="description"  value="{{$team->description}}">{{$team->description}}</textarea>
                    
                   
                </div>
               
                <div class="form-group">
                    <label for="formGroupExampleInput2">Image</label>
                    <input type="file" class="form-control" name="image"  value="{{$team->image}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($team->image)}}" width="100">
                    
                   
                </div>
                
                

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update" id="formGroupExampleInput2" placeholder="Another input">
</div>
      
            </form>
        </div>
    </div>
</div>

 

@stop
