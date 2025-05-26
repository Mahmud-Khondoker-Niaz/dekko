@extends('admin.admin_app')

@section('content')

@include('admin.includes.errors')
 <div id="main">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Edit Sku</h2>
        </div>
        <div class="card-body">
            <form action="{{route('sku.update',['id'=>$sku->id])}}"  method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" name="name" value=" {{$sku->name}}" id="formGroupExampleInput" placeholder="Example input">
                </div>
          

                <div class="form-group">
                    <label for="formGroupExampleInput">imaged Image</label>
                    <input type="file" class="form-control" name="image"  value="{{$sku->image}}" id="formGroupExampleInput" placeholder="Example input">
                    <img src="{{asset($sku->image)}}" width="100">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Select a Brand</label>

                    <select class="form-control" id="productsbrand_id" name="productsbrand_id">
                    @foreach($brands as $brand)
                            <option value="{{$brand->id}}"
                                    @if($sku->productsbrand_id==$brand->id)
                                    selected
                                    @endif;

                            >{{$brand->name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">weight</label>
                    <input type="text" class="form-control" name="weight" value="{{$sku->weight}}" id="formGroupExampleInput" placeholder="Example input">
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">description</label>
                    <textarea class="form-control" id="p-desc" name="description"  value="{{$sku->description}}">{{$sku->description}}</textarea>
                    
                   
                </div>
                
               
         

                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Submit" id="formGroupExampleInput2" placeholder="Another input">
                </div>
                </form>
</div>
</div>
</div>
<script type="text/javascript" src="{{ URL::asset('site_assets/ckeditor/ckeditor.js') }}"></script>
<script>CKEDITOR.replace( 'p-desc' );</script>
 

@stop
