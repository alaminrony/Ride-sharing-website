@extends('frontEnd.layouts.master')
@section('content')
<!-- Breadcrumb area -->
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_container">
                    <div class="breadcrumb_tablecell">
                        <h1>{{$cmsPage->title}}</h1>
                        <ul class="about_breadcrumb">
                            <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                            <li>Guidelines</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Terms & Condition  area -->
<section class="terms-area">
    <div class="container">
        <h1>{{$cmsPage->title}}</h1>
        <p>{!!$cmsPage->description !!}</p>
    </div>
</section>
@endsection