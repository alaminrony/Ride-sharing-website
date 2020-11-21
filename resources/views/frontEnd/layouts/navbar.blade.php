<body onload="myFunction()">
    <!--<div id="loading"></div>-->
    <div id='ajaxLoader' style='display: none;'></div>
    <?php use App\CustomMethod;?>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <!-- Header area -->
    <div class="off_canvas_menu d-lg-none d-sm-block">
        <span class="menu_close"><i class="fa fa-times"></i>
        </span>
        <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('safety-page')}}">Safety</a></li>
            <li><a href="{{url('rider-page')}}">Rider</a></li>
            <li><a href="{{url('driver-page')}}">Driver</a></li>
            <li><a href="{{url('contact-us')}}">Contact</a></li>
        </ul>
    </div>
    <div class="off_canvas_overlay d-none"></div>
    <header id="myHeader">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class=" col-sm-12 col-xs-12 col-lg-3">
                        <div class="logo"> 
                            <a  href="{{url('/')}}"><img src="{{asset('frontEnd/assets/img/new-logo.png')}}" alt="faretrim-logo"></a>
                        </div>
                    </div>
                    <div class=" col-sm-6 col-xs-6 col-lg-3">
                        <div class="header-icon-area">
                            <ul>
                                @if(Auth::guard('driver')->check())
                                <li><a href="{{url('driver-logout')}}"><img src="{{asset('frontEnd/assets/img/login-icon.png')}}" alt="">Logout</a></li>
                                <li><a href="{{url('driver-profile?driverId='.Auth::guard('driver')->user()->id)}}"><img src="{{asset('frontEnd/assets/img/login-icon.png')}}" alt="">Welcome {{CustomMethod::lastName(Auth::guard('driver')->user()->full_name)}}</a></li>
                                @elseif(Auth::guard('passenger')->check())
                                <li><a href="{{url('passenger-logout')}}"><img src="{{asset('frontEnd/assets/img/login-icon.png')}}" alt="">Logout</a></li>
                                
                                <li><a href="{{url('passenger-profile?passengerId='.Auth::guard('passenger')->user()->id)}}"><img src="{{asset('frontEnd/assets/img/login-icon.png')}}" alt="">Welcome {{CustomMethod::lastName(Auth::guard('passenger')->user()->full_name)}}</a></li>
                                @else
                                <li><a href="{{url('front-login')}}"><img src="{{asset('frontEnd/assets/img/login-icon.png')}}" alt="">Login</a></li>
                                <li><a href="{{url('front-signup')}}"><img src="{{asset('frontEnd/assets/img/signup-icon.png')}}" alt="">Sign Up</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class=" col-sm-6 col-xs-6 col-lg-6">
                        <div class="main-menu">
                            <ul id="nav">
                                <li>
                                    <div id="menu-button">
                                        <div class="bar"></div>
                                        <div class="bar"></div>
                                        <div class="bar"></div>
                                    </div>
                                </li>
                                <li><a href="{{url('/')}}">Home</a></li>
                                <li><a href="{{url('safety-page')}}">Safety</a></li>
                                <li><a href="{{url('rider-page')}}">Rider</a></li>
                                <li><a href="{{url('driver-page')}}">Driver</a></li>
                                <li><a href="{{url('contact-us')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

