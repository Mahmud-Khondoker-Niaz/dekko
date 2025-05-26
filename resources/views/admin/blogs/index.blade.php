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
            <a href="{{route('blog-post')}}" class="btn btn-primary">Add New Post <i class="fa fa-plus"></i></a>
        </div>


        <h2>All Posts</h2>
    </div>

        
     
<div class="panel panel-default panel-shadow">
    <div class="panel-body">
         
	<div class="pull-right">
            <a href="{{route('blogs.trashed')}}" class="btn btn-primary">View Trashed <i class="fa fa-plus"></i></a>
        </div>
        <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
          
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
<th scope="col">View Description</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                    </thead>
                    <tbody>
                        @foreach($blogs as $blog)
                            <tr>
                                <td scope="row">{{$loop->iteration}}</td>
                                <td><img src="{{asset($blog->feature)}}" alt="{{$blog->title}}" width="50px" height="50px"> </td>
                                <td>{{$blog->title}}</td>
<td><a href="{{route('blog.single',['slug'=> $blog->slug])}}">View  </a></td>
                                <td class="text-center">
                                    @if($blog->status==1)
                                        <span class="icon-circle bg-green">
                                            <i class="md md-check"></i>
                                        </span>
                                    @else
                                        <span class="icon-circle bg-orange">
                                            <i class="md md-close"></i>
                                        </span>
                                    @endif
                            </td> 

                            <td>
                                
                                <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{trans('words.action')}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                
                                    <li><a href="{{route('blog.edit',['id'=>$blog->id])}}" target="_blank"><i class="md md-edit"></i> {{trans('words.edit')}}</a></li>
                                    
                                    
                                    
                                    <li>
                                        @if($blog->status==1)                   
                                        <a href="{{ url('admin/blog/status/'.Crypt::encryptString($blog->id)) }}"><i class="md md-close"></i> {{trans('words.unpublish')}}</a>
                                        @else
                                        <a href="{{ url('admin/blog/status/'.Crypt::encryptString($blog->id)) }}"><i class="md md-check"></i> {{trans('words.publish')}}</a>
                                        @endif
                                    </li>

                                    <li><a href="{{route('blog.delete',['id'=>$blog->id])}}" onclick="return confirm('{{trans('Are you send it Trash')}}')"><i class="md md-delete"></i> {{'Trash'}}</a></li>

                                    <li><a href="{{ url('admin/properties/delete/'.Crypt::encryptString($blog->id)) }}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>

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
