<?php require __DIR__.'./../../../app/core/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    <base href="{{base}}">
    <!-- Font awesome -->
    <link href="public/client/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="public/client/css/bootstrap.css" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="public/client/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="public/client/css/jquery.simpleLens.css">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="public/client/css/slick.css">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="public/client/css/nouislider.css">
    <!-- Theme color -->
    <link id="switcher" href="public/client/css/theme-color/default-theme.css" rel="stylesheet">
    <!-- <link id="switcher" href="public/client/css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="public/client/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="public/client/css/style.css" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  

  </head>
  <style>
    .size-product-img{
      max-width: 250px;
      min-width: 250px;
      max-height: 300px;
      min-height: 300px;
      object-fit: cover;
    }
  </style>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="public/client/img/flag/english.jpg" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="public/client/img/flag/french.jpg" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="public/client/img/flag/english.jpg" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  @if(Session::exists('NameCustomer'))
                  <li><a href="javascript:void(0)"><i class="fa fa-user"></i> Xin chào {{ Session::get('NameCustomer') }}</a></li>
                  <li><a href="{{route('Logout')}}">Đăng Xuất <i class="fa fa-sign-out"></i></a></li>
                  @else
                  <li><a href="{{route('Login')}}"><i class="fa fa-lock"></i> Đăng Nhập </a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="{{route('index')}}">
                  <span class="fa fa-shopping-cart"></span>
                  <p>ShopPing<strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="public/client/img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="{{route('Cart')}}">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ Hàng</span>
                  <span class="aa-cart-notify">{{$data['QuantityProduct']}}</span>
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    @if(isset($_SESSION['Cart']))
                    @foreach($_SESSION['Cart'] as $key=>$values)
                    <li>
                      <a class="aa-cartbox-img" href="#"><img style="max-width: 150px; max-height: 150px; object-fit: cover;" src="public/images/products/{{ $values['img'] }}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{ $values['name'] }}</a></h4>
                        <p>{{$values['quantity']}} x {{  number_format ($values['price'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." )}}</p>
                      </div>
                      <a class="aa-remove-product" href="{{ route('DeleteCart',[ 'id'=>$values['id'] ] ) }}"><span class="fa fa-times"></span></a>
                    </li>  
                    @endforeach
                               
                    <li>
                      <span class="aa-cartbox-total-title">
                        Tổng tiền
                      </span>
                      <span class="aa-cartbox-total-price">
                        {{ number_format ($data['TotalAll'] , $decimals = 0 , $dec_point = "," , $thousands_sep = "." ) }} VND
                      </span>
                    </li>
                    @else
                    <li>
                      <span class="aa-cartbox-total-title">
                        Vui lòng thêm sản phẩm
                      </span>
                    </li>
                    @endif 
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{route('CheckOut')}}">Thanh Toán</a>
                  
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="{{route('SearchProduct')}}" method="get">
                  <input type="text" name="content" id="" placeholder="Tìm kiếm sản phẩm">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{route('index')}}">Trang Chủ</a></li>
              <li><a href="{{route('Products',['id'=>0])}}">Sản Phẩm</a></li>      
              <li><a href="{{route('Contact')}}">Liên Hệ </a>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  @yield('ClientContent')
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->
  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Trang Chủ</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Discount</a></li>
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Useful Links</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Site Map</a></li>
                      <li><a href="#">Search</a></li>
                      <li><a href="#">Advanced Search</a></li>
                      <li><a href="#">Suppliers</a></li>
                      <li><a href="#">FAQ</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Contact Us</h3>
                    <address>
                      <p> 25 Astor Pl, NY 10003, USA</p>
                      <p><span class="fa fa-phone"></span>+1 212-982-4589</p>
                      <p><span class="fa fa-envelope"></span>dailyshop@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  <!-- Login Modal -->  
  <!-- <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Đăng Nhập</h4>
          <form class="aa-login-form" action="{{route('Login')}}" method="POST">
          {{ csrf_field() }}
            <label for="">Tài Khoản<span>*</span></label>
            <input type="text" placeholder="Nhập tài khoản" name="user">
            <label for="">Mật Khẩu<span>*</span></label>
            <input type="password" placeholder="Nhập mật khẩu" name="password">
            <div style="display: flex; justify-content: center;"><button name="Login" value="1"  class="aa-browse-btn text-center" type="submit">Đăng Nhập</button></div>
            <div class="aa-register-now">
              Nếu bạn chưa có tài khoản<a href="account.html">Đăng kí ngay</a>
            </div>
          </form>
        </div>                        
      </div>
    </div>
  </div>     -->

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="public/client/js/bootstrap.js"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="public/client/js/jquery.smartmenus.js"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="public/client/js/jquery.smartmenus.bootstrap.js"></script>  
  <!-- To Slider JS -->
  <script src="public/client/js/sequence.js"></script>
  <script src="public/client/js/sequence-theme.modern-slide-in.js"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="public/client/js/jquery.simpleGallery.js"></script>
  <script type="text/javascript" src="public/client/js/jquery.simpleLens.js"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="public/client/js/slick.js"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="public/client/js/nouislider.js"></script>
  <!-- Custom js -->
  <script src="public/client/js/custom.js"></script> 

  </body>
</html>