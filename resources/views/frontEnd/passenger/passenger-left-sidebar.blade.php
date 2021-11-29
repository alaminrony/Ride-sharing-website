<?php
$full_url = Request::url();
$urlArr = explode('/', $full_url);
$url = end($urlArr);
?>
<div class="left-dashbord-content">
    <div class="header-grid">
        <div class="text-center">
            <h5>Dashboard</h5>
            <img src="{{url($passenger->avatar)}}" alt="profile" class="img-fluid" style="width:75px;height:75px;border: 4px solid #EE7C2B;padding-bottom: 0 !important;">
            <p>{{$passenger->full_name}}<br /></p>
        </div>
    </div>
    <div id="list-dashboard-item" class="list-item-dashboard">
        <li class="hr-line">
            <div id="clickProfile">
                <a data-toggle="collapse" aria-expanded="true" href="#passengerProfile">
                    <p style="" class="d-flex text-white justify-content-between cursorPointer {{ $url == 'passenger-profile' || $url == 'passenger-edit-profile' ? 'sidbar-active-parent' : '' }}" id="profileActive">
                        <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt=""> My Account</span>
                        <span><i class="fa fa-angle-right"></i></span>
                    </p>
                </a>
            </div>

            <div id="passengerProfile" class="collapse {{ $url == 'passenger-profile' || $url == 'passenger-edit-profile' ? 'show' : '' }} ">
                <ul style="" class="ml-4">
                    <li>
                        <a href="{{url('passenger-profile?passengerId='.$passenger->id)}}" class="{{ $url == 'passenger-profile'  ? 'sidbar-active-child' : '' }}">My Profile</a>
                    </li>
                    <li>
                        <a href="{{url('passenger-edit-profile?passengerId='.$passenger->id)}}" class="{{ $url == 'passenger-edit-profile'  ? 'sidbar-active-child' : '' }}">Edit Profile</a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="hr-line">
            <div id="clickRideHistory">
                <a data-toggle="collapse" aria-expanded="true" href="#ride_History">
                    <p class="d-flex text-white justify-content-between cursorPointer {{$url == 'passenger-ride-history' || $url == 'passenger-ride-complete' || $url == 'passenger-ride-cancel-history' || $url == 'passenger-ride-details'  ? 'sidbar-active-parent' : ''}}" id="rideHistoryActive">
                        <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt="">Ride History</span>
                        <span><i class="fa fa-angle-right"></i></span>
                    </p>
                </a>
            </div>

            <div id="ride_History" class="collapse {{ $url == 'passenger-ride-history' || $url == 'passenger-ride-complete' || $url == 'passenger-ride-cancel-history' || $url == 'passenger-ride-details' ? 'show' : '' }} ">
                <ul style="" class="ml-4">
                    <li>
                        <a href="{{url('passenger-ride-history?passengerId='.$passenger->id)}}" class="{{ $url == 'passenger-ride-history'  ? 'sidbar-active-child' : '' }}">List Ride</a>
                    </li>
                    <li>
                        <a href="{{url('passenger-ride-complete?passengerId='.$passenger->id)}}" class="{{ $url == 'passenger-ride-complete'  ? 'sidbar-active-child' : '' }}">Complete Ride</a>
                    </li>
                    <li>
                        <a href="{{url('passenger-ride-cancel-history?passengerId='.$passenger->id)}}" class="{{ $url == 'passenger-ride-cancel-history'  ? 'sidbar-active-child' : '' }}">Cancle Ride</a>
                    </li>
                </ul>
            </div>
        </li>
        
  
        <li class="hr-line">
            <a href="{{url('passenger-notification?passengerId='.$passenger->id)}}">
                <p style="" class="d-flex text-white justify-content-between cursorPointer {{$url == 'passenger-notification'  ? 'sidbar-active-parent' : ''}}" id="notificationActive">
                    <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/notification.png')}}" alt=""> Notifications</span>
                    <span><i class="fa fa-angle-right"></i></span>
                </p>
            </a>
        </li>

        <li class="hr-line">
            <a href="{{url('passenger-password-change?passengerId='.$passenger->id)}}">
                <p style="" class="d-flex text-white justify-content-between cursorPointer {{$url == 'passenger-password-change'  ? 'sidbar-active-parent' : ''}}" id="changePassActive">
                    <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pass.png')}}" alt=""> Change Password</span>
                    <span><i class="fa fa-angle-right"></i></span>
                </p>
            </a>
        </li>

        <div class="list-content">
            <a class="text-white" href="{{url('passenger-logout')}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/l.png')}}" alt=""> Logout</a>
        </div>
    </div>
</div>
@push('script')
<script type="text/javascript">
    $(document).on('click', '#clickProfile', function (event) {
        event.preventDefault();
        $('#profileActive').addClass('sidbar-active-parent');
        $('#rideHistoryActive').removeClass('sidbar-active-parent');
        $('#notificationActive').removeClass('sidbar-active-parent');
        $('#changePassActive').removeClass('sidbar-active-parent');
        $('#ride_History').removeClass('show');
    });
  
    $(document).on('click', '#clickRideHistory', function (event) {
        event.preventDefault();
        $('#clickRideHistory').addClass('sidbar-active-parent');
        $('#profileActive').removeClass('sidbar-active-parent');
        $('#notificationActive').removeClass('sidbar-active-parent');
        $('#changePassActive').removeClass('sidbar-active-parent');
        $('#passengerProfile').removeClass('show');
    });
</script>
@endpush