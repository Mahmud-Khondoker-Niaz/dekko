@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Update brand: {{$productsbrand->name}}</h2>
        </div>
        <div class="card-body">
            <form action="{{route('productsbrand.update',['id'=>$productsbrand->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
    <label for="formGroupExampleInput">Select a Category *</label>
    <select class="form-control" id="category_id" name="productscategory_id">
        <option value="" disabled>Select a Category</option>    
        @foreach($categories as $category)
            <option value="{{$category->id}}" @if($category->id == $productsbrand->productscategory_id) selected @endif>{{$category->name}}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="formGroupExampleInput">Select a Sub-Category *</label>
    <select class="form-control" id="brandcategory_id" name="brandcategory_id">
        <option value="" selected>Select a Sub-Category</option>
        @foreach($categories as $category)
            @foreach($category->brandcategory as $subcategory)
                <option value="{{$subcategory->id}}" data-category="{{$category->id}}" @if($subcategory->id == $productsbrand->brandcategory_id) selected @endif>{{$subcategory->name}}</option>
                
                @endforeach
                @if($category->brandcategory->isEmpty())
            <option value="" data-category="{{$category->id}}">No subcategories</option>
        @endif
        @endforeach
    </select>
</div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Brand name</label>
                    <input type="text" class="form-control" name="name" value="{{$productsbrand->name}}" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">imaged Image</label>
                    <input type="file" class="form-control" name="image"  value="{{$productsbrand->image}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($productsbrand->image)}}" width="100">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description * </label>
                    <textarea class="form-control" id="p-desc" name="description"  value="{{$productsbrand->description}}">{{$productsbrand->description}}</textarea>
                 
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Featured Image</label>
                    <input type="file" class="form-control" name="feature"  value="{{$productsbrand->feature}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($productsbrand->feature)}}" width="100">
                </div>


                <div class="form-group" style="margin-bottom:100px;">
                    <input type="submit" class="btn btn-success" value="Update brand" id="formGroupExampleInput2" placeholder="Another input">
                </div>

            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace( 'p-desc' );</script>
    <script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
    <script>CKEDITOR.replace( 'p-desc' );</script>

    <script>
    document.getElementById('category_id').addEventListener('change', function () {
        var selectedCategoryId = this.value;
        var subCategoryOptions = document.getElementById('brandcategory_id').options;

        for (var i = 0; i < subCategoryOptions.length; i++) {
            var subCategoryOption = subCategoryOptions[i];

            if (subCategoryOption.dataset.category === selectedCategoryId) {
                subCategoryOption.style.display = '';
            } else {
                subCategoryOption.style.display = 'none';
            }
        }
    });
</script>

@stop