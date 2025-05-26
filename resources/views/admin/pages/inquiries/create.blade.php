@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{'Add New Enquiry' }}</h2>		
		<a href="{{ URL::to('admin/inquiries') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>	  
	</div>

	@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif

	@if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
        </div>
	@endif
   
    <div class="panel panel-default">
        <div class="panel-body row">

            <div class="col-md-4">
                  
                <div class="live-user row">
                    
                    <div class="col-md-2 luser-image">
                         @if(Auth::user()->image_icon)
								<img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" width="60" alt="person" class="img-circle border-white">
							@else
							<img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="person" class="img-circle border-white" width="60"/>
							@endif
                    </div> 

                    <div class="col-md-10 luser-info">
                       <h3>Call Or Verify Person</h3>
                        <span>Name: <strong>{{ Auth::user()->name }}</strong></span><br>
                        <!-- <span>Designation: <strong>Rahim kudus</strong></span> -->
                    </div>     
                </div>
            </div>

            <div class="col-md-8">
            <form action="{{route('inquiries.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="" class="control-label">{{'Lead Source'}}</label>
                        <select name="lead_source" class="form-control" id="myselection" onchange="showDiv(this)">
                            <option value="Call">Cold Call</option>
                            <option value="Website">Website</option>
                            <option  value="Referral">Referral</option>
                            <option value="Facebook">Facebook</option>
                            <option value="seo">SEO</option>
                        </select>
                    </div>
                </div>

          
                 <div id="Referral" class="referral" style="display:none; margin-bottom:15px">
                    <h3>Referral Person Info</h3>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="" class="control-label">{{'Office Staff'}}</label>
                            <select class="form-control" name="reffered_by">
                                @foreach($allstaff as $staff)
                                <option value="{{$staff->id}}">{{$staff->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="control-label">{{'Referral  Person Name '}}</label>
                            <input class="form-control" name="refer_person_name" placeholder="full name" value="{{old('refer_person_name')}}"/>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="control-label">{{'Relation With'}}</label>
                            <input class="form-control" name="relation" placeholder="Relation" value="{{old('Relation')}}"/>
                        </div>

                        <div class="col-sm-6">
                            <label for="" class="control-label">{{'Referral Person Phone '}}</label>
                            <input class="form-control" name="refer_person_phone" placeholder="phone" value="{{old('refer_person_phone')}}"/>
                        </div>

                        <div class="col-sm-12">
                            <label for="" class="control-label">{{'Referral Person Address '}}</label>
                            <input class="form-control" name="refer_person_address" placeholder="Address" value="{{old('refer_person_address')}}"/>
                        </div>

                    </div>
                </div> <!--/.referral-box-->

                <div class="Customer-data">
                     <h3>Customer Enquiry Info</h3> <br>
                     <div class="row">
                        <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{trans('words.name')}}" value="{{old('name')}}">
                          </div>
                        </div>  

                        <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{trans('words.email')}}" value="{{old('email')}}">
                          </div>
                        </div>  
                      </div>

                      <div class="row">

                       <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{trans('words.contact')}}" value="{{old('phone')}}">
                          </div>
                        </div> 


                        <div class="col-md-6">
                          <div class="row">

                             <div class="col-md-6">
                              <div class="form-group agr-fields">
                                <input type="text" class="form-control" name="property_size_form"  placeholder="Size (sft) Form" value="{{old('property_size_form')}}">
                              </div>
                            </div>  

                            <div class="col-md-6">
                              <div class="form-group agr-fields">
                                <input type="text" class="form-control" name="property_size_to"  placeholder="Size (sft) To" value="{{old('property_size_to')}}">
                              </div>
                            </div>  

                            </div>
                        </div>  
                      </div>  

                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mult-select-opt">
                                
                            <select id="example-getting-started" name="property_location[]" multiple="multiple">
                                 
                                @php $allUpazila=\App\Upazila::orderBy('id','asc')->get(); @endphp
                                 @foreach($allUpazila as $upazila)
                                     <option value="{{$upazila->name}}">{{$upazila->name}}</option>
                                  @endforeach    
                               
                            </select>

                            </div>
                        </div>  

                        <div class="col-md-6">
                            <div class="form-group agr-fields">
                              <select class="form-control" name="property_status">
                                <option value="">Property Status</option>
                                <option value="Ready to Live">Ready to Live</option>
                                <option value="Hand Over in 12m">Hand Over in 12m</option>
                                <option value="Hand Over in 18m">Hand Over in 18m</option>
                                <option value="Hand Over in 24m">Hand Over in 24m</option>
                                <option value="Hand Over in 36m">Hand Over in 36m</option>
                              </select>    
                            </div>
                        </div> 
                      </div> 
                       <div class="row">
                            <div class="col-md-6">
                                <div class="form-group agr-fields">
                                    <input type="text" class="form-control" name="budget" id="budget" placeholder="{{'Budget'}}" value="{{old('budget')}}">
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="form-group agr-fields">
                                <select id="facing" class="form-control" name="facing">
                                    <option value="">{{trans('words.facing')}}</option>
                                    <option value="East" @if(old('facing')=='East') selected @endif>East</option>
                                    <option value="West" @if(old('facing')=='West') selected @endif>West</option>
                                    <option value="North" @if(old('facing')=='North') selected @endif>North</option>
                                    <option value="South" @if(old('facing')=='South') selected @endif>South</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-6">
                                <div class="form-group agr-fields">
                                <select id="floor_position" class="form-control" name="floor_position">
                                <option value="">{{'Interested Floor Position'}}</option>
                                <option value="1st Floor" @if(old('floor_position')=='1st Floor') selected @endif>1st Floor</option>
                                <option value="2nd Floor" @if(old('floor_position')=='2nd Floor') selected @endif>2nd Floor</option>
                                <option value="3rd Floor" @if(old('floor_position')=='3rd Floor') selected @endif>3rd Floor</option>
                                <option value="4th Floor" @if(old('floor_position')=='4th Floor') selected @endif>4th Floor</option>
                                <option value="5th Floor" @if(old('floor_position')=='5th Floor') selected @endif>5th Floor</option>
                                <option value="6th Floor" @if(old('floor_position')=='6th Floor') selected @endif>6th Floor</option>
                                <option value="7th Floor" @if(old('floor_position')=='7th Floor') selected @endif>7th Floor</option>
                                <option value="8th Floor" @if(old('floor_position')=='8th Floor') selected @endif>8th Floor</option>
                                </select>
                                </div>
                            </div> 

                        </div> 

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group agr-fields">
                             <textarea id="message" name="special_note" class="form-control" placeholder="Special Note" value="{{old('special_note')}}"></textarea>
                            </div>
                        </div>  
                      </div> 

                     </div> <!--customer-data-->

               
                <hr>
                <div class="form-group">
                    <div class="col-md-offset-3 col-sm-9 ">
                        <button type="submit" class="btn btn-primary">{{ isset($type->id) ? trans('words.save_changes') : trans('words.submit') }}</button>                        
                    </div>
                </div>
            </form>
            </div>


        </div>
    </div>
    
