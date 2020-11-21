@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
           @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="header">
                    <p>Notifications</p>
                </div>
                <div class="driver-notification">
                    @if($driverNotifications->isNotEmpty())
                    @foreach($driverNotifications as $notification)
                    <div class="content">
                        <p class="header-first">Title: {{$notification->title}}</p>
                        <div class="description">
                            <p>Description</p>
                            <p>{{$notification->notification_details}}</p>
                            <p class="text-right font-weight-bold">{{date('d F Y \a\t h:i a',strtotime($notification->created_at))}}</p>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    <div class="d-flex justify-content-between mt-3">
                        {!!$driverNotifications->withQueryString()->links()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection