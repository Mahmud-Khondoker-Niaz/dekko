<div class="information-box property-agent-container" id="ContactBox">

          <h3>@if($agent->usertype=='Agents') {{trans('words.contact_agent')}} @else {{trans('words.contact_owner')}} @endif</h3>
          <div class="box-content clearfix">
            <div class="col-md-5 agent-container">
              <div class="agent-box">
                <div class="inner-container">
                  <a href="{{URL::to('user/details/'.$agent->id)}}" class="img-container">
                     @if($agent->image_icon)
                    <img src="{{ URL::asset('upload/members/'.$agent->image_icon.'-b.jpg') }}" alt="{{$agent->name}}">
                    @else
                    <img src="{{ URL::asset('site_assets/img/agent_default.jpg') }}" alt="{{$agent->name}}">
                    @endif
                  </a>
                  <div class="bott-sec">
                    <div class="name"><a href="{{URL::to('user/details/'.$agent->id)}}">{{$agent->name}}</a></div>
                     <div class="desc">
                      {{$agent->about}}
                    </div>
                    <a href="{{URL::to('user/details/'.$agent->id)}}" class="view-listing">{{trans('words.view_listing')}}</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-7 contact-form-container" id="agentscontact_sec">
              
              {!! Form::open(array('url'=>'agentscontact','method'=>'POST', 'id'=>'agent_contact_form')) !!}

              <input type="hidden" name="property_id" value="{{$property->id}}">
              <input type="hidden" name="lead_name" value="{{$property->property_name}}">
                         
              <input type="hidden" name="agent_id" value="{{$agent->id}}">
              <input type="hidden" name="lead_type" value="property">


              <div class="contact-form">
                <div class="field-box">
                  <input type="text" placeholder="{{trans('words.name')}} *" name="name">
                  @if ($errors->has('name'))
                    <span style="color:#fb0303">
                        {{ $errors->first('name') }}
                    </span>
                 @endif
                </div>
                <div class="field-box">
                  <input type="email" placeholder="{{trans('words.email')}} *" name="email">
                  @if ($errors->has('email'))
                    <span style="color:#fb0303">
                        {{ $errors->first('email') }}
                    </span>
                 @endif
                </div>
                <div class="field-box">
                  <input type="text" placeholder="{{trans('words.phone')}}" name="phone">
                </div>
                <textarea id="message" name="message" placeholder="{{trans('words.message')}} *"></textarea>
                @if ($errors->has('message'))
                    <span style="color:#fb0303">
                        {{ $errors->first('message') }}
                    </span>
                    <br><br>
                 @endif
                <button type="submit" class="btn btn-lg submit" name="submit">{{trans('words.submit')}}</button>
              </div>
              {!! Form::close() !!}

            </div>
          </div>
        </div> <!--/.contact-agent-->