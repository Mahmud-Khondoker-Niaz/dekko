
<!-- Modal -->
<div class="modal fade" id="contactAgentModel{{$property->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
         <button type="button" class="close agentContModelclose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-body">
       <div class="information-box property-agent-container text-center" id="ContactBox">
        <h3>{{trans('words.contact_agent')}}</h3>
        <div class="box-content clearfix">

          <div class=" contact-form-container" id="agentscontact_sec">
            
            {!! Form::open(array('url'=>'agentscontact','method'=>'POST', 'name'=>'registration', 'id'=>'agent_contact_form')) !!}

            <input type="hidden" name="property_id" value="{{$property->id}}">
            <input type="hidden" name="enquiry_property" value="{{$property->property_name}}">
            <input type="hidden" name="lead_source" value="Website">
            <input type="hidden" name="property_location[]" value="{{$property->location}}">


            <div class="contact-form">
              <div class="field-box">
                <input type="text" placeholder="{{trans('words.name')}} *" id="name" name="name">
                @if ($errors->has('name'))
                  <span style="color:#fb0303">
                      {{ $errors->first('name') }}
                  </span>
                @endif
              </div>
              <div class="field-box">
                <input type="email" placeholder="{{trans('words.email')}} *" id="email" name="email">
                @if ($errors->has('email'))
                  <span style="color:#fb0303">
                      {{ $errors->first('email') }}
                  </span>
                @endif
              </div>
              <div class="field-box">
                <input type="text" placeholder="{{trans('words.phone')}}" id="phone" name="phone">
              </div>
              <textarea id="message" name="message" placeholder="{{trans('words.message')}} *">I would like to inquire about Property ID {{$property->product_code}} . Please contact me at your earliest convenience. </textarea>
              @if ($errors->has('message'))
                  <span style="color:#fb0303">
                      {{ $errors->first('message') }}
                  </span>
                  <br><br>
                @endif
                <div class="button-group row no-gutters">
                <div class="col-4"><div class="btn-call-now-full"> <a href="tel:+880 1538-007855 " type="button" class="btn btn-lg submit"><i class="fa fa-phone"></i> CALL</a></div></div>
                <div class="col-8"> <button type="submit" class="btn btn-lg submit" name="submit">{{'SEND EMAIL'}}</button></div>
              </div>
            </div>
            {!! Form::close() !!}

          </div>
        </div>
        </div> <!--/.contact-agent-->
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

