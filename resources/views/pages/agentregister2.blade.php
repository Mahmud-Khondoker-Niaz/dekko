@extends("app")

@section('head_title', trans('words.sign_up').' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
  <section class="property-listing boxed-view clearfix" id="agentRegister">
     <div class="inner-container container">
       
       <div  class="row">

        <div class="col-md-8 col-md-offset-2">
          <h2 class="hsq-heading type-1" style="color:#fcd70d">{{'Register as Sales Advisor'}}</h2>
          <p style="color:white;display:none;>আপনি কি রিয়েল এস্টেট ইন্ডাস্ট্রিতে ক্যারিয়ার গড়তে চান?
          আপনি কি কোন রিয়েল এস্টেট কোম্পানিতে চাকরী খুজছেন?
          আপানার কোম্পানির জন্য কি দক্ষ সেলস এজেন্ট দরকার? 

          ফ্লোরফ্লাই এ যোগাযোগ করুন, নিচের বাটনটি ক্লিক করে রেজিস্ট্রেশন ফরমটি পূরন করুন।
          </p>

           @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                        {{ Session::get('flash_message') }}
                </div>
            @endif

          <div class="agent-registration-form"> 
            <div class="container ">
              <ul class="nav nav-tabs" role="tablist" style="display:none">
                <li role="presentation" class="active">
                  <a href="#personal_tab" aria-controls="personal_tab" role="tab" data-toggle="tab" aria-expanded="true">Personal Information</a>
                </li>

                <li>
                  <a href="#education_tab" aria-controls="education_tab" role="tab" data-toggle="tab" aria-expanded="false">Education</a>
                </li>

                <li>
                  <a href="#employment_tab" aria-controls="employment_tab" role="tab" data-toggle="tab" aria-expanded="false">Employment</a>
                </li>

                <li>
                  <a href="#skill_tab" aria-controls="skill_tab" role="tab" data-toggle="tab" aria-expanded="false">Skill</a>
                </li>

                <li>
                  <a href="#social_tab" aria-controls="social_tab" role="tab" data-toggle="tab" aria-expanded="false">Social</a>
                </li>

              </ul>
             {!! Form::open(array('url' => 'register','class'=>'search-form','id'=>'registerform','role'=>'form')) !!}
              <meta name="_token" content="{!! csrf_token() !!}"/>

              <input type="text" name="usertype" value="Agents" hidden/> 
                
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="personal_tab">
                  <h3 class="form-tab-title" >Personal Information</h3>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="{{trans('words.name')}}" name="name"/> 
                        @if ($errors->has('name'))
                          <span style="color:#fb0303">
                              {{ $errors->first('name') }}
                          </span>
                        @endif 
                        </div>
                    </div>
                  </div>  <!--/.row-->

                  <div class="row">

                   <div class="col-md-4">
                      <div class="form-group agr-fields">
                        <input type="text" name="agent_dob" value="" class="datepicker form-control" format="yy-mm-dd" placeholder="Date Of Birth">
                        @if ($errors->has('agent_dob'))
                        <span style="color:#fb0303">
                            {{ $errors->first('agent_dob') }}
                        </span>
                        @endif 
                      </div>   
                    </div>

                    <div class="col-md-4">
                     <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="{{'Contact 1'}}" name="phone" /> 
                        @if ($errors->has('phone'))
                          <span style="color:#fb0303">
                              {{ $errors->first('phone') }}
                          </span>
                          @endif 
                      </div>     
                    </div>

                    <div class="col-md-4">
                       <div class="form-group agr-fields">
                         <input type="text" class="form-control" placeholder="{{'Contact 2'}}" name="agent_contact2" /> 
                          @if ($errors->has('agent_contact2'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_contact2') }}
                              </span>
                          @endif 
                        </div>
                    </div>

                  </div> <!--/.row-->

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group agr-fields">
                        <input type="email" class="form-control" placeholder="{{trans('words.email')}}" name="email"  /> 
                        @if ($errors->has('email'))
                          <span style="color:#fb0303">
                              {{ $errors->first('email') }}
                          </span>
                        @endif 
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group agr-fields">
                        <input type="email" class="form-control" placeholder="{{trans('words.confirm_email')}}" name="email"  /> 
                        @if ($errors->has('email'))
                          <span style="color:#fb0303">
                              {{ $errors->first('email') }}
                          </span>
                        @endif 
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group agr-fields">
                        <textarea type="email" class="form-control" placeholder="{{trans('words.present_address')}}" name="agent_present_address"></textarea>
                        @if ($errors->has('agent_present_address'))
                          <span style="color:#fb0303">
                              {{ $errors->first('agent_present_address') }}
                          </span>
                          @endif
                      </div> 
                    </div>

                    <div class="col-md-12">
                      <div class="form-group agr-fields">
                        <textarea type="text" class="form-control" placeholder="{{trans('words.permanent_address')}}" name="agent_permanent_address"></textarea>
                        @if ($errors->has('agent_permanent_address'))
                          <span style="color:#fb0303">
                              {{ $errors->first('agent_permanent_address') }}
                          </span>
                          @endif
                      </div> 
                    </div>
                  </div> <!--/.row-->  

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="{{'NID Number'}}" name="agent_nid" /> 
                          @if ($errors->has('agent_nid'))
                            <span style="color:#fb0303">
                                {{ $errors->first('agent_nid') }}
                            </span>
                          @endif 
                      </div>
                    </div> 

                    <div class="col-md-6">
                     <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="{{'Passport Number'}}" name="agent_passport" /> 
                        @if ($errors->has('agent_passport'))
                          <span style="color:#fb0303">
                              {{ $errors->first('agent_passport') }}
                          </span>
                          @endif 
                      </div>     
                    </div>
                  </div>  <!--/.row--> 


                  <div class="row">
                    <div class="col-md-12">
                     <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="Father's Name" name="agent_father" /> 
                        @if ($errors->has('agent_father'))
                          <span style="color:#fb0303">
                              {{ $errors->first('agent_father') }}
                          </span>
                          @endif 
                      </div>     
                    </div>

                    <div class="col-md-12">
                     <div class="form-group agr-fields">
                        <input type="text" class="form-control" placeholder="Mother's Name" name="agent_mother" /> 
                          @if ($errors->has('agent_mother'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_mother') }}
                              </span>
                          @endif 
                        </div>
                    </div>  
                  </div> <!--/.row--> 
                 <a class="btn btn-primary continue agr-btn pull-right">Save & Proceed for Next Step</a>
                </div> <!--tab1-->

                <div role="tabpanel" class="tab-pane" id="education_tab">
                  
                  <div class="education1">
                     <h3 class="form-tab-title">Education Level</h3>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Institute'}}" name="institue" /> 
                            @if ($errors->has('institue'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('institue') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="Result" name="agent_result" /> 
                            @if ($errors->has('agent_result'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_result') }}
                              </span>
                              @endif 
                          </div>     
                        </div>

                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="agent_degree" class="form-control">
                                  <option value="" >Select Degree</option>
                                  <option value="SSC">SSC</option>
                                  <option value="HSC">HSC</option>
                                  <option value="Bachelor">Bachelor</option>
                                  <option value="Masters">Masters</option>
                                  <option value="BBA">BBA</option>
                                  <option value="MBA">MBA</option>
                              </select>
                                @if ($errors->has('agent_degree'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_degree') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 
                      </div> <!--/.row-->
                   </div>  <!--/.education1-->

                   <div class="education2">
                     <h3 class="form-tab-title" >Education Level</h3>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Institute'}}" name="institue" /> 
                            @if ($errors->has('institue'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('institue') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="Result" name="agent_result" /> 
                            @if ($errors->has('agent_result'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_result') }}
                              </span>
                              @endif 
                          </div>     
                        </div>

                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="agent_degree" class="form-control">
                                  <option value="">Select Degree</option>
                                  <option value="SSC">SSC</option>
                                  <option value="HSC">HSC</option>
                                  <option value="Bachelor">Bachelor</option>
                                  <option value="Masters">Masters</option>
                                  <option value="BBA">BBA</option>
                                  <option value="MBA">MBA</option>
                              </select>
                                @if ($errors->has('agent_degree'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_degree') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 
                      </div> <!--/.row-->
                   </div>  <!--/.education2-->


                   <div class="education3">
                     <h3 class="form-tab-title" >Education Level </h3>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Institute'}}" name="institue" /> 
                            @if ($errors->has('institue'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('institue') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="Result" name="agent_result" /> 
                            @if ($errors->has('agent_result'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_result') }}
                              </span>
                              @endif 
                          </div>     
                        </div>

                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="agent_degree" class="form-control">
                                  <option value="">Select Degree</option>
                                  <option value="SSC">SSC</option>
                                  <option value="HSC">HSC</option>
                                  <option value="Bachelor">Bachelor</option>
                                  <option value="Masters">Masters</option>
                                  <option value="BBA">BBA</option>
                                  <option value="MBA">MBA</option>
                              </select>
                                @if ($errors->has('agent_degree'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_degree') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 
                      </div> <!--/.row-->
                   </div>  <!--/.education3-->

                   <div class="education_records"> 
                   <div class="education4">
                     <h3 class="form-tab-title">Education Level</h3>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Institute'}}" name="institue" /> 
                            @if ($errors->has('institue'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('institue') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        <div class="col-md-6">
                           <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="Result" name="agent_result" /> 
                            @if ($errors->has('agent_result'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_result') }}
                              </span>
                              @endif 
                          </div>     
                        </div>

                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="agent_degree" class="form-control">
                                  <option value="" style="color:#88888">Select Degree</option>
                                  <option value="SSC">SSC</option>
                                  <option value="HSC">HSC</option>
                                  <option value="Bachelor">Bachelor</option>
                                  <option value="Masters">Masters</option>
                                  <option value="BBA">BBA</option>
                                  <option value="MBA">MBA</option>
                              </select>
                                @if ($errors->has('agent_degree'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('agent_degree') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 
                      </div> <!--/.row-->
                   </div>  <!--/.education4-->
                   </div>

                  <div class="education_records_dynamic"></div> <!--/.more-education-field-add-->

                  
                  
                  
                  <a class="btn btn-primary continue agr-btn pull-right">Continue</a>
                  <a class="btn btn-primary back agr-btn pull-right">Go Back</a>
                  <a class="extra-fields-education btn btn-primary agr-btn" href="#">+ Add More</a>
                </div> <!--tab2-->

                <div role="tabpanel" class="tab-pane" id="employment_tab">
                  <div class="employment_records">
                    <h3 class="form-tab-title">Employment</h3>
                    <div class="employment">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Company'}}" name="company" /> 
                            @if ($errors->has('company'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('company') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="position" class="form-control">
                                <option value="">Select Position</option>
                                <option value="Executive">Executive</option>
                                <option value="Officer">Officer</option>
                                <option value="Asst. Manager etc">Asst. Manager etc.</option>
                              </select>
                                @if ($errors->has('position'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('position') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 

                        <div class="col-md-6">
                          <div class="form-group agr-fields search-fields">
                              <select name="department" class="form-control">
                                <option value="">Select Department</option>
                                <option value="Sales">Sales </option>
                                <option value="Marketing">Marketing</option>
                                <option value="HR">HR</option>
                                <option value="Admin">Admin</option>
                              </select>
                                @if ($errors->has('department'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('department') }}
                              </span>
                              @endif 
                          </div> 
                        </div> 
                      </div> <!--/.row-->
                  </div>
                </div>

                <div class="employment_records_dynamic"></div>

                  
                  <a class="btn btn-primary continue agr-btn pull-right">Continue</a>
                  <a class="btn btn-primary back agr-btn pull-right">Go Back</a>
                  <a class="extra-fields-employment btn btn-primary agr-btn" href="#"> + Add More</a>
                </div> <!--tab3-->


                <div role="tabpanel" class="tab-pane" id="skill_tab">
                  
                  <div class="skill_records">
                     <h3 class="form-tab-title">Skill</h3>
                    <div class="skill-tab-content">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'skill'}}" name="skill"/> 
                            @if ($errors->has('skill'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('skill') }}
                              </span>
                              @endif 
                          </div>     
                        </div>
                      </div> <!--/.row-->
                   </div>
                  </div> 

                  <div class="skill_records_dynamic"></div>

                  
                  <a class="btn btn-primary continue agr-btn pull-right">Continue</a>
                  <a class="btn btn-primary back agr-btn pull-right">Go Back</a>
                  <a class="extra-fields-skill btn btn-primary  agr-btn" href="#">+ Add More</a>
                </div> <!--tab4-->

                <div role="tabpanel" class="tab-pane" id="social_tab">
                  <h3 class="form-tab-title">Social</h3>
                  <div class="social-tab-content">

                      <div class="row">
                        <div class="col-md-12">

                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'LinkedIn Profile'}}" name="linkedin"/> 
                            @if ($errors->has('linkedin'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('linkedin') }}
                              </span>
                              @endif 
                          </div> 

                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Google Link'}}" name="google"/> 
                            @if ($errors->has('google'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('google') }}
                              </span>
                              @endif 
                          </div>

                          <div class="form-group agr-fields">
                            <input type="text" class="form-control" placeholder="{{'Facebook Profile'}}" name="facebook"/> 
                            @if ($errors->has('facebook'))
                              <span style="color:#fb0303">
                                  {{ $errors->first('facebook') }}
                              </span>
                              @endif 
                          </div>
                        </div>
                      </div> <!--/.row-->

                      <div class="row">
                        
                        <div class="col-md-6">
                          <div id="form1" runat="server" class="form-group agr-fields">
                            <label class="control-label">Upload Profile Image</label>
                            <input type='file' id="file-input-profile" class="form-control"/>
                            <div id='img_contain'>
                              <img id="image-preview-profile" align='middle'src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="your image" title=''/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div id="form1" runat="server" class="form-group agr-fields">
                          <label class="control-label">Upload Cover Image</label>
                            <input type='file' id="file-input-cover" class="form-control"/>
                            <div id='img_contain'>
                              <img id="image-preview-cover" align='middle'src="{{ URL::asset('site_assets/img/avatar.png') }}" alt="your image" title=''/>
                            </div>
                          </div>
                        </div>


                      </div> <!--/.row-->


                  </div>
                  <a class="btn btn-primary back agr-btn pull-right">Go Back</a>
                  <a class="btn btn-primary continue agr-btn pull-right">Submit</a>
                </div> <!--tab5-->
              </div>



            </div> <!--tab-content-->
            {!! Form::close() !!} 
            <div id="push"></div>
          </div> <!--agent-registration-form-->

        </div> <!--col-md-6 col-md-offset-3-->

          


             
      </div>
    
    </div>
     
  </section>

@endsection
@section("styles")
  <link rel="stylesheet" href="{{ URL::asset('site_assets/datepicker/datepicker.css') }}">
@endsection
@section("scripts")
  <!-- Plugins -->
  <script src="{{ URL::asset('site_assets/datepicker/plugins.min.js') }}"></script>

  <!-- App Scripts -->
  <script src="{{ URL::asset('site_assets/datepicker/scripts.js') }}"></script>

  <script>

    // tab click continue
     $('.continue').click(function(){
      $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });

    $('.back').click(function(){
      $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });

    //image file upload profile
    $( document ).ready(function() { 
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image-preview-profile').attr('src', e.target.result);
        $('#image-preview-profile').hide();
        $('#image-preview-profile').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input-profile").change(function() {
    readURL(this);
  });
});
  //image file upload cover
  $( document ).ready(function() { 
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#image-preview-cover').attr('src', e.target.result);
        $('#image-preview-cover').hide();
        $('#image-preview-cover').fadeIn(650);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#file-input-cover").change(function() {
    readURL(this);
  });

});

// Education Field add more

$( document ).ready(function() { 
  $('.extra-fields-employment').click(function() {
    $('.employment_records').clone().appendTo('.employment_records_dynamic');
    $('.employment_records_dynamic .employment_records').addClass('single remove');
    $('.single .extra-fields-employment').remove();
    $('.single').append('<a href="#" class="remove-field btn-remove-customer btn btn-danger agr-remove pull-right"><i class="fa fa-times"></i></a>');
    $('.employment_records_dynamic > .single').attr("class", "remove");

    $('.employment_records_dynamic input').each(function() {
      var count = 0;
      var fieldname = $(this).attr("name");
      $(this).attr('name', fieldname + count);
      count++;
    });

  });

  $(document).on('click', '.remove-field', function(e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
  });

});


// Employment Field add more

$( document ).ready(function() { 
  $('.extra-fields-education').click(function() {
    $('.education_records').clone().appendTo('.education_records_dynamic');
    $('.education_records_dynamic .education_records').addClass('single remove');
    $('.single .extra-fields-education').remove();
    $('.single').append('<a href="#" class="remove-field btn-remove-customer btn btn-danger agr-remove pull-right"><i class="fa fa-times"></i></a>');
    $('.education_records_dynamic > .single').attr("class", "remove");

    $('.education_records_dynamic input').each(function() {
      var count = 0;
      var fieldname = $(this).attr("name");
      $(this).attr('name', fieldname + count);
      count++;
    });

  });

  $(document).on('click', '.remove-field', function(e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
  });

});

// skill Field add more

$( document ).ready(function() { 
  $('.extra-fields-skill').click(function() {
    $('.skill_records').clone().appendTo('.skill_records_dynamic');
    $('.skill_records_dynamic .skill_records').addClass('single remove');
    $('.single .extra-fields-skill').remove();
    $('.single').append('<a href="#" class="remove-field btn-remove-customer btn btn-danger agr-remove pull-right"><i class="fa fa-times"></i></a>');
    $('.skill_records_dynamic > .single').attr("class", "remove");

    $('.skill_records_dynamic input').each(function() {
      var count = 0;
      var fieldname = $(this).attr("name");
      $(this).attr('name', fieldname + count);
      count++;
    });

  });

  $(document).on('click', '.remove-field', function(e) {
    $(this).parent('.remove').remove();
    e.preventDefault();
  });

});


  </script>

@endsection  