@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		<h2>Client Request</h2>
	</div>

	@if(Session::has('flash_message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button>
			{{ Session::get('flash_message') }}
		</div>
	@endif
     
    <div class="panel panel-default panel-shadow">
        <div class="panel-body">
            
            <table id="data-table" class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
                <thead>
                    <tr>	                
                        <th>#id</th>
                        <th>{{'Location'}}</th>
                        <th>{{'Size'}}</th>
                        <th>{{'Contact'}}</th>
                        <th>{{'Requirment'}}</th>
                        
                        <th class="text-center width-100">{{trans('words.action')}}</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($requestlist as $i => $row)
                <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $row->location }} </td>
                    <td>{{ $row->size }} </td>
                    <td>{{ $row->contact }} </td>
                    <td>{{ $row->requirement }} </td>
                    
                    <td class="text-center">

                         <a href="{{ url('admin/client-request/delete/'.$row->id) }}" class="btn btn-icon waves-effect waves-light btn-danger m-b-5" onclick="return confirm('{{trans('words.dlt_warning_text')}}')" data-toggle="tooltip" title="{{trans('words.remove')}}"> <i class="fa fa-remove"></i> </a>

                    </td>
                    
                </tr>
                 @endforeach
                
                </tbody>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>

</div>



@endsection