@extends('frontEnd.layouts.master')
@section('content')
<!-- Breadcrumb area -->
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_container">
                    <div class="breadcrumb_tablecell">
                        <h1>Latest News</h1>
                        <ul class="about_breadcrumb">
                            <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                            <li><a href="{{url('list-latest-news')}}">Latest News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Grid Section -->
<section class="blog-bg">
    <div class="container">
        <div class="blog-content">
            <div class="blog-header d-flex justify-content-between">
                <h3>Latest News List Grid View</h3>
                <div>
                    <ul class="d-flex">
                        <li class="mr-2"><a href="{{url('list-latest-news')}}">List View <i class="fa fa-list" aria-hidden="true"></i></a></li>
                        <li><a href="{{url('grid-list-latest-news')}}">Grid View <i class="fa fa-th" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="blog-grid-grid-main-content">
                @if($latestNews->isNotEmpty())
                @foreach($latestNews as $news)
                <div>
                    <div class="blog-left-content">
                        <a href="{{url("latest-news/{$news->id}/details")}}"><img class="img-fluid" src="{{asset($news->image)}}" alt="1"></a>
                    </div>
                    <div class="blog-right-content">
                        <a href="{{url("latest-news/{$news->id}/details")}}"><h5>{{$news->title}}</h5></a>
                        <p class="admin">Created By: {{$users[$news->created_by]??''}} <span class="pl-2">Date: {{date('j M Y \a\t h:i A',strtotime($news->created_at))}}</span></p>
                        <p class="main-content">{{Str::limit($news->description,200)}}<span class="seeMore"><a href="{{url("latest-news/{$news->id}/details")}}">See More</a></span>
                        </p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="paginatin">
               {!! $latestNews->links() !!}
            </div>
        </div>
    </div>
</section>
@endsection