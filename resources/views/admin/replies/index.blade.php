@extends("admin.admin_app")
@section('content')

<div id="main">
    <div class="page-header">


        <h2>All Replies</h2>
    </div>


    <div class="panel panel-default panel-shadow">
        <div class="panel-body">

            <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th>{{'#'}}</th>
                        <th>{{'Replies'}}</th>
                      
                        <th>{{'Time'}}</th>
                        <th>{{'Comment Id'}}</th>
                        

                        <th class="text-center width-100">{{trans('words.action')}}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($replies as $reply)
              
                    <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                        <td>{{$reply->reply}}</td>
                        
                        <td>{{$reply->created_at}}</td>
                        <td>{{$reply->comment_id}}</td>
                      

                        <td class="text-center">
                        <div class="btn-group">
                                <button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    {{trans('words.action')}} <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu"> 
                                <li><a href="{{route('replies.delete',['id'=>$reply->id])}}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>

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
