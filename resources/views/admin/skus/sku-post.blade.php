
@extends('admin.admin_app')

@section('content')
    @include('admin.includes.errors')
<div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create new post</h2>
        </div>
        <div class="card-body">
            <form action="{{route('sku.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

             
<div class="form-group">

<!-- <label for="formGroupExampleInput">Posted By</label><br> -->
<!-- <input type="checkbox" name="check" class="author_check" value="0">
 
  <label for="others"> Others</label>

  <input type="checkbox" name="check" class="author_check" value="1">
  <label for="admin"> Admin</label> -->
  </div>
                
                <div class="row">

               
              
<!-- <div id="dvPassport" style="display: none">
   
<div class="col-lg-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Author Name *</label>
                            <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Author Name">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Designation *</label>
                            <input type="text" class="form-control" name="designation" id="formGroupExampleInput" placeholder="Designation">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Author Image *</label>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image">
                                
                            </div>
                        </div>
                    </div> 
                  
</div> -->

              

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name *</label>
                            <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Sku Name">
                        </div>
                    </div>
                    <div>
                    
   </div>
   
   




                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="formGroupExampleInput">sku Image *</label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image">
                                
                            </div>
                        </div>
                    </div>

               <!-- </div> row -->

                <div class="col-lg-6">
                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Brand *</label>

                    <select class="form-control" id="category_id" name="productsbrand_id">
                        @foreach($brands as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
  </div>
  </div>
              
  <div class="form-group">
                    <label for="formGroupExampleInput2">Weight * </label>
                    <input type="text" class="form-control" name="weight" id="formGroupExampleInput" placeholder="Weight gm">
                 
                     <!--<textarea class="summernote form-control" placeholder="type description" name="description"></textarea>-->
                </div>


                <div class="form-group">
                    <label for="formGroupExampleInput2">Description * </label>
                    <textarea type="text" name="description" id="p-desc" class="form-control" placeholder="service description" row="10"></textarea>
                 
                     <!--<textarea class="summernote form-control" placeholder="type description" name="description"></textarea>-->
                </div>
               



   



                <div class="form-group">
                    <div class="google-ads" style="width: 100%; max-height: 100px;">

                    </div>
                    <div class="submit-btn">
                        <input type="submit"  class="btn btn-success" value="Click To Submit" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                </div>

            </form>
        </div>
    </div>
 </div>

 <script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>


 
 
 




@stop


