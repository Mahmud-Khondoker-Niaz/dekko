@extends('admin.admin_app')

@section('content')

    @include('admin.includes.errors')
    <br>
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create new brand</h2>
        </div>
        <div class="card-body">
            <form action="{{route('productsbrand.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
             

          <div class="form-group">
                    <label for="formGroupExampleInput">Select a Category *</label>

                    <select class="form-control" id="category_id" name="productscategory_id">
        <option value="" disabled selected>Select a Category</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
                </div>

                <div class="form-group">
    <label for="formGroupExampleInput">Select a Sub-Category *</label>
    <select class="form-control" id="brandcategory_id" name="brandcategory_id">
        <option value="" disabled selected>Select a Sub-Category</option>
        @foreach($categories as $category)
            @foreach($category->brandcategory as $subcategory)
                <option value="{{$subcategory->id}}" data-category="{{$category->id}}" style="display: none;">{{$subcategory->name}}</option>
            @endforeach
        @endforeach
        <option value="0" data-category="0">No Sub-Category</option>
    </select>
</div>
  

                <div class="form-group">
                    <label for="formGroupExampleInput">brande name</label>
                    <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="brand name">
                </div>
               
                        <div class="form-group">
                            <label for="formGroupExampleInput">Brand Image *</label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image">
                                
                            </div>
                        </div>
                        
                <div class="form-group">
                    <label for="formGroupExampleInput2"> Description * </label>
                    <!-- <textarea type="text" name="description" id="p-desc" class="form-control" placeholder="Typing escription" row="10"></textarea> -->
                    <textarea type="text" name="description" id="p-desc" class="form-control" placeholder="service description" row="10"></textarea>

                </div>
                <div class="form-group">
                            <label for="formGroupExampleInput">Brand Feature *</label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="feature">
                                
                            </div>
                        </div>
                <div class="form-group">
                    <div class="google-ads" style="width: 100%; max-height: 100px;">

                    </div>
                <div class="form-group" style="margin-bottom:100px;">
                    <input type="submit" class="btn btn-success" value="store brand" id="formGroupExampleInput2" placeholder="Another input">
                </div>


            </form>
 
        </div>
</div>
    </div>
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

