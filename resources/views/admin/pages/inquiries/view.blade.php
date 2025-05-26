@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{'Inquirie Details' }}</h2>		
		<a href="{{ URL::to('admin/inquiries') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>	  
	</div>


   
    <div class="panel panel-default">
        <div class="panel-body row">

            <div class="col-md-4">
                <div class="live-user">

                 @if($inquiries->verify_user_id !=null)
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Call / Verified By</h3>
                        </div>

                        <div class="col-md-4 luser-image">
                            @if(Auth::user()->image_icon)
                                    <img src="{{ URL::asset('upload/members/'.Auth::user()->image_icon.'-s.jpg') }}" alt="person" class="img-thumbnail">
                                @else
                                <img src="{{ URL::asset('admin_assets/images/guy.jpg') }}" alt="person" class="img-circle border-white" width="60"/>
                                @endif
                        </div> 

                        <div class="col-md-8 luser-info">
                            <span>Name: <strong>{{$verify_user->name}}</strong></span><br>
                            <span>Designation: <strong>{{$verify_user->usertype}}</strong></span><br>
                            <span>Verify Date: <strong>{{$inquiries->verify_date}}</strong></span>
                        </div> 

                    </div>
                    @endif

                    @if($inquiries->reffered_by !=null)

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Referred By</h3>
                        </div>

                       

                        <div class="col-md-12 luser-info">
                            <span>Name: <strong>{{$reffer_user->name}}</strong></span><br>
                            <span>Designation: <strong>{{$reffer_user->usertype}}</strong></span><br>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Referral  Person</h3>
                        </div>

                        <div class="col-md-12 luser-info">
                            <span>Name: <strong>{{ $inquiries->refer_person_name }}</strong></span><br>
                            <span>Phone: <strong>{{ $inquiries->refer_person_phone }}</strong></span><br>
                            <span>Address: <strong>{{ $inquiries->refer_person_address }}</strong></span><br>
                            <span>Relation: <strong>{{ $inquiries->relation }}</strong></span>

                        </div> 
                    </div>

                    @endif


                </div>
            </div>

            <div class="col-md-8">
                <div class="lead-header">
                    <h3>Lead Details</h3>
                </div>

                <div class="lead-details table-responsive">
                    <table class="table table-bordered">
                         <tbody>
                            <tr>
                                <th colspan="2">Personal Info</th>
                            </tr>

                            <tr>
                                <td width="150">name</td>
                                <td>{{ $inquiries->name }}</td>
                            </tr>

                            <tr>
                                <td width="150">Phone</td>
                                <td>{{ $inquiries->phone }}</td>
                            </tr>

                            <tr>
                                <td width="150">Email</td>
                                <td>{{ $inquiries->email }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered">
                         <tbody>
                            <tr>
                                <th colspan="2">Enquires / Interested</th>
                            </tr>

                            @if($inquiries->property_location !=null)
                            <tr>
                                <td width="150">Property Location</td>
                                <td>{{ $inquiries->property_location }}</td>
                            </tr>
                            @endif

                            @if($inquiries->property_size_form !=null)
                            <tr>
                                <td width="150">Property Size</td>
                                <td>{{ $inquiries->property_size_form }} To  {{ $inquiries->property_size_to }} (sft)</td>
                            </tr>
                            @endif

                            @if($inquiries->facing !=null)
                            <tr>
                                <td width="150">Facing</td>
                                <td>{{ $inquiries->facing }}</td>
                            </tr>
                            @endif
                            @if($inquiries->floor_position !=null)
                            <tr>
                                <td width="150">Floor Position</td>
                                <td>{{ $inquiries->floor_position }}</td>
                            </tr>
                            @endif
                            @if($inquiries->budget !=null)
                            <tr>
                                <td width="150">Budget</td>
                                <td>{{ $inquiries->budget }}</td>
                            </tr>
                            @endif
                            @if($inquiries->property_status !=null)
                            <tr>
                                <td width="150">Property Status</td>
                                <td>{{ $inquiries->property_status }}</td>
                            </tr>
                            @endif
                            @if($inquiries->lead_source !=null)
                            <tr>
                                <td width="150">Lead Source</td>
                                <td>{{ $inquiries->lead_source }}</td>
                            </tr>
                            @endif
                            @if($inquiries->enquiry_property !=null)
                            <tr>
                                <td width="150">Enquiry Property</td>
                                <td>{{ $inquiries->enquiry_property }} <strong>Property ID: {{ $inquiries->property_id }} </strong></td>
                            </tr>
                            @endif
                            @if($inquiries->created_at !=null)
                            <tr>
                                <td width="150">Enquiry Date</td>
                                <td>{{ $inquiries->created_at }}</td>
                            </tr>
                            @endif
                            @if($inquiries->message !=null)
                            <tr>
                                <td width="150">Customer Mesg</td>
                                <td>{{ $inquiries->message }}</td>
                            </tr>
                            @endif
                            @if($inquiries->special_note !=null)
                            <tr>
                                <td width="150">Special Note</td>
                                <td>{{ $inquiries->special_note }}</td>
                            </tr>
                            @endif
                           

                        </tbody>
                    </table>


                </div> <!--lead-details-->

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

<script>  
$( window ).load(function() {
    $('#myselection').on('change', function() {
      if ( this.value == 'Referral')
      {
        $("#Referral").show();
      }
      else
      {
        $("#Referral").hide();
      }
    });
});
</script>
  <script type="text/javascript">
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