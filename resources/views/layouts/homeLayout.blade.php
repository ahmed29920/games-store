<?php
    use App\Http\Controllers\ProductsController;
    $cart = 0 ;
    if(Auth::check()){
        $cart = ProductsController::cartItems();
        $user = 1;
    }
    else{
        $user=0;
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Sock</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
      <!-- fevicon -->
      <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
      <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif" />
      <link href="{{ asset('black') }}/css/nucleo-icons.css" rel="stylesheet" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- style css -->
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/dark.css') }}">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
        <header class="section">
        <!-- header inner -->
         <div class="header" style="background-color:#136af8">
            <div class="container">
               <div class="row">
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="index.html"><img src="{{ asset('images/logo.png') }}" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a href="{{ route('home') }}">Home</a> </li>
                                 <li> <a href="{{ route('about') }}">About</a> </li>
                                 <li><a href="{{ route('testmonial') }}">Testmonial</a></li>
                                 <li><a href="{{ route('shop') }}">Shop</a></li>
                                 @if(!Auth::user())
                                 <li class="nav-item ">
                                    <a href="{{ route('register') }}" class="nav-link">
                                          <i class="tim-icons icon-laptop"></i> {{ __('Register') }}
                                    </a>
                                 </li>
                                 <li class="nav-item ">
                                    <a href="{{ route('login') }}" class="nav-link">
                                          <i class="tim-icons icon-single-02"></i> {{ __('Login') }}
                                    </a>
                                 </li>
                                 @else
                                 <li class=" nav-item">
                                    <a href="{{ route('cartList') }}" class="contact-logo cart-logo nav-link" style="width: max-content;"><i class="fas fa-shopping-cart"> (<span class="cart-counter">{{ $cart }}</span>) </i> </a>
                                 </li> 
                                 <li class="nav-item">
                                    <a href="" class="nav-link" style="width: max-content;"><i class="fas fa-shopping-bag">(<span>0</span>)</i> </a>
                                 </li>
                                 <!-- <li class="nav-item">
                                 <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                 </li> -->
                                 <li class="dropdown nav-item">
                                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                       <i class="tim-icons icon-single-02"><b class="caret d-none d-lg-block d-xl-block"></b></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark " style="width:auto">
                                          <li class="nav-link">
                                             <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                                          </li>
                                          @if(Auth::user()->role == 'admin')
                                          <li class="nav-link">
                                             <a href="{{ route('dashboard') }}" class="nav-item dropdown-item">{{ __('Dashboard') }}</a>
                                          </li>
                                          @endif
                                          <li class="dropdown-divider"></li>
                                          <li class="nav-link">
                                             <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                                          </li>
                                    </ul>
                                 </li>
                                 @endif
                                 <li class="dropdown nav-item">
                                 <div class="form-check form-switch">
                                    <!-- Default checked -->
                                    <div class="custom-control custom-switch">
                                       <input type="checkbox" class="custom-control-input" role="switch" id="darkSwitch" checked>
                                       <label class="custom-control-label" for="darkSwitch"></label>
                                    </div>
                                 </div>
                                 </li>
                                 <!-- <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
  <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
</div> -->
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <!-- end header inner -->
        </header>
        <!-- end header -->
        <div class="content">
            @yield('content')
        </div>
    <!-- start footer -->
      <div id="footer" class="Address layout_padding">
       <div class="container">
          <div class="row">
             <div class="col-sm-12">
               <div class="titlepage">
                  <div class="main">
                     <h1 class="address_text">Address</h1>
                  </div>
               </div>
             </div>
          </div>
               <div class="address_2">
                  <div class="row">
                     <div class="col-sm-12 col-md-12 col-lg-4">
                       <div class="site_info">
                          <span class="info_icon"><img src="{{ asset('images/map-icon.png') }}" /></span>
                          <span style="margin-top: 10px;">No.123 Chalingt Gates, Supper market New York</span></div>
                     </div>
                     <div class="col-sm-12 col-md-12 col-lg-4">
                       <div class="site_info">
                          <span class="info_icon"><img src="{{ asset('images/phone-icon.png') }} " /></span>
                          <span style="margin-top: 21px;">( +71 7986543234 )</span></div>
                     </div>
                     <div class="col-sm-12 col-md-12 col-lg-4">
                       <div class="site_info">
                          <span class="info_icon"><img src="{{ asset('images/email-icon.png') }} " /></span>
                          <span style="margin-top: 21px;">demo@gmail.com</span></div>
                     </div>
                     </div> 
                  </div>
               </div>
                  <div class="menu_main">
                     <div class="menu_text">
                        <ul>
                           <li class="active"><a href="{{ route('home') }}">Home</a></li>                         
                           <li><a href="{{ route('about') }}">About</a></li>
                           <li><a href="{{ route('testmonial') }}">Testmonial</a></li>
                           <li><a href="clients.html">Shop</a></li>
                           <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
       </div>
    </div>

      <!-- end Contact Us-->
      <!-- footer start-->
      <div id="plant" class="footer layout_padding">
         <div class="container">
            <p>© 2022 All Rights Reserved. Design by <a href="https://www.linkedin.com/in/muhamed3li/" target="_blank">   Mohammed Ali   </a>  &    <a href="https://www.linkedin.com/in/ahmed-ashraf-4b7359222/" target="_blank">  Ahmed Ashraf  </a>   </p>
         </div>
      </div>

      <!-- Javascript files-->
      <script src="{{ asset('js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/popper.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('js/plugin.js') }}"></script>
      <script src="{{ asset('js/dark.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('js/custom.js') }}"></script>
      <!-- javascript --> 
      <script src="{{ asset('js/owl.carousel.js') }}"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
         openEffect: "none",
         closeEffect: "none"
         });
         
         $(".zoom").hover(function(){
         
         $(this).addClass('transition');
         }, function(){
         
         $(this).removeClass('transition');
         });
         });
         
      </script> 
   </body>
</html>