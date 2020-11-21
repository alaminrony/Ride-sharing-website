@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.passenger.passenger-left-sidebar')
            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottom">
                    <p>My Profile</p>
                    <p><a href="{{url('passenger-edit-profile?passengerId='.$passenger->id)}}"><img src="{{asset('frontEnd/assets/img/dashboard/edit.png')}}" alt="Edit" class="img-fluid"></a></p>
                </div>
                <div class="form">
                    <table id="customers">
                        @if(!empty($passenger))
                        <tr>
                            <td>Name</td>
                            <td>{{$passenger->full_name}}</td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>{{$passenger->phone}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$passenger->email}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$passenger->gender}}</td>
                        </tr>
                        <tr>
                            <td>Profile Photo</td>
                            <td><img src="{{url($passenger->avatar)}}" alt="profile image" class="image-size"></td>
                        </tr>

                        <tr>
                            <td>Created At</td>
                            <td>{{date('d F Y \a\t h:i a',strtotime($passenger->created_at))}}</td>
                        </tr>
                        @endif
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection