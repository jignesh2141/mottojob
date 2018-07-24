<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>MottoJob</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- CSS Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/respond.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/caroufredsel.js') }}"></script>

</head>
<body>
    <!--body Content Start-->

    <!--Header Section Start-->
    <header>
        <div class="container">
            <div class="row">
                <div class="responsive-nav">
                    <a href="{{ url('/') }}"><img src="{{ asset('images/motto-job-logo.png') }}" alt="logo" /></a>
                    <div class="toggle">
                        <!-- <i class="fa fa-bars menu"></i> -->
                        <div class="menu-icon menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/') }}" class="logo"><img src="{{ asset('images/motto-job-logo.png') }}" alt="logo" /></a>
                <nav >
                    <ul>
                        
                        <li><a href="#" id="lang">English<i class="fa fa-caret-down"></i></a>
                            
                                <ul class="dropdown-lan">
                                    <li><a href="#">にほんご</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            
                        </li>
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}" class="signup">Sign Up</a></li>
                        @else 
                            <li class="{{ (Request::route()->getName() == 'mottojobs') ? 'active' : '' }}"><a href="{{ route('mottojobs') }}">Jobs</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
                <div class="clearfix"></div>
            </div>
        </div> 
    </header>
    <!--Header Section Over-->

    @yield('content')

    <!--Footer Section Start-->
    <footer>
        <div class="container">
            <ul class="social col-md-push-8">
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
            </ul>
            <ul class="footer-menu col-md-push-2">
                <li class="col-md-push-6  r-width"><a href="#">掲載をお考えの方はこちら</a></li>
                <li class="col-md-pull-6"><a href="#">Privacy</a></li>
                <li class="col-md-pull-6"><a href="#">Terms</a></li>
                <li class="col-md-pull-6"><a href="#">Contact</a></li>
                
            </ul>
            
            <div class="copyright col-md-pull-4">
                <p>©2018Bunpo.inc</p>
            </div>
        </div>
        
    </footer>
    
    <!--Footer Section Over-->


    <!--body Content Over-->

    <!--Javascript Content -->

    <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

</body>
</html>