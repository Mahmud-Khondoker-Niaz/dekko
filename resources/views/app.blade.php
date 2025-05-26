<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <title>@yield('head_title', getcong('site_name'))</title>
  <meta name="description" content="@yield('head_description', getcong('site_description'))">
    <meta property="keywords" content="@yield('head_keywords', getcong('site_keywords'))" />
    <meta name="google-site-verification" content="-LOWTfxqxJdocs1Z_P1jY5vRcrWNB3Bcevx_66SO2x0" />
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="@yield('head_title',  getcong('site_name'))"/>
    <meta property="og:description" content="@yield('head_description', getcong('site_description'))"/>
    
    <meta property="og:image" content="@yield('head_image', url('/upload/logo.png'))" />
    <meta property="og:url" content="@yield('head_url', url('/'))" />
    <link rel="canonical" href="@yield('head_url', url('/'))" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">
   <link href="https://fonts.googleapis.com/css?family=Scada:400,700|Open+Sans:400,300,700" rel="stylesheet" type="text/css">

  <!-- Fav and touch icons -->
   <link href="{{ URL::asset('upload/'.getcong('site_favicon')) }}" rel="shortcut icon" type="image/x-icon" />
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

   <link href="{{ URL::asset('site_assets/css/style.css') }}" rel="stylesheet" />
    <link id="main-style-file-css" rel="stylesheet" href="{{ URL::asset('site_assets/css/style_new.css') }}"/>
    <link href="{{ URL::asset('site_assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ URL::asset('site_assets/dist/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('site_assets/font-awesome/css/font-awesome.min.css') }}">
    <link href="{{ URL::asset('site_assets/css/responsive.css') }}" rel="stylesheet" />
    
    @yield("styles")

    @if(request()->segment('1')=='login' or request()->segment('1')=='register')
      
      <script src='https://www.google.com/recaptcha/api.js'></script>
    
    @endif

    <link rel="stylesheet" href="{{ URL::asset('site_assets/css/jquery-eu-cookie-law-popup.css') }}"> 
  <!-- Facebook Pixel Code -->
  <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '358109605523117');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=358109605523117&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YZLKWF09DT"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YZLKWF09DT');
</script>

</head>
<body class="home-page-2 property-listing-page row-listing submit-property property-details not-found @if(request()->segment('1')=='user') agent-details-page @endif @if(request()->segment('1')=='agents') agents-page @endif">


	  @include("_particles.header")

	  @yield("content")
	  
	
	  @include("_particles.footer")
	  
  <div class="eupopup eupopup-bottom"></div>
  <script src="{{ URL::asset('site_assets/dist/js/jquery-3.5.1.slim.min.js') }}"></script>
  <script src="{{ URL::asset('site_assets/dist/js/popper.min.js') }}"></script>
{{-- if i want to go back before situation ( jodi popup na chai tahole) the below without version link has to undo and version link has to comment out, script tag soho bijoy modal purata comment out এবং নিচের @yeild script এর আগের লিঙ্ক টি কমেন্ট আউট করতে হবে। --}}
 <script src="{{ URL::asset('site_assets/dist/js/bootstrap.min.js') }}"></script>
  <!-- For PopUp Showing-->
<!-- <script src="{{ URL::asset('site_assets/dist/4.5.0/js/bootstrap.min.js') }}"></script>-->
  
 
<!-- <script type="text/javascript">-->
<!--    $(document).ready(function(){-->
<!--      $("#bijoyModal").modal('show');-->
<!--    });-->

<!--</script> -->
  
  <!-- JS Include Section --> 


