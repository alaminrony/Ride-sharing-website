@extends('frontEnd.layouts.master')
@section('content')
<section class="breadcrumb_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="breadcrumb_container">
                    <div class="breadcrumb_tablecell">
                        <h1>Safety</h1>
                        <ul class="about_breadcrumb">
                            <li><a href="{{url('/')}}">Home</a> <span><i class="fa fa-long-arrow-right"></i></span></li>
                            <li>Safety</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="safety-area">
    <div class="container">
        {!!$cmsPage->description!!}
    </div>
</section>
@include('frontEnd.layouts.download-app')
@endsection