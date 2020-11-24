@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="header">
                    <p>Edit Profile</p>
                </div>
                @include('frontEnd.layouts.alert-message')
                <div class="form driver-edit-form">
                    <form  id="profileEditForm">
                        <input type="hidden" name="driver_id" value="{{$driver->id}}">
                        <div class="form-row-grid">
                            <div>
                                <label for="full_name">Name</label>
                                <input type="name" id="full_name" placeholder="Name" name="full_name" value="{{$driver->full_name}}">
                                <div class="text-danger" id="full_name_error"></div>
                            </div>

                            <div>
                                <label for="phone">Phone Number</label>
                                <input type="" id="phone" placeholder="Phone" name="phone" value="{{$driver->phone}}">
                                <div class="text-danger" id="phone_error"></div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="email">E-mail Address</label>
                                <input type="name" id="email" placeholder="E-mail" name="email" value="{{$driver->email}}">
                                <div class="text-danger" id="email_error"></div>
                            </div>

                            <div>
                                <label for="post_code">Post Code</label>
                                <input type="number" id="post_code" placeholder="Post Code" name="post_code" value="{{$driver->post_code}}">
                                <div class="text-danger" id="post_code_error"></div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="address">Address</label>
                                <input type="name" id="address" placeholder="Address" name="address" value="{{$driver->address}}">
                                <div class="text-danger" id="address_error"></div>
                            </div>

                            <div>
                                <label for="gender">Gender</label>
                                <select class="form-control w-100" name="gender" id="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male" <?= $driver->gender == 'Male' ? 'selected="selected"' : '' ?>>Male</option>
                                    <option value="Female"  <?= $driver->gender == 'Female' ? 'selected="selected"' : '' ?>>Female</option>
                                </select>
                                <div class="text-danger" id="gender_error"></div>
                            </div>

                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="city">City</label>
                                <input type="text" id="city" placeholder="City" name="city" value="{{$driver->city}}">
                                <div class="text-danger" id="city_error"></div>
                            </div>

                            <div>
                                <label for="state">State</label>
                                <input type="text" id="state" placeholder="State" name="state" value="{{$driver->state}}">
                                <div class="text-danger" id="state_error"></div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="driving_licence_no">Driving license no</label>
                                <input type="name" id="driving_licence_no" placeholder="Driving license no" name="driving_licence_no" value="{{$driver->driving_licence_no}}">
                                <div class="text-danger" id="driving_licence_no_error"></div>
                            </div>

                            <div>
                                <label for="australian_taxi_licence_no">Australian Taxi license no</label>
                                <input type="mumber" id="australian_taxi_licence_no" placeholder="Australian driver no" name="australian_taxi_licence_no" value="{{$driver->australian_taxi_licence_no}}">
                                <div class="text-danger" id="australian_taxi_licence_no_error"></div>
                            </div>

                        </div>
                        <div class="form-row-grid">
                            <div class="calender-input">
                                <label for="driving_licence_expire_date">Driving Licence Expiry Date</label>
                                <input type="date" id="driving_licence_expire_date"  name="driving_licence_expire_date" value="{{$driver->driving_licence_expire_date}}">
                                <div class="text-danger" id="driving_licence_expire_date_error"></div>
                            </div>
                            <div class="calender-input">
                                <label for="australian_taxi_licence_expire_date">Australian Taxi license Expiry Date</label>
                                <input type="date" id="australian_taxi_licence_expire_date"  name="australian_taxi_licence_expire_date" value="{{$driver->australian_taxi_licence_expire_date}}">
                                <div class="text-danger" id="australian_taxi_licence_expire_date_error"></div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div class="calender-input">
                                <label for="date_of_birth">Date of birth</label>
                                <input class="form-control" type="date"  title="Date of birth" placeholder="Date of birth" name="date_of_birth" value="{{$driver->date_of_birth}}">
                                <div class="text-danger" id="date_of_birth_error"></div>
                            </div>
                            <div>
                                <label for="created_at">Created at</label>
                                <input type="text" id="created_at" placeholder="Created at" value="{{date('d F Y \a\t h:i a',strtotime($driver->created_at))}}">
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="profile_photo">Profile Photo</label>
                                <img src="{{url($driver->profile_photo)}}" alt="Driving Licence Front" class="image-size" style="float: right;" id="profile_photo">
                                <img src="#" alt="Profile Photo" class="image-size" style="display: none;float: right;" id="profile_photo_preview">
                                <div class="text-danger" id="profile_photo_error"></div>
                            </div>

                            <div>
                                <div class="d-flex design-btn">
                                    <button id="profile_photo_input_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="profile_photo"  id="profile_photo_input" style="display: none;float: right;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="">Driving Licence Front</label>
                                <img src="{{url($driver->driving_licence_photo_front)}}" class="image-size" style="float: right;" id="driving_licence_photo_front">
                                <img src="#" alt="Driving Licence Front" class="image-size" style="display: none;float: right;" id="driving_licence_photo_front_preview">
                                <div class="text-danger" id="driving_licence_photo_front_error"></div>
                            </div>

                            <div>
                                <div class="d-flex design-btn">
                                    <button id="driving_licence_photo_front_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="driving_licence_photo_front"  id="driving_licence_photo_front_input" style="display: none;float: right;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="">Driving Licence Back</label>
                                <img src="{{url($driver->driving_licence_photo_back)}}" class="image-size" style="float: right;" id="driving_licence_photo_back"/>
                                <img src="#" alt="Driving Licence Front" class="image-size" style="display: none;float: right;" id="driving_licence_photo_back_preview">
                                <div class="text-danger" id="driving_licence_photo_back_error"></div>
                            </div>

                            <div>
                                <div class="d-flex design-btn">
                                    <button id="driving_licence_photo_back_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="driving_licence_photo_back"  id="driving_licence_photo_back_input" style="display: none;float: right;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="">Australian Taxi Licence Front</label>
                                <img src="{{url($driver->atln_photo_front)}}" class="image-size" style="float: right;" id="atln_photo_front"/>
                                <img src="#" alt="Driving Licence Front" class="image-size" style="display: none;float: right;" id="atln_photo_front_preview">
                                <div class="text-danger" id="atln_photo_front_error"></div>
                            </div>

                            <div>
                                <div class="d-flex design-btn">
                                    <button id="atln_photo_front_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="atln_photo_front"  id="atln_photo_front_input" style="display: none;float: right;">
                                </div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="">Australian Taxi Licence Back</label>
                                <img src="{{url($driver->atln_photo_back)}}" class="image-size" style="float: right;" id="atln_photo_back"/>
                                <img src="#" alt="Driving Licence Front" class="image-size" style="display: none;float: right;" id="atln_photo_back_preview">
                                <div class="text-danger" id="atln_photo_back_error"></div>
                            </div>
                            <div>
                                <div class="d-flex design-btn">
                                    <button id="atln_photo_back_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="atln_photo_back"  id="atln_photo_back_input" style="display: none;float: right;">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="profileEditSubmit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
        $(document).on('click', '#profile_photo_input_button', function (event) {
            event.preventDefault();
            $('#profile_photo_input').click();
        });
        $(document).on('click', '#driving_licence_photo_front_button', function (event) {
            event.preventDefault();
            $('#driving_licence_photo_front_input').click();
        });
        $(document).on('click', '#driving_licence_photo_back_button', function (event) {
            event.preventDefault();
            $('#driving_licence_photo_back_input').click();
        });
        $(document).on('click', '#atln_photo_front_button', function (event) {
            event.preventDefault();
            $('#atln_photo_front_input').click();
        });
        $(document).on('click', '#atln_photo_back_button', function (event) {
            event.preventDefault();
            $('#atln_photo_back_input').click();
        });


        function readUR_PI(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile_photo').hide();
                    $('#profile_photo_preview').show().attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#profile_photo_input").change(function () {
            readUR_PI(this);
        });



        function readURL_DLPFS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#driving_licence_photo_front').hide();
                    $('#driving_licence_photo_front_preview').show().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#driving_licence_photo_front_input").change(function () {
            readURL_DLPFS(this);
        });


        function readURL_DLPBS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#driving_licence_photo_back').hide();
                    $('#driving_licence_photo_back_preview').show().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#driving_licence_photo_back_input").change(function () {
            readURL_DLPBS(this);
        });


        function readURL_ATLFS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#atln_photo_front').hide();
                    $('#atln_photo_front_preview').show().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#atln_photo_front_input").change(function () {
            readURL_ATLFS(this);
        });


        function readURL_ATLBS(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#atln_photo_back').hide();
                    $('#atln_photo_back_preview').show().attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#atln_photo_back_input").change(function () {
            readURL_ATLBS(this);
        });





        $(document).on('click', '#profileEditSubmit', function (event) {
            event.preventDefault();
            
            var editData = new FormData($('#profileEditForm')[0]);
            $.ajax({
                url: "{{ route('driver.driverUpdateProfile')}}",
                data: editData,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    $('#full_name_error').text('');
                    $('#phone_error').text('');
                    $('#email_error').text('');
                    $('#post_code_error').text('');
                    $('#address_error').text('');
                    $('#gender_error').text('');
                    $('#city_error').text('');
                    $('#state_error').text('');
                    $('#driving_licence_no_error').text('');
                    $('#australian_taxi_licence_no_error').text('');
                    $('#driving_licence_expire_date_error').text('');
                    $('#australian_taxi_licence_expire_date_error').text('');
                    $('#profile_photo_error').text('');
                    $('#driving_licence_photo_front_error').text('');
                    $('#driving_licence_photo_back_error').text('');
                    $('#atln_photo_front_error').text('');
                    $('#atln_photo_back_error').text('');
                    if (data.errors) {
                        $('#full_name_error').text(data.errors.full_name);
                        $('#phone_error').text(data.errors.phone);
                        $('#email_error').text(data.errors.email);
                        $('#post_code_error').text(data.errors.post_code);
                        $('#address_error').text(data.errors.address);
                        $('#gender_error').text(data.errors.gender);
                        $('#city_error').text(data.errors.city);
                        $('#state_error').text(data.errors.state);
                        $('#driving_licence_no_error').text(data.errors.driving_licence_no);
                        $('#australian_taxi_licence_no_error').text(data.errors.australian_taxi_licence_no);
                        $('#driving_licence_expire_date_error').text(data.errors.driving_licence_expire_date);
                        $('#australian_taxi_licence_expire_date_error').text(data.errors.australian_taxi_licence_expire_date);
                        $('#profile_photo_error').text(data.errors.profile_photo);
                        $('#driving_licence_photo_front_error').text(data.errors.driving_licence_photo_front);
                        $('#driving_licence_photo_back_error').text(data.errors.driving_licence_photo_back);
                        $('#atln_photo_front_error').text(data.errors.atln_photo_front);
                        $('#atln_photo_back_error').text(data.errors.atln_photo_back);
                    }
                    if (data.response == 'success') {
                        $('.alert-success').show().text('Profile update successfully!!');
                    }
                }
            });
        });
</script>
@endpush
