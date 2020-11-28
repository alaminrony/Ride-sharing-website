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

                    <div class="blog mt-3">
                        <p class="blog">Latest News</p>
                        @if($sideBarNews->isNotEmpty())
                        @foreach($sideBarNews as $sidNews)
                        <div class="blog-inner-content">
                            <p>{{$sidNews->title}}</p>
                            <a href="{{url('latest-news/'.$sidNews->id.'/details')}}"><p class="seeMore">View Details</p></a>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    <div class="detail-bottom mt-3">
                        <p class="tag">Tags</p>
                        <div class="tag-content">
                            <p>
                                <?php
                                $keywordsArr = explode(',', $latestNews->key_words);
                                ?>
                                @if(count($keywordsArr) > 0)
                                @foreach($keywordsArr as $keyword)
                                <a href="{{url("latest-news-by-keyword/".$keyword)}}"><span>{{$keyword}}</span></a>
                                @endforeach
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection