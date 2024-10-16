<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="{{ URL::to('public/assets/web/images/fab-i.png')}}" type="image/x-icon" />
<link rel="icon" href="{{ URL::to('public/assets/web/images/fab-i.png')}}" type="image/x-icon" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/main.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/vendors.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/custome.css')}}">

<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/owlcarousel/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/owlcarousel/owl.theme.default.min.css')}}">

<!-- Bootstrap v4.0 CSS -->
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/my_style.css')}}">
<link rel="stylesheet" href="{{ URL::to('public/assets/web/css/fonts.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<title>Tourbix</title>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('styles')
</head>
<body>

    @include('web.layouts.header')
   
    @yield('content')
    @include('web.layouts.footer')
    @yield('modal')


    
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap 4.0 JS --> 
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script> 
<!--<script src="js/jquery-3.2.1.slim.min.js"></script>--> 
<script src="{{ URL::to('public/assets/web/js/popper.min.js')}}"></script> 
<script src="{{ URL::to('public/assets/web/js/bootstrap.min.js')}}"></script> 

<script src="{{ URL::to('public/assets/web/css/owlcarousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{ URL::to('public/assets/web/js/wf.accordion.min.js')}}" defer></script>

<script>
$(document).ready(function() {
  $('.sliding-link').click(function(event) {
	  var aid = $(this).attr("href");
    $('body, html').animate({scrollTop: $(aid).offset().top},'slow');
  });
});
</script>



<script>
  $(document).ready(function() {
    $('.sliding-link').click(function(event) {
      var aid = $(this).attr("href");
      $('body, html').animate({scrollTop: $(aid).offset().top},'slow');
    });
  });
  </script>
  
  <script>
    var laft_arrow = "{{URL::to('public/assets/web/images/left-aro.png')}}";
    var right_arrow = "{{URL::to('public/assets/web/images/right-aro.png')}}";

    var i_left = "{{URL::to('public/assets/web/images/i-left.png')}}";
    var i_right = "{{URL::to('public/assets/web/images/i-right.png')}}";

      $('.owl-trending').owlCarousel({
      stagePadding: 50,
      loop:true,
      margin:20,
          nav:true,
        navText: [`<img src='${laft_arrow}'>`,`<img src='${right_arrow}'>`],
      autoplay:true,
          autoplayTimeout:6000,
          autoplayHoverPause:false,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          nav:true
        },
        600:{
          items:2,
          nav:true
        },
        1000:{
          items:4,
          nav:true,
          loop:true
        }
      }
    });
    
    $('.owl-product-list').owlCarousel({
      stagePadding: 0,
      loop:true,
      margin:0,
          nav:true,
        navText: [`<img src='${i_left}'>`,`<img src='${i_right}'>`],
      autoplay:false,
          autoplayTimeout:6000,
          autoplayHoverPause:false,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
        },
        600:{
          items:1,
        },
        1000:{
          items:1,
          loop:true
        }
      }
    });

    	
    $('.owl-product-date').owlCarousel({
    stagePadding: 0,
    loop: true,
    margin: 10, // Adjust margin between items if needed
    nav: true,
    navText: [`<img src='${i_left}'>`, `<img src='${i_right}'>`],
    autoplay: false,
    autoplayTimeout: 6000,
    autoplayHoverPause: false,
    responsiveClass: true,
    responsive: {
        0: {
            items: 1, // Number of items on extra small screens
        },
        600: {
            items: 3, // Number of items on small screens
        },
        1000: {
            items: 7, // Number of items on larger screens
        }
    }
});

  </script> 
  
  <script>
  function openPage(pageName, elmnt, color) {
    // Hide all elements with class="tabcontent" by default */
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent-inner");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    // Remove the background color of all tablinks/buttons
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].style.borderBottom = "0px solid rgb(0, 86, 179)";
    }
  
    // Show the specific tab content
    document.getElementById(pageName).style.display = "block";
  
    // Add the specific color to the button used to open the tab content
    elmnt.style.borderBottom = "2px solid rgb(0, 86, 179)";
  }
  
  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
  </script>
  
  @yield('scripts')
</body>
</html>