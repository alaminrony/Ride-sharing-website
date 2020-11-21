@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Signup area -->
<section class="driver_signup_area fix">
    <div class="container">
        <div class="driverGrid">
            <form id="mainForm">
                <div>
                    <section id="step-one" style="display: none;">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Rider Sign Up</p>
                                <p class="step">Step <span class="circle-bg">1</span></p>
                            </div>
                            <div class="driver-signup-img text-center">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>

                            <div class="driver-signup-btn">
                                <p class="text-capitalize">Enter Mobile Number</p>
                                <div class="d-flex driver-mobile-input-field">
                                    <div class="driver-selectOption">
                                        <select class="border-0" id="countryCode" name="countryCode">
                                            <option>AU+61</option>
                                            <option>BD+88</option>
                                        </select>
                                    </div>
                                    <div class="borderRight forMobileRight text-danger"></div>
                                    <div class="driver-input-field">
                                        <input class="border-0" type="text" name="phone"  id="phoneNumber" placeholder="Enter Mobile Number" autocomplete="off">
                                    </div>
                                </div>
                                <span class="text-danger" id="errorPhone"></span>
                                <a href='#' id="step-two-next">
                                    <button class="driver-sign-up-btn">Next</button>
                                </a>
                            </div>
                            <hr />
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button> <br>
                                <button class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <!--<p>Have an account? <span><a href="{{url('/front-login')}}">Log In</a></span></p>-->
                                <p>Have an account? <span><a href="{{url('passengerLogin')}}">Log In</a></span></p>
                            </div>
                        </div>
                    </section>

                    <section id="step-two" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Rider Sign Up</p>
                                <p class="step">Step <span class="circle-bg">2</span></p>
                            </div>
                             <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;margin: 0px 15px;text-align: center;"></div>
                            <div class="driver-signup-img">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>
                            <div class="driver-signup-btn">
                                <p class="text-capitalize margin-none">Enter Verification Code</p>
                                <span class="verification">Verification Code has been sent to your phone</span>
                                <div class="text-right resend-btn">
                                    <a href="#">
                                        <button id="resendOtp">Resend</button>
                                    </a>
                                </div>
                                <div class="gridInput">
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1" >
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1">
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1">
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1">
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1">
                                    <input class="input-size form-control" type="text" name="otp_code[]" maxlength="1">
                                </div>
                                <span class="text-danger" id="errorOTP"></span>
                                <a href="#" id="step-three-next">
                                    <button class="driver-sign-up-btn">Next</button>
                                </a> <br>
                                <a href="#" id="step-one-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('passengerLogin')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="step-three" style="display:none">
                        <!--                    <form id="stepThreeForm" enctype="multipart/form-data" class="childForm">-->
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Rider Sign Up</p>
                                <p class="step">Step <span class="circle-bg">3</span></p>
                            </div>
                            <div class="driver-signup-img">
                                <img class="img-fluid" id="profileImage" src="{{asset('frontEnd/assets/img/login/profile image.png')}}" alt="key">
                                <img class="img-fluid" src="#" alt="profile image"  title="change profile image" id="profileImage_review" alt="" style="display: none; width: 135px;height: 135px;border-radius: 50%;">
                                <input type="file" name="avatar" accept="image/*" id="profile_image" style="display:none;"><br>
                                <span class="text-danger" id="profile_image_error"></span>
                            </div>

                            <div class="driver-signup-btn">
                                <p class="text-capitalize margin-none mb-2">Enter your personal information</p>
                                <div class="all-input">
                                    <input class="form-control" type="text" name="first_name" placeholder="First Name*" id="first_name">
                                    <span class="text-danger" id="first_name_error"></span>
                                    <input class="form-control" type="text" name="last_name" placeholder="Last Name*" id="last_name">
                                    <span class="text-danger" id="last_name_error"></span>
                                    <input class="form-control" type="text" name="email" placeholder="Email*" id="email">
                                    <span class="text-danger" id="email_error"></span>
                                    <div class="form-group">
                                        <select class="form-control" id="ControlSelect1" name="gender">
                                            <option value="">Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <span class="text-danger" id="gender_error"></span>
                                    </div>

                                    <div class="form-group">
                                        <div class="position-relative" id="show_hide_password">
                                            <input class="form-control" name="password" type="password" placeholder="Set a Password*">
                                            <div class="input-group-addon passEye eyeIcon ml-2 mt-2 pt-1">
                                                <a href=""><img src="{{asset('frontEnd/assets/img/login/icon.png')}}" class="img-fluid" alt=""></a>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="password_error"></span>
                                    </div>
                                </div>
                                <a id="step-four-next">
                                    <button class="driver-sign-up-btn" type="button" >Next</button>
                                </a>
                                <br>
                                <a id="step-two-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('passengerLogin')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="passwordField" style="display:none;">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header">
                                <p class="borderLeft">Rider Login</p>
                            </div>
                            <div class="driver-signup-img">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>

                            <div class="driver-signup-btn signUpbtnMove">
                                <div class="form-group">
                                    <div class="position-relative" id="show_hide_password">
                                        <input class="form-control" name="exists_password" type="password" placeholder="Enter your Password*" style="padding:15px 0px;padding-left: 15px;" id="existsPassword">
                                        <div class="input-group-addon passEye eyeIcon ml-2 mt-2 pt-1">
                                            <a href=""><img src="{{asset('frontEnd/assets/img/login/icon.png')}}" class="img-fluid" alt=""></a>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="exists_password_error"></span>
                                </div>
                                <button class="driver-sign-up-btn" id="loginWithExistsPassword">Login as Rider</button>
                                <p><a class="text-dark" href="#" id="forgetPasswordFromPassField">Forgot your password or user name?</a></p>
                            </div>
                            <hr/>
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button onclick="window.open('{{url('passenger/login/facebook')}}', '_self'); return false;" class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button><br>
                                <button onclick="window.open('{{url('passenger/login/google')}}', '_self'); return false;" class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <p>Have an account? <span><a href="{{url('passenger-signup')}}">Sign Up?</a></span></p>
                            </div>
                        </div>
                    </section>

                    <section id="passengerEmailField">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header">
                                <p class="borderLeft">Rider Login</p>
                            </div>
                            <div class="driver-signup-img text-center">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>
                            <div class="driver-signup-btn signUpbtnMove">
                                <div class="d-flex driver-mobile-input-field">
                                    <div class="driver-selectOption">
                                        <select class="border-0" id="conCodeEmailorPhone" name="countryCode">
                                            <option>AU+61</option>
                                            <option>BD+88</option>
                                        </select>
                                    </div>
                                    <div class="borderRight anotherBorderRight text-danger"></div>
                                    <div class="driver-input-field">
                                        <input class="border-0" type="text" placeholder="Mobile Number/Email" id="emailORphone">
                                    </div>
                                </div>
                                <span class="text-danger" id="emailORphone_error"></span>
                                <button class="driver-sign-up-btn" id="emailOrphoneCheck">Login as Rider</button>
                                <p><a class="text-dark" href="#"  id="forgetPassword">Forgot your password or user name?</a></p>
                            </div>
                            <hr />
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button onclick="window.open('{{url('passenger/login/facebook')}}', '_self'); return false;" class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button><br>
                                <button onclick="window.open('{{url('passenger/login/google')}}', '_self'); return false;" class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <p>Have an account? <span><a href="{{url('passenger-signup')}}">Sign Up?</a></span></p>
                            </div>
                        </div>
                    </section>
            </form>
            <!-- Forget password Section-->
            <section id="forgetPasswordField" style="display:none;">
                <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                    <div class="driver_header">
                        <p class="borderLeft">Forget Password</p>
                    </div>
                    <div class="driver-signup-img text-center">
                        <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                    </div>
                    <div class="driver-signup-btn signUpbtnMove">
                        <div class="d-flex driver-mobile-input-field">
                            <div class="driver-selectOption">
                                <select class="border-0" id="conCodeForgetPassword">
                                    <option>AU+61</option>
                                    <option>BD+88</option>
                                </select>
                            </div>
                            <div class="borderRight anotherBorderRight text-danger"></div>
                            <div class="driver-input-field">
                                <input class="border-0" type="text" placeholder="Enter your Number" id="phoneForgetPassword">
                            </div>
                        </div>
                        <span class="text-danger" id="foget_error"></span>
                        <button class="driver-sign-up-btn" id="submitForgetPasswordField">Submit</button>
                    </div>
                    <hr/>

                    <div class="Position-Middle">OR</div>
                    <div class="driver-sign-up-2btn">
                        <button onclick="window.open('{{url('passenger/login/facebook')}}', '_self'); return false;" class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button><br>
                        <button onclick="window.open('{{url('passenger/login/google')}}', '_self'); return false;" class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                        <p>Have an account? <span><a href="{{url('driver-signup')}}">Sign Up?</a></span></p>
                    </div>
                </div>
            </section>

            <section id="forgetOTP" style="display:none">
                <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                    <div class="driver_header d-flex justify-content-between">
                        <p class="borderLeft">Forget Password</p>
                    </div>
                    <div class="driver-signup-img">
                        <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                    </div>
                    <div class="driver-signup-btn">
                        <p class="text-capitalize margin-none">Enter Verification Code</p>
                        <span class="verification">Verification Code has been sent to your phone</span>
                        <div class="text-right resend-btn">
                            <a href="#">
                                <button>Resend</button>
                            </a>
                        </div>
                        <div class="gridInput">
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1" >
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1">
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1">
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1">
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1">
                            <input class="input-size form-control otp_code" type="text" name="otp_code[]" maxlength="1">
                        </div>
                        <span class="text-danger" id="forrgererrorOTP"></span>
                        <a href="#" id="verifyOTP">
                            <button class="driver-sign-up-btn">Next</button>
                        </a>
                        <div class="have-account">
                            <p class="font-weight-normal">Have an account? <span><a href="{{url('driverLogin')}}">Log In</a></span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section id="passwordFieldForgetPassword" style="display:none;">
                <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                    <div class="driver_header">
                        <p class="borderLeft">Reset Password</p>
                    </div>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;margin: 0px 15px;text-align: center">
                    </div>
                    <div class="driver-signup-img">
                        <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                    </div>

                    <div class="driver-signup-btn signUpbtnMove">
                        <div class="form-group">
                            <div class="position-relative" id="show_hide_password">
                                <input class="form-control"  type="password" placeholder="Enter Password*" style="padding:15px 0px;padding-left: 15px;" id="password_one">
                                <div class="input-group-addon passEye eyeIcon ml-2 mt-2 pt-1">
                                    <a href=""><img src="{{asset('frontEnd/assets/img/login/icon.png')}}" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <span class="text-danger" id="forget_password_error"></span>
                        </div>
                        <div class="form-group">
                            <div class="position-relative" id="show_hide_password">
                                <input class="form-control"  type="password" placeholder="Enter confirm Password*" style="padding:15px 0px;padding-left: 15px;" id="password_two">
                                <div class="input-group-addon passEye eyeIcon ml-2 mt-2 pt-1">
                                    <a href=""><img src="{{asset('frontEnd/assets/img/login/icon.png')}}" class="img-fluid" alt=""></a>
                                </div>
                            </div>
                            <span class="text-danger" id="forget_password_c_error"></span>
                        </div>
                        <a href="#" id="Reset_Password">
                            <button class="driver-sign-up-btn">Reset Password</button>
                        </a>
                        <br>
                        <button class="driver-sign-up-btn-black black-btn" onclick="window.open('{{url('passengerLogin')}}', '_self'); return false;">Back to Login</button>
                    </div>
                </div>
            </section>
            <!-- End Forget password Section-->
        </div>


        <div class="driver-right-section animate__animated animate__fadeInRight animate__delay-1s overflow-hidden">
            <div class="driver_header">
                <p class="borderLeft">Ride when you want</p>
            </div>
            <div class="text-center driver-signup-img">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/login/car-update.png')}}" alt="car">
            </div>
            <div class="driver-content">
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Offer a rideshare for your local commute or long distance trips</p>
                </div>
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Fill your empty seats with passengers to share a ride.</p>
                </div>
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Save hundreds of dollars per month and have fun riding with new friends.</p>
                </div>
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Earn anytime, anywhere</p>
                </div>
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Set your own schedule</p>
                </div>
                <div class="d-flex">
                    <p><img class="mr-3" src="{{asset('frontEnd/assets//img/driver-sign-up/tick.png')}}" alt="Tick"></p>
                    <p>Signing up is easy</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function () {
    $(document).on('click', '#step-two-next', function (event) {
    event.preventDefault();
    var countryCode = $('#countryCode').val().split('+').pop();
    var phone = $('#phoneNumber').val();
    var codeWithNumber = '+' + countryCode + phone;
    if (phone != '') {
    if (!$.isNumeric(phone)) {
    $('#errorPhone').html('Phone must be numeric');
    return false;
    }
    $.ajax({
    url: "{{route('passenger.phoneExists')}}",
            type: "post",
            data: {phone: codeWithNumber},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                    $("#ajaxLoader").show();
                },
            success: function (data) {
            if (data.response == "exist") {
            //password form with login
            $('#passwordField').show();
            $('#step-one').hide();
            return false;
            }

            if (data.response == "new") {
            //otp screen
            $('#step-two').show();
            $('#step-one').hide();
            }
            },
            complete: function () {
                    $("#ajaxLoader").hide();
                },
    });
    } else {
    $('#errorPhone').html('Phone Number Required');
    return false;
    }
    });
    $(document).on('click', '#step-one-back', function (event) {
    event.preventDefault();
    $('#step-two').hide();
    $('#step-one').show();
    });
    $(document).on('click', '#step-three-next', function (event) {
    event.preventDefault();
    var countryCode = $('#countryCode').val().split('+').pop();
    var phone = $('#phoneNumber').val();
    var codeWithNumber = '+' + countryCode + phone;
    var OtpArr = [];
    $(".input-size").each(function (index) {
    OtpArr.push($(this).val());
    });
    var OtpCode = OtpArr.toString().replace(/,/g, '');
    if (OtpCode.length < 6) {
    $('#errorOTP').text('OTP code must have 6 digit number.');
    return false;
    } else {
    $.ajax({
    url: "{{route('passenger.verifyOTP')}}",
            type: "post",
            data: {phone: codeWithNumber, otp_code: OtpCode},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                    $("#ajaxLoader").show();
                },
            success: function (data) {
            $('#errorOTP').text('');
            if (data.response == 'error') {
            $('#errorOTP').text(data.message);
            return false;
            }
            if (data.response == 'success') {
//                            alert('yes');return false;
            $('#step-three').show();
            $('#step-two').hide();
            }
            },
            complete: function () {
                    $("#ajaxLoader").hide();
                },

    });
    }
    });
    $(document).on('click', '#step-two-back', function (event) {
    event.preventDefault();
    $('#step-three').hide();
    $('#step-two').show();
    });
    $(document).on('click', '#step-four-next', function (event) {
    event.preventDefault();
    var stepThreeData = new FormData($('#mainForm')[0]);
    $.ajax({
    url: "{{ route('passenger.passenger-register')}}",
            data: stepThreeData,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            // Show image container
            $("#ajaxLoader").show();
            },
            success: function (data) {
//                    console.log(data); 
            $('#profile_image_error').text('');
            $('#first_name_error').text('');
            $('#last_name_error').text('');
            $('#email_error').text('');
            $('#gender_error').text('');
            $('#password_error').text('');
            if (data.errors) {
            $('#profile_image_error').text(data.errors.avatar);
            $('#first_name_error').text(data.errors.first_name);
            $('#last_name_error').text(data.errors.last_name);
            $('#email_error').text(data.errors.email);
            $('#gender_error').text(data.errors.gender);
            $('#password_error').text(data.errors.password);
            }
            if (data.response == 'success') {
            var url = "{{url('passenger-profile?passengerId=')}}" + data.passenger_id;
            window.open(url, '_self');
            }
            },
            complete: function (data) {
            // Hide image container
            $("#ajaxLoader").hide();
            }
    });
    });
    $(document).on('click', '#step-two-back', function (event) {
    event.preventDefault();
    $('#step-four').hide();
    $('#step-two').show();
    });
    $(document).on('click', '#fourStepValidation', function (event) {
    event.preventDefault();
    var stepFourData = new FormData($('#mainForm')[0]);
    $.ajax({
    url: "{{route('driver.driver-register')}}",
            type: 'POST',
            data: stepFourData,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                    $("#ajaxLoader").show();
                },
            success: function (data) {
            $('#driving_licence_no_error').text('');
            $('#australian_taxi_licence_no_error').text('');
            $('#driving_licence_expire_date_error').text('');
            $('#australian_taxi_licence_expire_date_error').text('');
            $('#termAndCondition_error').text('');
            $('#driving_licence_photo_front_error').text('');
            $('#driving_licence_photo_back_error').text('');
            $('#atln_photo_front_error').text('');
            $('#atln_photo_back_error').text('');
            if (data.errors) {
            $('#driving_licence_no_error').text(data.errors.driving_licence_no);
            $('#australian_taxi_licence_no_error').text(data.errors.australian_taxi_licence_no);
            $('#driving_licence_expire_date_error').text(data.errors.driving_licence_expire_date);
            $('#australian_taxi_licence_expire_date_error').text(data.errors.australian_taxi_licence_expire_date);
            $('#termAndCondition_error').text(data.errors.termAndCondition);
            $('#driving_licence_photo_front_error').text(data.errors.driving_licence_photo_front);
            $('#driving_licence_photo_back_error').text(data.errors.driving_licence_photo_back);
            $('#atln_photo_front_error').text(data.errors.atln_photo_front);
            $('#atln_photo_back_error').text(data.errors.atln_photo_back);
            }
            if (data.response == 'success') {
            var url = "{{url('driver-profile?driverId=')}}" + data.driver_id;
            window.open(url, '_self');
            }
            },
            complete: function () {
                    $("#ajaxLoader").hide();
                },
    });
    });
    $(document).on('click', '#loginWithExistsPassword', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeEmailorPhone').val().split('+').pop();
    var emailOrPhone = $('#emailORphone').val();
    if ($.isNumeric(emailOrPhone)) {
    emailOrPhone = '+' + countryCode + emailOrPhone;
    } else {
    emailOrPhone = emailOrPhone;
    }
    var password = $('#existsPassword').val();
    if (password == '') {
    $('#exists_password_error').text('Password field is required');
    return false;
    }
    if (emailOrPhone != '') {
    $.ajax({
    url: "{{route('passenger.passenger_login')}}",
            type: "post",
            data: {phone: emailOrPhone, password: password},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            // Show image container
            $("#ajaxLoader").show();
            },
            success: function (data) {
            $('#exists_password_error').text('');
            if (data.errors) {
            $('#exists_password_error').text(data.errors.password);
            }
            if (data.response == 'error') {
            $('#exists_password_error').text(data.message);
            }
            if (data.response == 'success') {
//                            console.log(data.response);return false;
            var url = "{{url('passenger-profile?passengerId=')}}" + data.passenger_id;
            window.open(url, '_self');
            }
            },
            complete: function (data) {
            // Hide image container
            $("#ajaxLoader").hide();
            }
    });
    }

    });
    $(document).on('click', '#emailOrphoneCheck', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeEmailorPhone').val().split('+').pop();
    var emailOrPhone = $('#emailORphone').val();
    if (emailOrPhone == '') {
    $('#emailORphone_error').text('Email or phone field is required');
    return false;
    }
    if (emailOrPhone != '') {
    $.ajax({
    url: "{{route('passenger.checkEmailOrPhone')}}",
            type: "post",
            data: {countryCode: countryCode, emailOrPhone: emailOrPhone},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
            if (data.response == 'exists') {
            $('#passengerEmailField').hide();
            $('#passwordField').show();
            }
            if (data.response == 'notExists') {
            $('#passengerEmailField').hide();
            $('#step-one').show();
            }
            }
    });
    }
    });
    $(document).on('click', '#forgetPassword', function (event) {
    event.preventDefault();
    $('#passengerEmailField').hide();
    $('#forgetPasswordField').show();
//        alert('yes');return false;
    });
    $(document).on('click', '#forgetPasswordFromPassField', function (event) {
    event.preventDefault();
    $('#passwordField').hide();
    $('#forgetPasswordField').show();
//        alert('yes');return false;
    });
    $(document).on('click', '#submitForgetPasswordField', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeForgetPassword').val().split('+').pop();
    var phone = $('#phoneForgetPassword').val();
    var codeWithNumber = '+' + countryCode + phone;
    if (phone != '') {
    if (!$.isNumeric(phone)) {
    $('#foget_error').html('Phone must be numeric');
    return false;
    }
    $.ajax({
    url: "{{route('passenger.phoneExistsForgetPass')}}",
            type: "post",
            data: {phone: codeWithNumber},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            $('#ajaxLoader').show();
            },
            success: function (data) {
            if (data.response == "exist") {
            $('#forgetPasswordField').hide();
            $('#forgetOTP').show();
            }
//
            if (data.response == "new") {
            $('#forgetPasswordField').hide();
            $('#step-one').show();
            }
            },
            complete: function () {
            $('#ajaxLoader').hide();
            },
    });
    } else {
    $('#foget_error').html('Phone Number Required');
    return false;
    }
    });
    $(document).on('click', '#verifyOTP', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeForgetPassword').val().split('+').pop();
    var phone = $('#phoneForgetPassword').val();
    var codeWithNumber = '+' + countryCode + phone;
    var OtpArr = [];
    $(".otp_code").each(function (index) {
    OtpArr.push($(this).val());
    });
    var OtpCode = OtpArr.toString().replace(/,/g, '');
    if (OtpCode.length < 6) {
    $('#forrgererrorOTP').text('OTP code must have 6 digit number.');
    return false;
    } else {
    $.ajax({
    url: "{{route('passenger.verifyOTP')}}",
            type: "post",
            data: {phone: codeWithNumber, otp_code: OtpCode},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            $('#ajaxLoader').hide();
            },
            success: function (data) {
            $('#forrgererrorOTP').text('');
            if (data.response == 'error') {
            $('#forrgererrorOTP').text(data.message);
            return false;
            }
            if (data.response == 'success') {
//                            alert('yes');return false;
            $('#forgetOTP').hide();
            $('#passwordFieldForgetPassword').show();
            }
            },
            complete: function () {
            $('#ajaxLoader').hide();
            },
    });
    }
    });
    //resend OTP code
    $(document).on('click', '#resendOtp', function (event) {
    event.preventDefault();
    var countryCode = $('#countryCode').val().split('+').pop();
    var phone = $('#phoneNumber').val();
    var codeWithNumber = '+' + countryCode + phone;
    if (phone != '') {
    $.ajax({
    url: "{{ route('passenger.sendOtp')}}",
            data: {phone: codeWithNumber},
            dataType: "json",
            type: 'POST',
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            $("#ajaxLoader").show();
            },
            success: function (data) {
            if (data.response == 'success') {
            $('.alert-success').show().text('OTP resend successfully!!');
            }
            },
            complete: function () {
            $("#ajaxLoader").hide();
            },
    });
    }
    });
    $(document).on('click', '#Reset_Password', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeForgetPassword').val().split('+').pop();
    var phone = $('#phoneForgetPassword').val();
    var password_one = $('#password_one').val();
    var password_two = $('#password_two').val();
    var codeWithNumber = '+' + countryCode + phone;
    $.ajax({
    url: "{{route('passenger.resetPassword')}}",
            type: "post",
            data: {phone: codeWithNumber, password: password_one, password_confirmation: password_two},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            $('#ajaxLoader').hide();
            },
            success: function (data) {
            $('#forget_password_error').text('');
            $('#forget_password_c_error').text('');
            if (data.errors) {
            $('#forget_password_error').text(data.errors.password);
            $('#forget_password_c_error').text(data.errors.password_confirmation);
            }
            if (data.response == 'success') {
            $('.alert-success').show().text('Password reset successfully!!');
            }
            },
            complete: function () {
            $('#ajaxLoader').hide();
            },
    });
    });
    $(document).on('keyup', '.input-size', function () {
    if (this.value.length == this.maxLength) {
    $(this).next('.input-size').focus();
    }
    });
    $(document).on('click', '#openDriLiFrontSide', function () {
    $('#driLiFrontSide').click();
    });
    $(document).on('click', '#openDriLiBackSide', function () {
    $('#driLiBackSide').click();
    });
    $(document).on('click', '#openAusLiFrontSide', function () {
    $('#ausLiFrontSide').click();
    });
    $(document).on('click', '#openAusLiBackSide', function () {
    $('#ausLiBacktSide').click();
    });
    $(document).on('click', '#profileImage', function () {
    $('#profile_image').click();
    });
    $(document).on('click', '#profileImage_review', function () {
    $('#profile_image').click();
    });
    function readURL_DLPFS(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#DLPFS').hide();
    $('#DLPFS_preview').show().attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }

    $("#driLiFrontSide").change(function () {
    readURL_DLPFS(this);
    });
    function readURL_DLPBS(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#DLPBS').hide();
    $('#DLPBS_preview').show().attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#driLiBackSide").change(function () {
    readURL_DLPBS(this);
    });
    function readURL_ATLFS(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#ATLFS').hide();
    $('#ATLFS_preview').show().attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#ausLiFrontSide").change(function () {
    readURL_ATLFS(this);
    });
    function readURL_ATLBS(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#ATLBS').hide();
    $('#ATLBS_preview').show().attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#ausLiBacktSide").change(function () {
    readURL_ATLBS(this);
    });
    function readUR_PI(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
    $('#profileImage').hide();
    $('#profileImage_review').show().attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
    }
    $("#profile_image").change(function () {
    readUR_PI(this);
    });
    });
</script>
@endpush
