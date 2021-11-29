<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->
<ul class="dropdown-menu" style="display:block; padding: 10px;border: 2px solid #dddd;font-size: 14px;">
    @if($users->isNotEmpty())
    @foreach ($users as $user)
    <li><a href="{{url('user?userId='.$user->id)}}">{{!empty($user->first_name)?$user->first_name : ''}} {{!empty($user->last_name)?$user->last_name : ''}} (user)</a></li>
    @endforeach
    @endif

    @if($drivers->isNotEmpty())
    @foreach ($drivers as $driver)
    <li><a href="{{url('driver?driverId='.$driver->id)}}">{{!empty($driver->full_name)?$driver->full_name:''}} (driver)</a></li>
    @endforeach
    @endif

    @if($passengers->isNotEmpty())
    @foreach ($passengers as $passenger)
    <li><a href="{{url('passenger?passengerId='.$passenger->id)}}">{{!empty($passenger->full_name)?$passenger->full_name:''}} (passenger)</a></li>
    @endforeach
    @endif
    
    @if($cabRides->isNotEmpty())
    @foreach ($cabRides as $cabRide)
    <li><a href="{{url('cab-ride?rideId='.$cabRide->id)}}">{{!empty($cabRide->pickup_address)?$cabRide->pickup_address:''}} to {{!empty($cabRide->destination_address)?$cabRide->destination_address : ''}} (ride)</a></li>
    @endforeach
    @endif
    
    @if($cabs->isNotEmpty())
    @foreach ($cabs as $cab)
    <li><a href="{{'cab?cabId='.$cab->id}}">{{!empty($cab->model_number)?$cab->model_number:''}}-{{!empty($cab->number_plate)?$cab->number_plate:''}} (cab)</a></li>
    @endforeach
    @endif
</ul>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->

