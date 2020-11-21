@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
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
