@extends("admin.admin_app")
@section('content')

<div id="main">
    <div class="page-header">
        
        <div class="pull-right">
            <a href="{{route('blogcategory.create')}}" class="btn btn-primary">Add Category <i class="fa fa-plus"></i></a>
        </div>
        <h2>All categories</h2>
    </div>

     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>                    
                    <th>{{'Category'}}</th>
                     
                    <th class="text-center width-100">{{trans('words.action')}}</th>
                </tr>
            </thead>

            <tbody>
           
                @foreach($blogcategories as $category)
               <tr>
                 
                <td>{{$category->name}}</td>
                
                <td class="text-center">

                    <a href="{{route('blogcategory.edit',['id'=>$category->id])}}" class="btn btn-icon waves-effect waves-light btn-success m-b-5 m-r-5" data-toggle="tooltip" title="{{trans('words.edit')}}"> <i class="fa fa-edit"></i> </a>
                    <a href="{{route('blogcategory.delete',['id'=>$category->id])}}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>

                
                
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