</div>





  <!--End of Top Footer -->
    <link rel="stylesheet" href="{{ URL::asset('site_assets/dist-select/css/bootstrap-multiselect.css') }}" type="text/css"/>
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">


 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

  <script type="text/javascript" src="{{ URL::asset('site_assets/dist-select/js/bootstrap-multiselect.js')}}"></script>

  <script src="{{ URL::asset('site_assets/alert-toastr/toastr.js') }}"></script>

  <script>
      @if(Session::has('success'))
        toastr.success("{{Session::get('success')}}")
      @endif

      @if(Session::has('info'))
        toastr.info("{{Session::get('info')}}")
      @endif

      @if(Session::has('danger'))
        toastr.danger("{{Session::get('danger')}}")
      @endif
  </script>


  <script type="text/javascript">
    $(document).ready(function(){
        $('#myselection').change(function(){
            $('.referral').hide();
            $('#' + $(this).val()).show();
        });
    });


    //multiple selection

    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            nonSelectedText: 'Select Location',
            enableFiltering: true,
            //includeSelectAllOption: true,
            maxHeight: 300,
            dropUp: true
        });
    });

      /*enquires form*/
  $(document).ready(function() {

      $(".agent-message").click(function (e) {
        $(".show-form-box").slideDown('slow');
        $("#showInqueryNumber").hide('slow');
      });  

      $("#contactFloorfly").click(function (e) {
        $("#showInqueryNumber").show('slow');
        $(".show-form-box").slideUp('slow');
      });  

  });

  // Wait for the DOM to be ready
  $(document).ready(function() {
  $("form[name='registration']").validate({
    rules: {
    
      name: {
        required: true,
        minlength: 3,
        maxlength: 28
      },

      phone: {
        required: true,
        minlength: 11,
        maxlength: 11
      },
      email: {
        required: true,
        email: true
      }
    },
    messages: {
     
      name: {
        required: "Please provide Full Name",
        minlength: "Min 3 Character length",
        maxlength: "Max 28 Character length"
      },

      phone: {
        required: "Please provide Phone Number",
        minlength: "Mobile number min 11 length",
        maxlength: "Mobile number max 11 length"
      },
      email: "Please enter a valid email address"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});
  
</script>



@endsection