@extends("admin.admin_app")

@section("content")

<div id="main">

	<div class="page-header">
		<h2> {{'Profile Details' }}</h2>		
		<a href="{{ URL::to('admin/inquiries') }}" class="btn btn-default-light btn-xs"><i class="md md-backspace"></i> {{trans('words.back')}}</a>	  
	</div>


   
    <div id="cv-profile">
        <div class="row">
            <div class="col-md-3">
                <div class="cvprofile-sidebar-box" id="cvsidebar">
                    <div class="cvprofile-users bg-gray">
                        <div class="cvprofile-user-image">
                            <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alter="">
                        </div>
                        <div class="cvprofile-user-bio">
                            <strong>Kazi Manzur Ahmed</strong><br>
                            <a href="#">View My Profile</a>
                        </div>
                    </div>

                    <ul class="nav flex-column cv-profile-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#cvprofile_experience"><i class="fa fa-briefcase"></i> Experience</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cvprofile_education"><i class="fa fa-graduation-cap"></i> Education</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cvprofile_skill"><i class="fa fa-angellist"></i> Skill</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cvprofile_language"><i class="fa fa-globe"></i> Language</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cvprofile_additional_info"><i class="fa fa-certificate"></i> Additional Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#cvprofile_about_me"><i class="fa fa-user"></i> About Me</a>
                        </li>
                    
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-lock"></i> Privecy Setting</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9">
                <div class="cvprofile-body-box">

                    <div class="cvprofile-top-btn pull-right">
                         <ul class="list-inline cvprofile-actionbtn">
                            <li><a href="#"><i class="fa fa-print"></i></a></li>
                            <li><a href="#"><i class="fa fa-download"></i></a></li>
                        </ul>
                    </div>

                     <div class="cvprofile-users">
                        <div class="cvprofile-user-photo">
                            <img src="{{ URL::asset('site_assets/img/avatar.png') }}" alter="">
                        </div>
                        <div class="cvprofile-user-details">
                            <strong>Kazi Manzur Ahmed</strong><br>
                            <span>Director (11 months)</span><br>
                            <span>Rupayan Housing Estate Ltd</span>

                            <ul class="list-inline cvprofile-contact">
                                <li><i class="fa fa-phone"></i> +(880) 01759444222</li>
                                <li><i class="fa fa-envelope"></i> kazi.manzurahmed@gmail.com</li>
                                <li> $ USD</li>
                                <li><i class="fa fa-map-marker"></i> Bangladesh</li>
                            </ul>
                        </div>
                        <hr>
                     </div>

                     <section id="cvprofile_experience" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> Experience</strong>
                            <p>23 years of total Experience</p>
                        </div>

                         <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Nov 2019 present</span><br>
                                    <span>11 Month</span>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>Director</strong><br>
                                    <span>Rupayan Housing Estate Ltd | Bangladesh</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Nov 2019 present</span><br>
                                    <span>11 Month</span>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>Director</strong><br>
                                    <span>Rupayan Housing Estate Ltd | Bangladesh</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Nov 2019 present</span><br>
                                    <span>11 Month</span>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>Director</strong><br>
                                    <span>Rupayan Housing Estate Ltd | Bangladesh</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                            <tr>
                                                <td>Industry</td>
                                                <td>Property/Real Estate</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->
                    </section> <!--Experience section-->


                    <section id="cvprofile_education" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> Education</strong>
                        </div>

                         <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->
                    </section> <!--Education section-->

                    <section id="cvprofile_skill" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> Skill</strong>
                        </div>

                         <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>2008</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <strong>University of libarty of USA</strong><br>
                                    <span>Master's Degree in Business study.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Major</td>
                                                <td>Marketing</td>
                                            </tr>
                                            <tr>
                                                <td>Grade</td>
                                                <td>Grade A/ 1st Class</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->
                    </section> <!--skill section-->

                    <section id="cvprofile_language" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> Language</strong>
                        </div>

                         <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>English</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>Profency Lavel 0 poor, 10 Excellent.</span><br>
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Spoken</td>
                                                <td>Written</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>10</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Bengali</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                     <table class="table no-border">                                         
                                        <tbody>
                                            <tr>
                                                <td>Spoken</td>
                                                <td>Written</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>10</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--row-->
                    </section> <!--Language section-->


                    <section id="cvprofile_additional_info" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> Additional Info</strong>
                        </div>

                         <div class="row  paddingbottom5">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Expected Salary</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>USD$ 7000</span>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row paddingbottom5">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Prefered Location</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>Any where in Dhaka.</span>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row paddingbottom5">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Other Information</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>I am good at playing footbal, kabadi, dariabandh. so this is text about my hoby working..</span>
                                </div>
                            </div>
                        </div> <!--row-->
                      
                    </section> <!--Additional Info section-->



                    <section id="cvprofile_about_me" class="cvprofile-section-box">
                        <div class="cvprofile-top-heading">
                            <strong><i class="fa fa-home"></i> About me</strong>
                        </div>

                         <div class="row paddingbottom5 ">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Gender</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>Male</span>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row paddingbottom5 ">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Age</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>42 years</span>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row paddingbottom5 ">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Age</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>42 years</span>
                                </div>
                            </div>
                        </div> <!--row-->

                        <div class="row paddingbottom5 ">
                            <div class="col-lg-3">
                                <div class="cvprofile-topic">
                                    <span>Address</span><br>
                                </div>
                            </div>

                            <div class="col-lg-9">
                                 <div class="cvprofile-topic-contents">
                                    <span>I am good at playing footbal, kabadi, dariabandh. so this is text about my hoby working..</span>
                                </div>
                            </div>
                        </div> <!--row-->
                    </section> <!--Additional Info section-->

                     

                </div>
            </div>

        </div>
    </div>
    
</div>



<script>
jQuery(window).scroll(function () {
	"use strict";
	var haderSec = jQuery("body, #cvsidebar");
	jQuery(document).scrollTop() > 170 ? haderSec.addClass("sticky") : haderSec.removeClass("sticky");
});

</script>
@endsection