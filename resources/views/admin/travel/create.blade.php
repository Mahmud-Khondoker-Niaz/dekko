
@extends('admin.admin_app')

@section('content')
    @include('admin.includes.errors')
<div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Create new travel</h2>
        </div>
        <div class="card-body">
            <form action="{{route('travel.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="row">

                    <div class="col-lg-12">
                       
               
                        <div class="form-group">
                            <label for="formGroupExampleInput">Home Image *</label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image_home">
                                
                            </div>
                        </div>
                  
                        <div class="form-group">
                            <label for="formGroupExampleInput">Page Image *</label> <br>
                            <div class="form-group user_prfile">
                                <input type="file" class="form-control" name="image_page">
                                
                            </div>
                        </div>
               
          
             
              
                <div class="form-group">
                <label for="formGroupExampleInput2">Description  </label>
                    <textarea type="text" name="description" id="p-desc" class="form-control" placeholder="Please type description" row="10"></textarea>
                 
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


<script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>

 
 
 


@stop


