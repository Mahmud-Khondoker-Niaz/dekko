@extends("app")

@section('head_title', $page_info->page_title.' | '.getcong('site_name') )
@section('head_url', Request::url())

@section("content")
 

  <!-- begin:content -->
    <section class="main-container container">
    <h2 class="hsq-heading type-1">{{$page_info->page_title}}</h2>
    <div class="content clearfix"> 
      <div class="desc" style="text-align: justify;color: #333333;">
        {!!stripslashes($page_info->page_content)!!}
      </div>
    </div>
  </section>
    <!-- end:content -->
 
@endsection
