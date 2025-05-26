@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
         <div class="pull-right">
			<a href="{{URL::to('admin/inquiries/addnew')}}" class="btn btn-primary" target="_blank"> Add New Lead <i class="fa fa-plus"></i></a>
		</div>
		<h2>{{trans('words.inquiries')}}</h2>
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
         
        <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%">
            <thead>
	            <tr>
	                
	                <th>{{trans('words.name')}}</th>
	                <th>{{trans('words.email')}}</th>
	                <th>{{trans('words.phone')}}</th>
                    <th>{{trans('words.message')}}</th>
                    <th>{{'Lead Type'}}</th>
	                 
	                <th class="text-center width-100">{{trans('words.action')}}</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($inquirieslist as $i => $inquiries)
         	   <tr>
                
                <td>{{ $inquiries->name }}</td>
                <td>{{ $inquiries->email }}</td>
                <td>{{ $inquiries->phone }}</td>
                <td>{{ $inquiries->message }}</td>
                <td>{{ $inquiries->lead_type }}</td>
                <td width="200">
				
					<div class="btn-group">
						@if( $inquiries->verify == 1)
						<a href="Javascript::void();"class="btn btn-icon waves-effect waves-light btn-success" data-toggle="tooltip" title="Verified"> <i class="fa fa-check-circle-o"></i> Verified</a>
						@else
						<a href="{{route('inquiries.edit',['id'=>$inquiries->id])}}"class="btn btn-icon waves-effect waves-light btn-primary" data-toggle="tooltip" title="Call Customer"> <i class="fa fa-phone"></i> Pending</a>
						@endif

						<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							{{trans('words.action')}} <span class="caret"></span>
						</button>
						<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
							<li><a href="{{route('inquiries.details',['id'=>$inquiries->id])}}"><i class="fa fa-eye"></i> {{'View Details'}}</a></li>
							<li><a href="{{route('inquiries.edit',['id'=>$inquiries->id])}}"><i class="fa fa-pencil-square-o"></i> {{'Update'}}</a></li>

							<li><a href="{{ url('admin/inquiries/delete/'.Crypt::encryptString($inquiries->id)) }}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>
						</ul>
					</div> 

                </td>
                
            </tr>
           @endforeach
             
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8" class="text-center">
                        @include('admin.pagination', ['paginator' => $inquirieslist])
                         
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



                <div class="modal fade" id="PropertyPlanModal" role="dialog" style="top: 100px;">
			    <div class="modal-dialog">
			       <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title"> {{trans('words.property_plan')}}</h4>
			        </div>
			        <div class="modal-body">
			        	<div class="panel-body">
			        {!! Form::open(array('url' => array('admin/properties/plan_update'),'class'=>'','name'=>'plan_form','id'=>'plan_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 	

			        	<input type="hidden" name="property_id" value="{">

			        	<div class="form-group">
                    		<label class="col-sm-4 control-label">{{trans('words.subscription_plan')}}</label>
	                      <div class="col-sm-8">
	                            <select class="form-control" name="plan_id">                               
	                                                         
	                            </select>
	                      </div>
                  		</div><br/><br/>
                  		<div class="form-group">
		                    <label class="col-sm-4 control-label">{{trans('words.expiry_date')}}</label>
		                    <div class="col-sm-8">

		                      <div class="input-group"> 
		                        <input type="text" name="property_exp_date" value="" class="datepicker form-control" placeholder="mm/dd/yyyy">
		                        <div class="input-group-append">
		                            <span class="input-group-text"><i class="ti-calendar"></i></span>
		                        </div>
		                      </div>
							  
		                    </div>
		                 </div><br/><br/>
		                 <div class="form-group">
		                    <label class="col-sm-4 col-form-label">{{trans('words.status')}}</label>
		                      <div class="col-sm-8">
		                            <select class="form-control" name="status">                               
		                                <option value="1">{{trans('words.active')}}</option>
		                                <option value="0">{{trans('words.inactive')}}</option>                            
		                            </select>
		                      </div>
                		</div>
			          
			          </div>
			        </div>
			        <div class="modal-footer">
			          <button type="submit" class="btn btn-primary">{{trans('words.save_changes')}}</button>	
			          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('words.close')}}</button>
			        </div>
			        {!! Form::close() !!} 
			      </div>      
			    </div>
              </div> <!--/.PropertyPlanModal-->
              
@endsection