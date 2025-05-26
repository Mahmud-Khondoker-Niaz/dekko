@extends('admin.admin_app')

@section('content')

    @include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create new Category</h2>
        </div>
        <div class="card-body">
            <form action="{{route('blogcategory.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="formGroupExampleInput">Cate name</label>
                    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="cat name">
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="store category" id="formGroupExampleInput2" placeholder="Another input">
                </div>

            </form>
        </div>
    </div>
@stop