@extends('frontEnd.layouts.master')
@section('content')
        <!-- Driver Dashboard area -->
        <section class="driver_dashboard_area">
            <div class="container">
                <div class="dashboard-grid">
                    @include('frontEnd.layouts.driver-profile-left-bar')
                    <div class="right-dashbord-content">
                        <div class="d-flex justify-content-between marginBottom">
                            <p>My Profile</p>
                            <p><a href="{{url('driver-edit-profile?driverId='.$driver->id)}}"><img src="{{asset('frontEnd/assets/img/dashboard/edit.png')}}" alt="Edit" class="img-fluid"></a></p>
                        </div>
                        
                        <div class="form">
                            @if(!empty($driver))
                            <table id="customers">
                                <tr>
                                  <td>Name</td>
                                  <td>{{$driver->full_name}}</td>
                                </tr>
                                <tr>
                                  <td>Phone</td>
                                  <td>{{$driver->phone}}</td>
                                </tr>
                                <tr>
                                  <td>Email</td>
                                  <td>{{$driver->email}}</td>
                                </tr>
                                <tr>
                                  <td>Gender</td>
                                  <td>{{$driver->gender}}</td>
                                </tr>
                                <tr>
                                  <td>Post Code</td>
                                  <td>{{$driver->post_code}}</td>
                                </tr>
                                <tr>
                                  <td>Address</td>
                                  <td>{{$driver->address}}</td>
                                </tr>
                                @if($driver->date_of_birth)
                                <tr>
                                  <td>Date of Birth</td>
                                  <td>{{$driver->date_of_birth}}</td>
                                </tr>
                                @endif
                                <tr>
                                  <td>Driving License No</td>
                                  <td>{{$driver->driving_licence_no}}</td>
                                </tr>
                                <tr>
                                  <td>Driving License Expiry Date</td>
                                  <td>{{$driver->driving_licence_expire_date}}</td>
                                </tr>
                                <tr>
                                  <td>Australian Taxi Licence No</td>
                                  <td>{{$driver->australian_taxi_licence_no}}</td>
                                </tr>
                                <tr>
                                  <td>Australian Taxi Licence Expiry Date</td>
                                  <td>{{$driver->australian_taxi_licence_expire_date}}</td>
                                </tr>
                                <tr>
                                  <td>Profile Photo</td>
                                  <td><img src="{{url($driver->profile_photo)}}" alt="profile image" class="image-size"></td>
                                </tr>
                                <tr>
                                  <td>Driving Licence Front</td>
                                  <td><img src="{{url($driver->driving_licence_photo_front)}}" alt="Driving Licence Front" class="image-size"></td>
                                </tr>
                                <tr>
                                  <td>Driving Licence Back</td>
                                  <td><img src="{{url($driver->driving_licence_photo_back)}}" alt="Driving Licence Back" class="image-size"></td>
                                </tr>
                                <tr>
                                  <td>Australian Taxi Licence Front</td>
                                  <td><img src="{{url($driver->atln_photo_front)}}" alt="Australian Taxi Licence Front" class="image-size"></td>
                                </tr>
                                <tr>
                                  <td>Australian Taxi Licence Back</td>
                                  <td><img src="{{url($driver->atln_photo_back)}}" alt="Australian Taxi Licence Back" class="image-size"></td>
                                </tr>
                                <tr>
                                  <td>Created At</td>
                                  <td>{{date('d F Y \a\t h:i a',strtotime($driver->created_at))}}</td>
                                </tr>
                              </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
      @endsection