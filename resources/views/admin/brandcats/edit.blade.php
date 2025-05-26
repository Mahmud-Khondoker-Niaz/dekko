@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Update Sub-Category: {{$brandcategory->name}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('brandcategory.update',['id'=>$brandcategory->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Category</label>

                    <select class="form-control" id="productscategory_id" name="productscategory_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"

                                    @if($brandcategory->productscategory && $brandcategory->productscategory->id == $category->id)

                                    
    selected
@endif

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Cate name</label>
                    <input type="text" class="form-control" name="name" value="{{$brandcategory->name}}" id="formGroupExampleInput" placeholder="Example input">
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Update category" id="formGroupExampleInput2" placeholder="Another input">
                </div>

            </form>
        </div>
    </div>
@stop