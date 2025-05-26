@extends("admin.admin_app")
@section('content')

<div id="main">
    <div class="page-header">


        <h2>All Comments</h2>
    </div>


    <div class="panel panel-default panel-shadow">
        <div class="panel-body">

            <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th>{{'#'}}</th>
                        <th>{{'Comments'}}</th>
                        <th>{{'Name'}}</th>
                        <th>{{'Time'}}</th>
                        <th>{{'Post Id'}}</th>
                        <th>{{'Comment Id'}}</th>
                        <th>{{'Post Title'}}</th>

                        <th class="text-center width-100">{{trans('words.action')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($comments as $comment)
              
                    <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$comment->comment}}</td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->created_at}}</td>
                        <td>{{$comment->blog_id}}</td>
                        <td>{{$comment->id}}</td>
                      <td>{{$comment->blog->title}}</td>
                       
                     
                      

                        <td class="text-center">
                        <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{trans('words.action')}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                <li><a href="{{route('comments.delete',['id'=>$comment->id])}}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>

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
