@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
             @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="header-input-field">
                    <form action="{{url('driver-complete-ride-history-filter')}}">
                        <div class="input-grid">
                            <input type="hidden" name="driver_id" value="{{$driver->id}}">
                            <div class="">
                                <label for="inputEmail4">Start Date</label>
                                <input type="date" class="form-control" id="inputEmail4" placeholder="Email" name="start_time" value="{{Request::get('start_time')??''}}">
                            </div>
                            <div class="">
                                <label for="inputEmail4">End Date</label>
                                <input type="date" class="form-control" id="inputEmail4" placeholder="Email" name="end_time" value="{{Request::get('end_time')??''}}">
                            </div>
                            <div class="">
                                <label for="inputEmail4">Search</label>
                                <input type="text" class="form-control" id="inputEmail4" name="search_value" value="{{Request::get('search_value')??''}}">
                            </div>
                            <div class="">
                                <button>Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="header cancle-header">
                    <p>Complete Ride</p>
                </div>
                @if(Session::has('flash_message'))
                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em>{!! session('flash_message') !!}</em></div>
                @endif
                <div class="driver-notification">
                    <div class="table-grid">
                        <table id="cancle-customers">
                            <thead>
                                <tr>
                                    <th>Trip No</th>
                                    <th>Pickup address</th>
                                    <th>Destination address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($cabRides->isNotEmpty())
                                @foreach($cabRides as $cabRide)
                                <tr class="spacer">
                                    <td>#000{{$cabRide->id}}</td>
                                    <td>{{$cabRide->pickup_address}}</td>
                                    <td>{{$cabRide->destination_address}}</td>
                                    <td>
                                        <div class="d-flex justify-content-between moveDiv">
                                            <p>{{!empty($cabRide->ridestatus_id)?$rideStatus[$cabRide->ridestatus_id]:''}}</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between moveDiv">
                                            <p><a href="{{url('driver-ride-details?driverId='.$driver->id.'&ride_id='.$cabRide->id)}}" class="btn btn-secondary"><i class="fa fa-eye text-light"></i></a></p>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-between mt-3">
                        {!! $cabRides->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection