@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container" style="min-height: 400px;">
        <br>
        <br>
        <br>
        <br>
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="font-size: 30px;padding: 30px 0px;">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
    </div>
</section>
@endsection
