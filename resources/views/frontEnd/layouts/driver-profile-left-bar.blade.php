<?php
$full_url = Request::url();
$urlArr = explode('/', $full_url);
$url = end($urlArr);
?>
<div class="left-dashbord-content">
    <div class="header-grid">
        <div class="text-center">
            <h5>Dashboard</h5>
            <img src="{{url($driver->profile_photo)}}" alt="profile" class="img-fluid" style="width:75px;height:75px;border: 4px solid #EE7C2B;padding-bottom: 0 !important;">
            <p>{{$driver->full_name}}<br /> <span>Status: {{$driver->is_online == '1' ? 'Online' : 'Offline'}}</span></p>
        </div>
    </div>
    <div id="list-dashboard-item" class="list-item-dashboard">
        <li class="hr-line">
            <div id="clickProfile">
                <a data-toggle="collapse" aria-expanded="true" href="#driverProfile">
                    <p style="" class="d-flex text-white justify-content-between cursorPointer {{ $url == 'driver-profile' || $url == 'driver-edit-profile' ? 'sidbar-active-parent' : '' }}" id="profileActive">
                        <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt=""> My Account</span>
                        <span><i class="fa fa-angle-right"></i></span>
                    </p>
                </a>
            </div>

            <div id="driverProfile" class="collapse {{ $url == 'driver-profile' || $url == 'driver-edit-profile' ? 'show' : '' }} ">
                <ul style="" class="ml-4">
                    <li>
                        <a href="{{url('driver-profile?driverId='.$driver->id)}}" class="{{ $url == 'driver-profile'  ? 'sidbar-active-child' : '' }}">My Profile</a>
                    </li>
                    <li>
                        <a href="{{url('driver-edit-profile?driverId='.$driver->id)}}" class="{{ $url == 'driver-edit-profile'  ? 'sidbar-active-child' : '' }}">Edit Profile</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="hr-line">
            <a href="{{url('my-bill?driverId='.$driver->id)}}">
                <p style="" class="d-flex text-white justify-content-between cursorPointer {{$url == 'my-bill'  ? 'sidbar-active-parent' : ''}}" id="myBillActive">
                    <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/bill.png')}}" alt=""> My Bill</span>
                    <span><i class="fa fa-angle-right"></i></span>
                </p>
            </a>
        </li>

        <li class="hr-line">
            <div id="clickVehicle">
                <a data-toggle="collapse" aria-expanded="true" href="#driverVehicle">
                    <p class="d-flex text-white justify-content-between cursorPointer {{$url == 'vehicles-list' || $url == 'add-vehicles' ? 'sidbar-active-parent' : ''}}" id="vehicleActive">
                        <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt="">My Vehicles</span>
                        <span><i class="fa fa-angle-right"></i></span>
                    </p>
                </a>
            </div>

            <div id="driverVehicle" class="collapse {{ $url == 'vehicles-list' || $url == 'add-vehicles' ? 'show' : '' }} ">
                <ul style="" class="ml-4">
                    <li>
                        <a href="{{url('vehicles-list?driverId='.$driver->id)}}" class="{{ $url == 'vehicles-list'  ? 'sidbar-active-child' : '' }}">My Vehicles</a>
                    </li>
                    <li>
                        <a href="{{url('add-vehicles?driverId='.$driver->id)}}" class="{{ $url == 'add-vehicles'  ? 'sidbar-active-child' : '' }}">Add Vehicles</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="hr-line">
            <div id="clickRideHistory">
                <a data-toggle="collapse" aria-expanded="true" href="#ride_History">
                    <p class="d-flex text-white justify-content-between cursorPointer {{$url == 'driver-ride-history' || $url == 'driver-ride-complete' || $url == 'driver-ride-cancel-history'  ? 'sidbar-active-parent' : ''}}" id="rideHistoryActive">
                        <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt="">Ride History</span>
                        <span><i class="fa fa-angle-right"></i></span>
                    </p>
                </a>
            </div>

            <div id="ride_History" class="collapse {{ $url == 'driver-ride-history' || $url == 'driver-ride-complete' || $url == 'driver-ride-cancel-history' ? 'show' : '' }} ">
                <ul style="" class="ml-4">
                    <li>
                        <a href="{{url('driver-ride-history?driverId='.$driver->id)}}" class="{{ $url == 'driver-ride-history'  ? 'sidbar-active-child' : '' }}">List Ride</a>
                    </li>
                    <li>
                        <a href="{{url('driver-ride-complete?driverId='.$driver->id)}}" class="{{ $url == 'driver-ride-complete'  ? 'sidbar-active-child' : '' }}">Complete Ride</a>
                    </li>
                    <li>
                        <a href="{{url('driver-ride-cancel-history?driverId='.$driver->id)}}" class="{{ $url == 'driver-ride-cancel-history'  ? 'sidbar-active-child' : '' }}">Cancle Ride</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="hr-line">
            <a href="{{url('driver-notification?driverId='.$driver->id)}}">
                <p style="" class="d-flex text-white justify-content-between cursorPointer {{$url == 'driver-notification'  ? 'sidbar-active-parent' : ''}}" id="notificationActive">
                    <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/notification.png')}}" alt=""> Notifications</span>
                    <span><i class="fa fa-angle-right"></i></span>
                </p>
            </a>
        </li>

        <li class="hr-line">
            <a href="{{url('driver-dashbord-password?driverId='.$driver->id)}}">
                <p style="" class="d-flex text-white justify-content-between cursorPointer {{$url == 'driver-dashbord-password'  ? 'sidbar-active-parent' : ''}}" id="changePassActive">
                    <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pass.png')}}" alt=""> Change Password</span>
                    <span><i class="fa fa-angle-right"></i></span>
                </p>
            </a>
        </li>

        <div class="list-content">
            <a class="text-white" href="{{url('driver-logout')}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/l.png')}}" alt=""> Logout</a>
        </div>
    </div>
