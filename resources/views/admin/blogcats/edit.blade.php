@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Update Category: {{$blogcategory->name}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('blogcategory.update',['id'=>$blogcategory->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="formGroupExampleInput">Cate name</label>
                    <input type="text" class="form-control" name="name" value="{{$blogcategory->name}}" id="formGroupExampleInput" placeholder="Example input">
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update category" id="formGroupExampleInput2" placeholder="Another input">
                </div>

            </form>
        </div>
    </div>
@stop