<script type="text/javascript" src="{{ URL::asset('site_assets/js/jquery-1.11.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('site_assets/js/helper.js') }}"></script>
  <!-- <script type="text/javascript" src="{{ URL::asset('site_assets/js/select2.min.js') }}"></script> -->
  <script type="text/javascript" src="{{ URL::asset('site_assets/js/ion.rangeSlider.min.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('site_assets/js/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('site_assets/js/jquery-eu-cookie-law-popup.js') }}"></script> 

  <script type="text/javascript" src="{{ URL::asset('site_assets/js/template.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('site_assets/js/bootstrap-tagsinput.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('site_assets/js/jquery.cycle.all.js') }}"></script>



  <!--<script type="text/javascript" src="{{ URL::asset('site_assets/font-awesome/js/bootstrap-tagsinput.js') }}"></script> -->
{{-- আরিফ ভাই দিতে বলছিল এই font awesome --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <!-- End of JS Include Section -->
{{-- For showing popup this cdn link has to be used and have to undo Bijoy modal offer code (index.blade.php er ekdm last e)--}}
  <!--<script  type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>-->

  @yield("scripts")
  <script src="{{ URL::asset('site_assets/js/jquery-ui.min.js') }}"></script>
  <?php
  $item_info = json_encode(DB::table('upazilas')->select('name as label', 'id as value')->get());
  ?>
  <script type="text/javascript">
 
    var productList = <?php echo $item_info; ?>; 

    APchange = function(event, ui){
        $(this).data("autocomplete").menu.activeMenu.children(":first-child").trigger("click");
    }
    function invoice_productList(cName) {

        var qnttClass = 'ctnqntt'+cName;
        var total_tax_price = 'total_tax_'+cName;
        var variant_id ='variant_id_'+cName;
        //var available_quantity = 'available_quantity_'+cName;
        var unit = 'unit_'+cName;
        var unit_type = 'unit_type_'+cName;
        var priceClass = 'price_item'+cName;
        var discount = 'discount_'+cName;
        var total_price = 'total_price_'+cName;
        
        $( ".productSelection" ).autocomplete(
        {
            source: productList,
            delay:300,
            focus: function(event, ui) {
                $(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
                $(this).val(ui.item.label);
                return false;
            },
            select: function(event, ui) {
                $(this).parent().find(".autocomplete_hidden_value").val(ui.item.value);
                $(this).val(ui.item.label);
                var id=ui.item.value;
                var dataString = 'product_id='+ id;
                var base_url = $('.baseUrl').val();
                 
                
                $(this).unbind("change");
                return false;
            }
        });
        $( ".productSelection" ).focus(function(){
            $(this).change(APchange);
        });
    }




  
  $(document).ready( function() {
  if ($(".eupopup").length > 0) {
    $(document).euCookieLawPopup().init({
       'cookiePolicyUrl' : '{{stripslashes(getcong('gdpr_cookie_url'))}}',
       'buttonContinueTitle' : '{{trans('words.gdpr_continue')}}',
       'buttonLearnmoreTitle' : '{{trans('words.gdpr_learn_more')}}',
       'popupPosition' : 'bottom',
       'colorStyle' : 'default',
       'compactStyle' : false,
       'popupTitle' : '{{stripslashes(getcong('gdpr_cookie_title'))}}',
       'popupText' : '{{stripslashes(getcong('gdpr_cookie_text'))}}'
    });
  }
});
</script>

  
    

<script type="text/javascript">
var abc = 0;
//function increment() {
    
//};
$(document).ready(function() {
    $('#add_more').click(function() {//When Add More Files button Clicked these function Willbe Called (new file field is added dynamically)
        $(this).before($("<div/>", {id: 'filediv'}).fadeIn('slow').append(
                $("<input/>", {name: 'gallery_file[]', type: 'file', id: 'file'}),        
                $("")
                ));
    });

$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                //increment();
                abc += 1;
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '{{ URL::asset('site_assets/img/x.png') }}', alt: 'delete'}).click(function() {
                //$(this).parent().parent().remove();
                $(this).parent().remove();
                }));
            }
        });
        
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };

    $('#upload').click(function(e) {
        var name = $(":file").val();
        if (!name)
        {
            alert("First Image Must Be Selected");
            e.preventDefault();
        }
    });
});

 
</script>

@if(request()->segment('1')=='contact-us')
<script type="text/javascript">
    function initialize() {
      var myLatLng = new google.maps.LatLng({{getcong('contact_lat')}}, {{getcong('contact_long')}});
      var mapOptions = {
        zoom: 16,
        center: myLatLng,
        // This is where you would paste any style found on Snazzy Maps.
        styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:51},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]},{featureType:"water",elementType:"labels",stylers:[{visibility:"off"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#ffff00"},{lightness:-25},{saturation:-97}]}],

        // Extra options
        scrollwheel: false,
        mapTypeControl: false,
        panControl: false,
        zoomControlOptions: {
          style   : google.maps.ZoomControlStyle.SMALL,
          position: google.maps.ControlPosition.LEFT_BOTTOM
        }
      }
      var map = new google.maps.Map(document.getElementById('contact-map'),mapOptions);

      var image = '{{ URL::asset("site_assets/img/marker.png") }}';

      var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image
      });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
  </script>
@endif

<script type="text/javascript">
  
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send?phone=+8801538007855&text=Hello%21%20I%20am%20interested to know%20about%20your property." class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
<a href="https://www.facebook.com/dekkofoodsltd" class="floatfacebook" target="_blank">
<i class="fa fa-facebook my-float"></i>
</a>

<style>
  .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	left:40px;
	background-color:#25d366;
	color:#fff;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.floatfacebook{
	position:fixed;
	width:60px;
	height:60px;
	bottom:120px;
	left:40px;
	background-color:#204b86;
	color:#fff;
	border-radius:50px;
	text-align:center;
  font-size:30px;
	box-shadow: 2px 2px 3px #999;
  z-index:100;
}
.floatback {
  position: fixed;
  /* width: 30px;
  height: 30px; */
  Top: 90px; /* Adjust the top position according to your header height */
  left: 40px;
  border-radius: 20%;
  /* background-color: #25d366; */
  color: #037a6a;
  text-align: center;
  font-size: 35px;
  /* box-shadow: 2px 2px 3px #999; */
  z-index: 100;
  transition: background-color 0.3s ease;
}



.my-float{
	margin-top:16px;
}
  </style>
</body>
 
</html>