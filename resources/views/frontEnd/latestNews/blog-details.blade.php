@extends('frontEnd.layouts.master')
@section('content')
        <!-- Breadcrumb area -->
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="breadcrumb_container">
                            <div class="breadcrumb_tablecell">
                                <h1>Latest News Details</h1>
                                <ul class="about_breadcrumb for-blog-details">
                                    <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                                    <li><a href="{{url('list-latest-news')}}">Latest News</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                                    <li>News Details</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Section -->
        <section class="blog-bg">
            <div class="container">
                <div class="blog-details-content">
                    <div class="blog-grid-details-main-content">
                        <div class="blog-details-left-content">
                            <div class="blog-details-header">
                                <h4>{{$latestNews->title}}</h4>
                            </div>
                            <div class="blog-details-admin">
                                <p>Created By : {{$users[$latestNews->created_by]??''}} <span class="ml-3">Date: {{date('j M Y \a\t h:i A',strtotime($latestNews->created_at))}}</span></p>
                            </div>
                            <div class="detail-img">
                                <img src="{{asset($latestNews->details_image)}}" alt="bigimg" class="img-fluid">
                            </div>
                            <div class="detail-main-content">
                                <p class="mt-4">{{$latestNews->description}}</p>
                            </div>
                        </div>
                        <div class="blog-details-right-content">
                            <div class="social">
                                <p>Share</p>
                                <div class="link">
                                    <a href="#" target="_blank"><img src="{{asset('frontEnd/assets/img/blog/Blog-Details/fb.png')}}" alt="fb" class="img-fluid"></a>
                                    <a href="#" target="_blank"><img src="{{asset('frontEnd/assets/img/blog/Blog-Details/tw.png')}}" alt="tw" class="img-fluid"></a>
                                </div>
                            </div>
                            <div class="blog mt-3">
                                <p class="blog">Best Blogs</p>
                                <div class="blog-inner-content">
                                    <p>$10M USD Driver-Partner Relief Fund $10M USD Driver-Partner Relief Fund</p>
                                    <a href=""><p class="seeMore">See More</p></a>
                                </div>
                                <div class="blog-inner-content">
                                    <p>$10M USD Driver-Partner Relief Fund $10M USD Driver-Partner Relief Fund</p>
                                    <a href=""><p class="seeMore">See More</p></a>
                                </div>
                                <div class="blog-inner-content">
                                    <p>$10M USD Driver-Partner Relief Fund $10M USD Driver-Partner Relief Fund</p>
                                    <a href=""><p class="seeMore">See More</p></a>
                                </div>
                                <div class="blog-inner-content">
                                    <p>$10M USD Driver-Partner Relief Fund $10M USD Driver-Partner Relief Fund</p>
                                    <a href=""><p class="seeMore">See More</p></a>
                                </div>
                            </div>
                            <div class="detail-bottom mt-3">
                                <p class="tag">Tags</p>
                                <div class="tag-content">
                                    <p><a href="#"><span>Sydney Rideshare</span></a> <a href="#"><span>Melbourne Rideshare</span></a></p>
                                    <p><a href="#"><span>Solutions Rideshare</span></a> <a href="#"><span>Ride Solutions</span></a></p>
                                    <p><a href="#"><span>Rideshare</span></a> <a href="#"><span>Driver</span></a>  <a href="#"><span>Instarideshare</span></a></p>
                                    <p><a href="#"><span>Earn Money</span></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endsection