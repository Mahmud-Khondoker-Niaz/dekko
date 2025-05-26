@extends('admin.admin_app')
@section('content')
                   

<div id="main">
<br>
 <div>
@if(session()->has('success'))
  <div class="alert alert-success">
  {{session()->get('success')}}
    
  @endif 
</div>
    <div class="page-header">
        
        <div class="pull-right">
            <a href="{{route('project-create')}}" class="btn btn-primary">Add Project <i class="fa fa-plus"></i></a>
        </div>


        <h2>Project</h2>
    </div>

        
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
	<div class="pull-right">
        </div>
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
          
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image_Home</th>
                        <th scope="col">Image_Page</th>
                        
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $team)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td><img src="{{asset($team->image_home)}}"  width="50px" height="50px"> </td>
                                <td><img src="{{asset($team->image_page)}}"  width="50px" height="50px"> </td>

                              
                        

                            <td>
                                
                                <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{trans('words.action')}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                
                                                                    <li><a href="{{route('land.edit',['id'=>$team->id])}}" target="_blank"><i class="md md-edit"></i> {{trans('words.edit')}}</a></li>

                                    
                                




                                </ul>
                            </div> 

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
