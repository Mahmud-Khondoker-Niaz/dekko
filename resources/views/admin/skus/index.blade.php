@extends("admin.admin_app")
@section('content')

<div id="main">
    <div class="page-header">
        
        <div class="pull-right">
            <a href="{{route('sku-post')}}" class="btn btn-primary">Add Sku <i class="fa fa-plus"></i></a>
        </div>
        <h2>All Skus</h2>
    </div>

     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>  
                              
                    <th>SKU</th>
                    <th scope="col">Brand</th>  
       
                    <th>weight</th>
                    <th scope="col">Image</th>
                  
                     
                    <th class="text-center width-100">{{trans('words.action')}}</th>
                </tr>
            </thead>

            <tbody>
           
         @foreach($skus as $sku)
               <tr>
                 
                <td>{{$sku->name}}</td>

                <td>
                 
                @if ($sku->productsbrand)
    {{$sku->productsbrand->name}}
@endif
        
<td>{{$sku->weight}} gm</td>
                   
                <td><img src="{{asset($sku->image)}}" alt="{{$sku->title}}" width="50px" height="50px"> </td>
                
                <td class="text-center">

                    <a href="{{route('sku.edit',['id'=>$sku->id])}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                    <a href="{{route('sku.delete',['id'=>$sku->id])}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>

                
                
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
