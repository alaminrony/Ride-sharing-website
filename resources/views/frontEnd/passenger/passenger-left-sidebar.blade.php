<div class="left-dashbord-content">
    <div class="header-grid">
        <div class="text-center">
            <h5>Dashboard</h5>
            <img src="{{url($passenger->avatar)}}" alt="profile" class="img-fluid" style="width:75px;height:75px;border: 4px solid #EE7C2B;padding-bottom: 0 !important;">
            <p>{{$passenger->full_name}}<br /></p>
        </div>
    </div>
    <div id="list-dashboard-item" class="list-item-dashboard">
        <div class="list-content">
            <p class="d-flex text-white justify-content-between cursorPointer">
                <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pro.png')}}" alt=""> My Account</span>
                <span><i class="fa fa-angle-right"></i></span>
            </p>
            <ul style="display: none;" class="ml-4">
                <li><a href="{{url('passenger-profile?passengerId='.$passenger->id)}}">My Profile</a></li>
                <li><a href="{{url('passenger-edit-profile?passengerId='.$passenger->id)}}">Edit Profile</a></li>
            </ul>
        </div>
        <div class="list-content">
            <p class="d-flex text-white justify-content-between cursorPointer">
                <span><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/ride.png')}}" alt="">Ride History</span>
                <span><i class="fa fa-angle-right"></i></span>
            </p>
            <ul style="display: none;" class="ml-4">
                <li><a href="{{url('passenger-ride-history?passengerId='.$passenger->id)}}">List Ride</a></li>
                <li><a href="{{url('passenger-ride-complete?passengerId='.$passenger->id)}}">Complete Ride</a></li>
                <li><a href="{{url('passenger-ride-cancel-history?passengerId='.$passenger->id)}}">Cancle Ride</a></li>
            </ul>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('passenger-notification?passengerId='.$passenger->id)}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/notification.png')}}" alt=""> Notifications</a>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('passenger-password-change?passengerId='.$passenger->id)}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/pass.png')}}" alt=""> Change Password</a>
        </div>
        <div class="list-content">
            <a class="text-white" href="{{url('passenger-logout')}}"><img class="img-fluid mr-2" src="{{asset('frontEnd/assets/img/dashboard/l.png')}}" alt=""> Logout</a>
        </div>
    </div>
</div>