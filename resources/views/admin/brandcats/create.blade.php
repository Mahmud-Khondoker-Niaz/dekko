@extends('admin.admin_app')

@section('content')

    @include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create new Sub-Category</h2>
        </div>
        <div class="card-body">
            <form action="{{route('brandcategory.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Category *</label>

                    <select class="form-control" id="category_id" name="productscategory_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="formGroupExampleInput">Sub-Category Name</label>
                    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Sub-category Name">
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="store category" id="formGroupExampleInput2" placeholder="Another input">
                </div>

            </form>
        </div>
    </div>
@stop