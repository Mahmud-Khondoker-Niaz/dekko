@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
 <div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit post: {{$blog->title}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('blog.update',['id'=>$blog->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

               @if($blog->check==0)
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$blog->title}}" id="formGroupExampleInput" placeholder="Example input">
                </div>


                <div class="form-group">
                    <label for="formGroupExampleInput">Featured Image</label>
                    <input type="file" class="form-control" name="feature"  value="{{$blog->feature}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($blog->feature)}}" width="100">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Category</label>

                    <select class="form-control" id="blogcategory_id" name="blogcategory_id">
                        @foreach($blogcategories as $category)
                            <option value="{{$category->id}}"
                                    @if($blog->blogcategory->id == $category->id)
                                    selected
                                    @endif;

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

              

                <div class="form-group">
                    <label for="formGroupExampleInput2">description</label>
                    <textarea class="form-control" id="p-desc" name="description"  value="{{$blog->description}}">{{$blog->description}}</textarea>
                    
                   
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Author Image</label>
                    <input type="file" class="form-control" name="image"  value="{{$blog->image}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($blog->image)}}" width="100">
                    
                   
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Author name</label>
                    <textarea class="form-control" id="p-desc" name="name"  value="{{$blog->name}}">{{$blog->name}}</textarea>
                    
                   
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Designation</label>
                    <textarea class="form-control" id="p-desc" name="designation"  value="{{$blog->designation}}">{{$blog->designation}}</textarea>
                    
                   
                </div>
                

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="update" id="formGroupExampleInput2" placeholder="Another input">
                </div>
@else
       <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$blog->title}}" id="formGroupExampleInput" placeholder="Example input">
                </div>


                <div class="form-group">
                    <label for="formGroupExampleInput">Featured Image</label>
                    <input type="file" class="form-control" name="feature"  value="{{$blog->feature}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($blog->feature)}}" width="100">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Category</label>

                    <select class="form-control" id="blogcategory_id" name="blogcategory_id">
                        @foreach($blogcategories as $category)
                            <option value="{{$category->id}}"
                                    @if($blog->blogcategory->id == $category->id)
                                    selected
                                    @endif;

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

              

                <div class="form-group">
                    <label for="formGroupExampleInput2">description</label>
                    <textarea class="form-control" id="p-desc" name="description"  value="{{$blog->description}}">{{$blog->description}}</textarea>
</div>


<div class="form-group">
                    <input type="submit" class="btn btn-success" value="update" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                @endif
            </form>
        </div>
    </div>
</div>

 
<script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>
@stop
