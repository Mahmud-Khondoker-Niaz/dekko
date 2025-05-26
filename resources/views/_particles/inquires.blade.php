  <!-- Top Footer-->
  <section id="top-footer">
      <div class="inner-container container">
   

             <div class="col-sm-12 col-md-8 col-md-offset-2">

                 <div class="request-form">
                    
                    <div class="request-form-heading">
                      <h2 style="text-center">{{trans('words.request_title')}}</h2> 
                    </div>  

                    <div class="row">
                        <div class=" customer-enquires">
                            <ul class="list-inline agent-contact-list enquires-button">
                                <li class="agent-phone" id="contactFloorfly"><a href="tel:+8801819767676"><i class="fa fa-phone"></i></a></li>
                                <li class="agent-whatsapp"><a href="https://wa.me/01819767676"><i class="fa fa-whatsapp"></i></a></li>
                                <li class="agent-message" id="emailFloorfly"> <a href="#" data-toggle="modal" data-target="#contactAgentModel"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>

                  <div class="customer-enquires-form-body">

                    <div class="number-box" id="showInqueryNumber" style="display:none">
                      <h2> CALL NOW : +880 1819 767676</h2>
                    </div> <!--Number-box-->

                    <div class="show-form-box" style="display:block">
                      
                        @if ($errors->any())
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
                              {{ Session::get('success') }}
                          </div>
                        @endif

                      {!! Form::open(array('url'=>'agentscontact','method'=>'POST', 'id'=>'agent_contact_form', 'name'=>'registration')) !!}

                        <meta name="_token" content="{!! csrf_token() !!}"/>
                        <input type="text" name="lead_source" value="Website" hidden>
                      
                       <div class="row">
                        <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" name="name" id="name" placeholder="{{trans('words.name')}}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message  }}</div>
                            @enderror

                          </div>
                        </div>  

                        <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{trans('words.email')}}">
                           
                          </div>
                        </div>  
                      </div>

                      <div class="row">
                       <div class="col-md-6">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{trans('words.contact')}}">
                           
                          </div>
                        </div> 


                        <div class="col-xs-12 col-md-6 ">
                          <div class="row">
                             <div class="col-sm-6 col-md-6">
                              <div class="form-group agr-fields">
                                <input type="text" class="form-control" name="property_size_form"  placeholder="Size (sft) Form">
                              </div>
                            </div>  

                            <div class="col-sm-6 col-md-6">
                              <div class="form-group agr-fields">
                                <input type="text" class="form-control" name="property_size_to"  placeholder="Size (sft) To">
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
                        <div class="col-md-12">
                            <div class="form-group agr-fields">
                            <textarea id="message" name="message" placeholder="Message "></textarea>
                            </div>
                        </div>  
                      </div> 


                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group inquires-btn pull-right">
                                  <button type="submit" class="btn btn-primary form-control">{{'SUBMIT NOW'}}</button>
                              </div>
                          </div>
                      </div> 

                      {!! Form::close() !!} 
                  </div> <!--form-box-->   

                </div>
              </div>
        </div>

       
      </div>
    </section>

  @section("styles")  
  <!--End of Top Footer -->
    <link rel="stylesheet" href="{{ URL::asset('site_assets/dist-select/css/bootstrap-multiselect.css') }}" type="text/css"/>
    <link href="{{ URL::asset('site_assets/alert-toastr/toastr.css') }} " rel="stylesheet">

  @endsection

 @section("scripts")
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

      @if(Session::has('error'))
        toastr.error("{{Session::get('error')}}")
      @endif
  </script>


  <script type="text/javascript">

    //multiple selection
    $(document).ready(function() {
        $('#example-getting-started').multiselect({
            nonSelectedText: 'Preferred location',
            enableFiltering: true,
            //includeSelectAllOption: true,
            maxHeight: 300,
            dropUp: true
        });
    });

    // $(document).ready(function() {
    //     $('#example-getting-started').multiselect();
    // });

    /*Show form or hide form*/
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

  // Form Validation
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