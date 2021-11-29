@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottom">
                    <p>My vehicles</p>
                    <p><a href="{{url('add-vehicles?driverId='.$driver->id)}}"><img src="{{asset('frontEnd/assets/img/dashboard/plus.png')}}" alt="Edit" class="img-fluid"></a></p>
                </div>
                @if(Session::has('flash_message'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em>{!! session('flash_message') !!}</em></div>
                @endif
                <div class="my-vehicles">
                    <div class="table-content-grid">
                        @if($vehicleLists->isNotEmpty())
                        @foreach($vehicleLists as $vehicle)
                        <div>
                            <div class="table-img">
                                <img src="{{url($vehicle->photo)}}" alt="car1" class="img-fluid">
                            </div>
                        </div>
                        <div class="table-content-inner">
                            <div class="d-flex justify-content-between">
                                <div class="text">
                                    <p>{{$vehicle->model_number}}</p>
                                </div>
                                <div class="text">
                                    <p>{{$vehicle->number_plate}}</p>
                                </div>
                                <div class="d-flex">
                                    <p><label class="containerCheckBox mt-2">
                                            <input type="checkbox" <?php
                                            if (!empty($selectedVehicleId) && ($selectedVehicleId == $vehicle->id)) {
                                                echo 'checked';
                                            } else {
                                                echo '';
                                            }
                                            ?> name='status' value="1" class="status-radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </p>
                                    <p><a href="{{url('view-vehicle?driverId='.$vehicle->driver_id.'&&vehicleId='.$vehicle->id)}}"><img src="{{asset('frontEnd/assets/img/dashboard/diary.png')}}" alt="diary"></a></p>
                                    <p class="mx-2"><a href="{{url('edit-vehicle?driverId='.$vehicle->driver_id.'&&vehicleId='.$vehicle->id)}}"><img src="{{asset('frontEnd/assets/img/dashboard/edit-color.png')}}" alt="diary"></a></p>
                                    <p><a href="{{url('delete-vehicle?driverId='.$vehicle->driver_id.'&&vehicleId='.$vehicle->id)}}" onclick="return confirm('Are you sure, you want to delete?');"><img src="{{asset('frontEnd/assets/img/dashboard/d-color.png')}}" alt="diary"></a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div>No Data Found</div>
                        @endif
                    </div>
                    <div class="upper-text-one">Photo</div>
                    <div class="upper-text-two">Model</div>
                    <div class="upper-text-three">License No</div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
