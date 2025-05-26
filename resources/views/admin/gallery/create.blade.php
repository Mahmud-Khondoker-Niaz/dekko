
@extends('admin.admin_app')

@section('content')
    @include('admin.includes.errors')
<div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Posting new image</h2>
        </div>
        <div class="card-body">
            <form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Caption</label>
                            <input type="text" class="form-control" name="caption" id="formGroupExampleInput" placeholder="Type Caption">
                        </div>
                    
                  
                    
   
   
                 
                        <div class="form-group">
                            <label for="formGroupExampleInput"> Image </label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image">
                                
                            </div>
                        </div>
                  

               
                <div class="form-group">
                    <label for="formGroupExampleInput2">Description * </label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Type Description" >
                 
                </div>
           
                <div class="form-group">
                    <div class="google-ads" style="width: 100%; max-height: 100px;">

                    </div>
                    <div class="submit-btn">
                        <input type="submit"  class="btn btn-success" value="Click To Submit" id="formGroupExampleInput2" placeholder="Another input">
                    </div>
                </div>   
</div>



            </form>
        </div>
    </div>
 </div>




 
 
 


@stop


