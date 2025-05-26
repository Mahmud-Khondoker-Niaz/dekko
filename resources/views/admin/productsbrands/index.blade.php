@extends("admin.admin_app")
@section('content')

<div id="main">
    <div class="page-header">
        
        <div class="pull-right">
            <a href="{{route('productsbrand.create')}}" class="btn btn-primary">Add brand <i class="fa fa-plus"></i></a>
        </div>
        <h2>All brands</h2>
    </div>

     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>  
                              
                    <th>Brand</th>
                    <th scope="col">Category</th>  
                    <th scope="col"> SUb-Category</th>

                    <th scope="col">Image</th>
                  
                     
                    <th class="text-center width-100">{{trans('words.action')}}</th>
                </tr>
            </thead>

            <tbody>
           
                @foreach($productsbrands as $brand)
               <tr>
                 
                <td>{{$brand->name}}</td>
                <td>
               
                @if ($brand->productscategory)
    {{$brand->productscategory->name}}
@endif
         

                </td>
 <td>
                    
                    @foreach($brandcategories as $category)
        @if($brand->brandcategory && $brand->brandcategory->id == $category->id)
            {{$category->name}}
        @endif
    @endforeach
    
                    </td>
               

                <td><img src="{{asset($brand->image)}}" alt="{{$brand->title}}" width="50px" height="50px"> </td>
                
                <td class="text-center">

                    <a href="{{route('productsbrand.edit',['id'=>$brand->id])}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                    <a href="{{route('productsbrand.delete',['id'=>$brand->id])}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>

                
                
            </td>
                
            </tr>
              @endforeach

                 
             
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>





@stop
