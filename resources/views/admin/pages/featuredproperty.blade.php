@extends("admin.admin_app")

@section("content")
<div id="main">
	<div class="page-header">
		
		 
		<h2>{{trans('words.featured_properties')}}</h2>
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
	                <th>{{trans('words.property_id')}}</th>
	                <th>{{trans('words.user_name')}}</th>
	                <th>{{trans('words.property_name')}}</th>
					<th>{{trans('words.type')}}</th>
					<th>{{trans('words.purpose')}}</th>
					<th>{{trans('words.plan')}}</th>
					<th>{{trans('words.expiry_date')}}</th>
	                <th class="text-center">{{trans('words.status')}}</th> 
	                <th class="text-center width-100">{{trans('words.action')}}</th>
	            </tr>
            </thead>

            <tbody>
            @foreach($propertieslist as $i => $property)
         	   <tr>
            	
				<td>{{ $property->id }}</td>
				<td>{{ getUserInfo($property->user_id)->name }}</td> 
                <td>{{ $property->property_name }}</td>
				<td>{{ getPropertyTypeName($property->property_type)->types }}</td>
				<td>{{ $property->property_purpose }}</td>
				<td>{{ \App\SubscriptionPlan::getSubscriptionPlanInfo($property->active_plan_id,'plan_name') }}</td>
				<td>
				@if($property->property_exp_date!='')
                {{date('m-d-Y',$property->property_exp_date)}}   
                @endif

				</td>
				<td class="text-center">
						@if($property->status==1)
							<span class="icon-circle bg-green">
								<i class="md md-check"></i>
							</span>
						@else
							<span class="icon-circle bg-orange">
								<i class="md md-close"></i>
							</span>
						@endif
            	</td>  
                <td class="text-center">
                <div class="btn-group">
								<button type="button" class="btn btn-default-dark dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									{{trans('words.action')}} <span class="caret"></span>
								</button>
								<ul class="dropdown-menu dropdown-menu-right" role="menu"> 
									<li><a href="Javascript::void();" data-toggle="modal" data-target="#PropertyPlanModal{{ $property->id }}"><i class="fa fa-dollar"></i> {{trans('words.change_plan')}}</a></li>
									<li><a href="Javascript::void();" data-toggle="modal" data-target="#PropertyPositionModal{{ $property->id }}"><i class="fa fa-toggle-off"></i> {{'Set Position'}}</a></li>

									<li><a href="{{ url('update-property/'.Crypt::encryptString($property->id)) }}" target="_blank"><i class="md md-edit"></i> {{trans('words.edit')}}</a></li>
									
									 
									<li>
										@if($property->featured_property==0)                	
					                	<a href="{{ url('admin/properties/featuredproperty/'.Crypt::encryptString($property->id)) }}"><i class="md md-star"></i> {{trans('words.set_as_featured')}}</a>
					                	@else
					                	<a href="{{ url('admin/properties/featuredproperty/'.Crypt::encryptString($property->id)) }}"><i class="md md-check"></i> {{trans('words.unset_as_featured')}}</a>
					                	@endif
									</li>
									 
									
									<li>
										@if($property->status==1)                	
					                	<a href="{{ url('admin/properties/status/'.Crypt::encryptString($property->id)) }}"><i class="md md-close"></i> {{trans('words.unpublish')}}</a>
					                	@else
					                	<a href="{{ url('admin/properties/status/'.Crypt::encryptString($property->id)) }}"><i class="md md-check"></i> {{trans('words.publish')}}</a>
					                	@endif
									</li>
									<li><a href="{{ url('admin/properties/delete/'.Crypt::encryptString($property->id)) }}" onclick="return confirm('{{trans('words.dlt_warning_text')}}')"><i class="md md-delete"></i> {{trans('words.remove')}}</a></li>
								</ul>
							</div> 
                
            </td>
                
            </tr>

            <div class="modal fade" id="PropertyPlanModal{{ $property->id }}" role="dialog">
			    <div class="modal-dialog">
			       <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">{{ $property->property_name }} {{trans('words.property_plan')}}</h4>
			        </div>
			        <div class="modal-body">
			        	<div class="panel-body">
			        {!! Form::open(array('url' => array('admin/properties/plan_update'),'class'=>'','name'=>'plan_form','id'=>'plan_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 	

			        	<input type="hidden" name="property_id" value="{{ $property->id }}">

			        	<div class="form-group">
                    		<label class="col-sm-4 control-label">{{trans('words.subscription_plan')}}</label>
	                      <div class="col-sm-8">
	                            <select class="form-control" name="plan_id">                               
	                                @foreach(\App\SubscriptionPlan::orderBy('id')->get() as $plan_data)
	                                  <option value="{{$plan_data->id}}" @if(isset($property->active_plan_id) AND $property->active_plan_id==$plan_data->id) selected @endif>{{$plan_data->plan_name}}</option>
	                                @endforeach                            
	                            </select>
	                      </div>
                  		</div><br/><br/>
                  		<div class="form-group">
		                    <label class="col-sm-4 control-label">{{trans('words.expiry_date')}}</label>
		                    <div class="col-sm-8">
		                      <div class="input-group"> 
		                        <input type="text" name="property_exp_date" value="{{ $property->property_exp_date ? date('m/d/Y',$property->property_exp_date) : null }}" class="datepicker form-control" placeholder="mm/dd/yyyy">
		                        <div class="input-group-append">
		                            <span class="input-group-text"><i class="ti-calendar"></i></span>
		                        </div>
		                      </div>
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
			  </div>
			  
			  <!--.PropertyPositionModal-->
			  <div class="modal fade" id="PropertyPositionModal{{ $property->id }}" role="dialog" style="top: 100px;">
			    <div class="modal-dialog">
			       <div class="modal-content">
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal">&times;</button>
			          <h4 class="modal-title">{{ $property->property_name }} {{'Set Position'}}</h4>
			        </div>
			        <div class="modal-body">
			        	<div class="panel-body">
			      		  {!! Form::open(array('url' => array('admin/properties/position_update'),'class'=>'','name'=>'plan_form','id'=>'plan_form','role'=>'form','enctype' => 'multipart/form-data')) !!} 	

			        	<input type="hidden" name="property_id" value="{{ $property->id }}">
						
			        	<div class="form-group">
                    	<label class="col-sm-4 control-label">{{'Set Position'}}</label>
	                      <div class="col-sm-8">
	                            <select class="form-control" name="position_id"> 
									<option value="999" @if(isset($property->position_id) AND $property->position_id==999 OR $property->position_id==99) selected @endif>No Position</option>                              
								 	<option value="1" @if(isset($property->position_id) AND $property->position_id==1) selected @endif>1st Position</option>
									<option value="2" @if(isset($property->position_id) AND $property->position_id==2) selected @endif>2nd Position</option>
									<option value="3" @if(isset($property->position_id) AND $property->position_id==3) selected @endif>3rd Position</option>
									<option value="4" @if(isset($property->position_id) AND $property->position_id==4) selected @endif>4th Position</option>
									<option value="5" @if(isset($property->position_id) AND $property->position_id==5) selected @endif>5th Position</option>
									<option value="6" @if(isset($property->position_id) AND $property->position_id==6) selected @endif>6th Position</option>
									<option value="7" @if(isset($property->position_id) AND $property->position_id==7) selected @endif>7th Position</option>
									<option value="8" @if(isset($property->position_id) AND $property->position_id==8) selected @endif>8th Position</option>
									<option value="9" @if(isset($property->position_id) AND $property->position_id==9) selected @endif>9th Position</option>
									<option value="10" @if(isset($property->position_id) AND $property->position_id==10) selected @endif>10th Position</option>
									<option value="11" @if(isset($property->position_id) AND $property->position_id==11) selected @endif>11th Position</option>
									<option value="12" @if(isset($property->position_id) AND $property->position_id==12) selected @endif>12th Position</option>
									<option value="13" @if(isset($property->position_id) AND $property->position_id==13) selected @endif>13th Position</option>    
									<option value="14" @if(isset($property->position_id) AND $property->position_id==14) selected @endif>14th Position</option> 
									<option value="15" @if(isset($property->position_id) AND $property->position_id==15) selected @endif>15th Position</option> 
									<option value="16" @if(isset($property->position_id) AND $property->position_id==16) selected @endif>16th Position</option>                        
	                            </select>
								@if ($errors->has('position_id'))
									<span style="color:#fb0303">
										{{ $errors->first('position_id') }}
									</span>
								@endif
	                      </div>
                  		</div><br/><br/>
                  		<div class="form-group">
		                    <label class="col-sm-4 control-label">{{trans('words.expiry_date')}}</label>
		                    <div class="col-sm-8">

		                      <div class="input-group"> 
		                        <input type="text" name="position_exp_date" value="{{ $property->position_exp_date ? date('m/d/Y',$property->position_exp_date) : null }}" class="datepicker form-control" placeholder="mm/dd/yyyy">
		                        <div class="input-group-append">
		                            <span class="input-group-text"><i class="ti-calendar"></i></span>
		                        </div>
								@if ($errors->has('position_exp_date'))
									<span style="color:#fb0303">
										{{ $errors->first('position_exp_date') }}
									</span>
								@endif
		                      </div>
							  
		                    </div>
		                 </div><br/><br/>
		                 <div class="form-group">
		                    <label class="col-sm-4 col-form-label">{{trans('words.status')}}</label>
		                      <div class="col-sm-8">
		                            <select class="form-control" name="position_status">                               
									<option value="1" @if(isset($property->position_status) AND $property->position_status==1) selected @endif>{{trans('words.active')}}</option>
		                                <option value="0" @if(isset($property->position_status) AND $property->position_status==0) selected @endif>{{trans('words.inactive')}}</option>                              
		                            </select>
		                      </div>
                		</div>
			          
			          </div>
			        </div>
			        <div class="modal-footer">
			          <button type="submit" id="save_btn" class="btn btn-primary">{{trans('words.save_changes')}}</button>	
			          <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('words.close')}}</button>
			        </div>
			        {!! Form::close() !!} 
			      </div>      
			    </div>
			  </div> <!--/.PropertyPlanModal-->
            
           @endforeach
             
            </tbody>
        </table>
    </div>
    <div class="clearfix"></div>
</div>

</div>



@endsection
@section("scripts")
<script type="text/javascript">
	@if (count($errors) > 0)
		$('#PropertyPositionModal{{ $property->id }}').modal('show');
	@endif
</script>

@endsection