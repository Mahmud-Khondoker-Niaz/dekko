@extends("admin.admin_app")

@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <h2 style="text-align: center;">Advisor Details</h2>
                        <a href="{{url('admin/userpdf/'.Crypt::encryptString($user->id))}}"  class="btn" style="float:right;" >Export Pdf</a>

                        @if (isset($user->profile_image))
                            <img class="align-self-center mr-3" src="{{ URL::asset($user->profile_image) }}" width="100"
                                height="100" alt="person">
                        @endif

                    </th>



                </tr>
                <tr>

                    <th>
                        <h4> Personal Information </h4>
                    </th>
                </tr>


            </thead>
            <tbody>

                <tr>

                    <td>

                        <div class="col-sm-4">
                            <b>Name:</b> {{ $user->name }}<br>
                        </div>
                        <div class="col-sm-4">
                            <b>Father's Name:</b> {{ $user->agent_father }}<br>

                        </div>
                        <div class="col-sm-4">
                            <b>Mother's Name:</b> {{ $user->agent_mother }}<br>

                        </div>
                    </td>

                </tr>


                <tr>
                    <td>
                        <div class="col-sm-4">
                            <b>Email:</b> {{ $user->email }}<br>
                        </div>
                        <div class="col-sm-4">
                            <b>Phone:</b> {{ $user->phone }}<br>
                        </div>

                        <div class="col-sm-4">
                            <b>Date of birth:</b> {{ $user->agent_dob }}<br>
                        </div>



                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="col-sm-4">
                            <b> Present Address:</b> {{ $user->agent_present_address }}<br>
                        </div>
                        <div class="col-sm-4">
                            <b> Permanent Address:</b> {{ $user->agent_permanent_address }}<br>
                        </div>
                        <div class="col-sm-4">
                            <b>NID Number:</b> {{ $user->agent_nid }}
                        </div>
                    </td>
                </tr>

            </tbody>
            <thead>

                <tr>

                    <th>
                        <h4>Education </h4>
                    </th>
                </tr>
            </thead>
            <thead>

                <tr>
                    <th>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Degree</strong></div>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Institute</strong></div>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Result</strong></div>
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @php
                            $educations = App\Education::where('user_id', $user->id)->get();

                        @endphp
                        @foreach ($educations as $education)

                            @if (!empty($education->institue) && !empty($education->agent_result) && !empty($education->agent_degree))


                                <div class="col-sm-4">
                                    {{ $education->agent_degree }}
                                </div>

                                <div class="col-sm-4">
                                    {{ $education->institue }}
                                </div>

                                <div class="col-sm-4">

                                    {{ $education->agent_result }}
                                </div>

                            @endif

                        @endforeach
                    </td>
                </tr>
            </tbody>


            <thead>

                <tr>

                    <th>
                        <h4>Experiences </h4>
                    </th>
                </tr>
            </thead>

            <thead>

                <tr>
                    <th>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Comapny</strong></div>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Position</strong></div>
                        <div class="col-sm-4" style="font-size: 16px;"><strong>Department</strong></div>


                    </th>

                </tr>
            </thead>

            <tbody>
                <tr>

                    <td>

                        @php
                            $companys = App\Company::where('user_id', $user->id)->get();

                        @endphp
                        @foreach ($companys as $company)
                            @if (!empty($company->company) && !empty($company->position) && !empty($company->department))
                                <div class="col-sm-4">
                                    {{ $company->company }}
                                </div>

                                <div class="col-sm-4">
                                    {{ $company->position }}
                                </div>

                                <div class="col-sm-4">

                                    {{ $company->department }}
                                </div>



                            @endif


                        @endforeach



                    </td>
                </tr>


            </tbody>
            <thead>
<tr>
    <th>
        Years Of Experience : {{$user->yrs_exp}}
    </th>
</tr>

            </thead>

        @if (isset($user->skill))
        <thead>
            <tr>
                <th>
                    <b>Skill:</b> {{ $user->skill }}<br>

                </th>
            </tr>


        </thead>
    @endif

        </table>
<p class="text-muted" style="text-align: center;">I have read and accepted all the tearms and conditions</p><br><br>
<p style="text-decoration: overline black;">Advisor/Seller Signature</p><br><br>

    </div>




@endsection
