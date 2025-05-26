@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		<h2>Inquiries For Agents</h2>
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

   
         
        <table id="data-table"  class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
	            <tr>
                    <th>#</th>
	                <th>Hirer Name/Company</th>
	                <th>Hired Agent</th>
                    <th>{{'status'}}</th>
	                <th class="text-center width-100">{{trans('words.action')}}</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($hireslist as $i => $inquiries)
         	   <tr>
            	<td>{{ $loop->iteration }}</td>
                <td>
                   <p>{{ $inquiries->seller_name }} </p>
                   <p> {{ $inquiries->seller_phone }}</p>
                   <p> {{ $inquiries->seller_email }}</p>
                </td>

                <td>
                    <p>{{ $inquiries->agent_name }} </p>
                   <p> {{ $inquiries->agent_phone }}</p>
                   <p> {{ $inquiries->agent_email }}</p>
                
                </td>

                <td class="text-center">
						@if($inquiries->status==1)
							<span class="icon-circle bg-green">
								<i class="md md-check"></i> 
							</span>
							Done
						@else
							<span class="icon-circle bg-orange">
								<i class="md md-close"> </i>
							</span>
                            Pending
						@endif
            	</td> 

                <td class="text-center">
					<div class="btn-group">
						<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							{{trans('words.action')}} <span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
							
							<li>
								@if($inquiries->status==0)                	
								<a href="{{ url('admin/hires/status/'.Crypt::encryptString($inquiries->id)) }}"><i class="md md-check"></i> Approved</a>
								@else
								<a href="{{ url('admin/hires/status/'.Crypt::encryptString($inquiries->id)) }}"><i class="md md-close"></i> Deactivated</a>
								@endif
							</li>
							<li><a href="{{ url('admin/hires/delete/'.Crypt::encryptString($inquiries->id)) }}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>
						</ul>
					</div> 
          		  </td>

               
                
            </tr>
           @endforeach
             
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="text-center">
                        @include('admin.pagination', ['paginator' => $hireslist])
                         
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>


@endsection