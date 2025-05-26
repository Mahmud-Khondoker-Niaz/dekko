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
        
       


        <h2>All Request</h2>
    </div>

        
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
	<div class="pull-right">
        </div>
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
          
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        
                        <th scope="col">Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Property Image</th>
                        <th scope="col">Size</th>
                        <th scope="col">Price</th>
                       

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($properties as $team)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td>{{$team->name}}</td>
                                <td>{{$team->number}}</td>
                                <td><img src="{{asset($team->featured_image)}}" alt="{{$team->name}}" width="50px" height="50px"> </td>
                                <td>{{$team->size}}</td>
                                <td>{{$team->price}}</td>
                             








 

                            <td>
                                
                                <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{trans('words.action')}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                
                                    
                                    
                              

                                <li><a href="{{route('property_request.delete',['id'=>$team->id])}}" onclick="return confirm('{{trans('Are you send it Trash')}}')"><i class="md md-delete"></i> {{'Trash'}}</a></li>
                                <li><a href="{{route('property_request.details',['id'=>$team->id])}}"><i class="md md-delete"></i> {{'Details'}}</a></li>


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