</div>

@push('script')
<script type="text/javascript">
    $(document).on('click', '#clickProfile', function (event) {
        event.preventDefault();
        $('#profileActive').addClass('sidbar-active-parent');
        $('#vehicleActive').removeClass('sidbar-active-parent');
        $('#myBillActive').removeClass('sidbar-active-parent');
        $('#rideHistoryActive').removeClass('sidbar-active-parent');
        $('#notificationActive').removeClass('sidbar-active-parent');
        $('#changePassActive').removeClass('sidbar-active-parent');
        $('#driverVehicle').removeClass('show');
        $('#ride_History').removeClass('show');
        
    });
    $(document).on('click', '#clickVehicle', function (event) {
        event.preventDefault();
        $('#vehicleActive').addClass('sidbar-active-parent');
        $('#profileActive').removeClass('sidbar-active-parent');
        $('#myBillActive').removeClass('sidbar-active-parent');
        $('#rideHistoryActive').removeClass('sidbar-active-parent');
        $('#notificationActive').removeClass('sidbar-active-parent');
        $('#changePassActive').removeClass('sidbar-active-parent');
        $('#ride_History').removeClass('show');
        $('#driverProfile').removeClass('show');
    });
    $(document).on('click', '#clickRideHistory', function (event) {
        event.preventDefault();
        $('#clickRideHistory').addClass('sidbar-active-parent');
        $('#vehicleActive').removeClass('sidbar-active-parent');
        $('#profileActive').removeClass('sidbar-active-parent');
        $('#myBillActive').removeClass('sidbar-active-parent');
        $('#notificationActive').removeClass('sidbar-active-parent');
        $('#changePassActive').removeClass('sidbar-active-parent');
        $('#driverVehicle').removeClass('show');
        $('#driverProfile').removeClass('show');
    });
</script>
@endpush


