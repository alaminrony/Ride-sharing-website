<div class="left-dashbord-content">
    <div class="header-grid">
        <div class="text-center">
            <h5>Dashboard</h5>
            <img src="{{url($driver->profile_photo)}}" alt="profile" class="img-fluid" style="width:75px;height:75px;border: 4px solid #EE7C2B;padding-bottom: 0 !important;">
            <p>{{$driver->full_name}}<br /> <span>Status: {{$driver->is_online == '1' ? 'Online' : 'Offline'}}</span></p>
        </div>
    </div>
    <div id="list-dashboard-item" class="list-item-dashboard">
        <div class="list-content">
            <p class="d-flex text-white justify-content-between cursorPointer">
                <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt=""> My Account</span>
                <span><i class="fa fa-angle-right"></i></span>
            </p>
            <ul style="display: none;" class="ml-4">
                <li class="active"><a href="{{url('driver-profile?driverId='.$driver->id)}}">My Profile</a></li>
                <li><a href="{{url('driver-edit-profile?driverId='.$driver->id)}}">Edit Profile</a></li>
            </ul>
        </div>
        <div class="list-content">
            <a class="text-white" href=""><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/bill.png')}}" alt=""> My Bill</a>
        </div>
        <div class="list-content">
            <p class="d-flex text-white justify-content-between cursorPointer">
                <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/vehicles.png')}}" alt=""> My Vehicles</span>
                <span><i class="fa fa-angle-right"></i></span>
            </p>
            <ul style="display: none;" class="ml-4">
                <li><a href="{{url('vehicles-list?driverId='.$driver->id)}}">My Vehicles</a></li>
                <li><a href="{{url('add-vehicles?driverId='.$driver->id)}}">Add Vehicles</a></li>
            </ul>
        </div>
        <div class="list-content">
            <p class="d-flex text-white justify-content-between cursorPointer">
                <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/ride.png')}}" alt="">Ride History</span>
                <span><i class="fa fa-angle-right"></i></span>
            </p>
            <ul style="display: none;" class="ml-4">
                <li><a href="{{url('driver-ride-history?driverId='.$driver->id)}}">List Ride</a></li>
                <li><a href="{{url('driver-ride-complete?driverId='.$driver->id)}}">Complete Ride</a></li>
                <li><a href="{{url('driver-ride-cancel-history?driverId='.$driver->id)}}">Cancle Ride</a></li>
            </ul>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('driver-notification?driverId='.$driver->id)}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/notification.png')}}" alt=""> Notifications</a>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('driver-dashbord-password?driverId='.$driver->id)}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pass.png')}}" alt=""> Change Password</a>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('driver-logout')}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/l.png')}}" alt=""> Logout</a>
        </div>
    </div>
</div>