@extends('frontEnd.layouts.master')
        @section('content')
        <!-- Breadcrumb area -->
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumb_container">
                            <div class="breadcrumb_tablecell">
                                <h1>About Us</h1>
                                <ul class="about_breadcrumb">
                                    <li><a href="#">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                                    <li>About</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Mission Statement area -->
        <section class="mission_statement">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="mission_text text-center">
                            <h1>We bring freedom, fairness and fraternity to the world of travel</h1>
                            <p><strong>faretrim</strong> mission statement </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="double_col_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="double_col_text">
                            <h3>How it all started</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
                            Learn about our first decade of building faretrim in our <span>Inside Story!</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="double_col_img">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg2.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <section class="single_col_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="single_col_text">
                            <h3>Faretrim Today</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                             Quis ipsum suspendisse ultrices gravida. Risus commodo viverra 
                             maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet,
                              consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
                              labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.
                               Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                               Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                 Quis ipsum suspendisse ultrices gravida. Risus commodo
                                  viverra maecenas accumsan lacus vel facilisis. 
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                   sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra
                                     maecenas accumsan lacus vel facilisis.
                            </p>
                        </div>
                        <div class="single_col_img">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg3.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="single_col_text">
                            <h3>We ignite opportunity by setting the world in motion</h3>
                            <p>Good things happen when people can move, whether across town or 
                            toward their dreams. Opportunities appear, open up, become reality. 
                            What started as a way to tap a button to get a ride has led to billions 
                            of moments of human connection as people around the world go all kinds of
                             places in all kinds of ways with the help of our technology.
                            </p>
                        </div>
                        <div class="single_col_img">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg4.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="double_col_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="double_col_text">
                            <h3>Rides and beyond</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsa
                            lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet
                            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
                            facilisis.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="double_col_img">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg5.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-push-6">
                        <div class="double_col_text">
                            <h3>Your safety drives us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas 
                            accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur 
                            adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                            incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. 
                            Risus commodo viverra maecenas accumsan lacus vel facilisis.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-pull-6">
                        <div class="double_col_img">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg6.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section> 
        <!-- Company Info -->
        <section class="company_info_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="info_title">
                            <h2>Company info</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="single_info">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg7.jpg')}}" alt="">
                            <h3>Who's driving faretrim</h3>
                            <p>We’re building a culture within Uber that emphasizes doing the right thing, period,
                            for riders, drivers,and employees. Find out more about the team that’s leading the way.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="single_info">
                            <img src="{{asset('frontEnd/assets/img/about_page_bg8.jpg')}}" alt="">
                            <h3>Getting diversity right</h3>
                            <p>We’re building a culture within Uber that emphasizes doing the right thing, period,
                            for riders, drivers,and employees. Find out more about the team that’s leading the way.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- App Download area -->
        <section class="app_download_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="download_title">
                            Download faretrim app
                        </h1>  
                    </div>
                </div>
                <div class="row d-flex justify-content-lg-center">
                    <div class="col-sm-offset-1 col-sm-2 col-sm-3">
                        <div class="text-center demo_phone">
                            <img src="{{asset('frontEnd/assets/img/app_download_phone.png')}}" alt="" class="app_download_img">
                        </div>
                        
                    </div>
                    <div class="col-sm-8 col-sm-9">
                        <div class="row">
                            <div class="col-xs-12">                    
                                <div class="single_download_app_icon ">
                                    <div class="download_icon_container">
                                        <div class="download_icon_tablecell">
                                            <h1>Rider App</h1>
                                            <a href="#"><img src="{{asset('frontEnd/assets/img/icon_appstor.png')}}" alt="" class="rider_apple_icon"></a>
                                            <a href="#"><img src="{{asset('frontEnd/assets/img/icon_playstor.png')}}" alt="" class="rider_android_icon"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">                    
                                <div class="single_download_app_icon ">
                                    <div class="download_icon_container">
                                        <div class="download_icon_tablecell">
                                            <h1>Rider App</h1>
                                            <a href="#"><img src="{{asset('frontEnd/assets/img/icon_appstor.png')}}" alt="" class="rider_apple_icon"></a>
                                            <a href="#"><img src="{{asset('frontEnd/assets/img/icon_playstor.png')}}" alt="" class="rider_android_icon"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
      @endsection