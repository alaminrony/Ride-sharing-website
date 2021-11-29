@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area" style="min-height: 1000px;font-size: 30px;">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">
        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert" >
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
</section>
@endsection
