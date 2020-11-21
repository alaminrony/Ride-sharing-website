@extends('frontEnd.layouts.master')

@section('content')
<!-- Driver Signup area -->
<section class="driver_signup_area fix">
    <div class="container">
        <div class="driverGrid">
            <form>
                <div>
                    <section id="step-one">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">1</span></p>
                            </div>
                            <div class="driver-signup-img text-center">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>

                            <div class="driver-signup-btn">
                                <p class="text-capitalize">Enter Mobile Number</p>
                                <div class="d-flex driver-mobile-input-field">
                                    <div class="driver-selectOption">
                                        <select class="border-0" id="countryCode">
                                            <option>AU+61</option>
                                            <option>BD+88</option>
                                        </select>
                                    </div>
                                    <div class="borderRight forMobileRight text-danger"></div>
                                    <div class="driver-input-field">
                                        <input class="border-0" type="text"  id="phoneNumber" placeholder="Enter Mobile Number" autocomplete="off">
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
                                <p>Have an account? <span><a href="#">Log In</a></span></p>
                            </div>
                        </div>
                    </section>

                    <section id="step-two" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">2</span></p>
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
                                    <input class="input-size form-control" type="text"  maxlength="1" >
                                    <input class="input-size form-control" type="text"  maxlength="1">
                                    <input class="input-size form-control" type="text"  maxlength="1">
                                    <input class="input-size form-control" type="text"  maxlength="1">
                                    <input class="input-size form-control" type="text"  maxlength="1">
                                    <input class="input-size form-control" type="text"  maxlength="1">
                                </div>
                                <span class="text-danger" id="errorOTP"></span>
                                <a href="#" id="step-three-next">
                                    <button class="driver-sign-up-btn">Next</button>
                                </a> <br>
                                <a href="#" id="step-one-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('front-login')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="step-three" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">3</span></p>
                            </div>
                            <div class="driver-signup-img">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/login/profile image.png')}}" alt="key">
                            </div>
                            <div class="driver-signup-btn">
                                <p class="text-capitalize margin-none mb-2">Enter your personal information</p>
                                <div class="all-input">
                                    <input class="form-control" type="text" placeholder="First Name*" id="first_name">
                                    <span class="text-danger" id="first_name_error"></span>
                                    <input class="form-control" type="text" placeholder="Last Name*" id="last_name">
                                    <span class="text-danger" id="last_name_error"></span>
                                    <select class="form-control w-100" id="gender">
                                        <option value="">--Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="text-danger" id="gender_error"></span>
                                    <div class="form-group">
                                        <div class="input-group" id="show_hide_password">
                                            <input class="form-control" type="password" placeholder="Set a Password*" id="password">
                                            <div class="input-group-addon eyeIcon ml-2 mt-2 pt-1">
                                                <a href="#"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="password_error"></span>
                                   <!-- <input class="form-control" type="password" placeholder="Set a Password*" required> -->
                                    <input class="form-control" type="text" placeholder="State*" id="state">
                                    <span class="text-danger" id="state_error"></span>
                                    <input class="form-control" type="text" placeholder="City*" id="city">
                                    <span class="text-danger" id="city_error"></span>
                                    <input class="form-control" type="number" placeholder="Post Code*" id="post_code">
                                    <span class="text-danger" id="post_code_error"></span>
                                    <input class="form-control" type="text" placeholder="Address*" id="address">
                                    <span class="text-danger" id="address_error"></span>
                                </div>
                                <a id="step-four-next">
                                    <button class="driver-sign-up-btn">Next</button>
                                </a> <br>
                                <a id="step-two-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('front-login')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="step-four" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">4</span></p>
                            </div>
                            <div class="driver-signup-btn">
                                <p class="text-capitalize margin-none text-center mb-2">Enter your legal information</p>
                                <div class="all-input">
                                    <input class="form-control" type="text" placeholder="Driving licence" >
                                    <input class="form-control" type="text" placeholder="Australian taxi license" >
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date" placeholder="Driving Licence Expiry">
                                        </div>
                                        <div class="">
                                            <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date" placeholder="Australian Taxi  Licence Expiry">
                                        </div>
                                        <div class="">
                                            <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button>Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href=""><img class="ml-4" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check checkBox mb-1 mt-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="#">terms and conditions.</a></span></label>
                                </div>
                                <a href="{{url('driver-profile')}}">
                                    <button class="driver-sign-up-btn">Become a driver</button>
                                </a> 

                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('front-login')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </form>

            <div class="driver-right-section animate__animated animate__fadeInRight animate__delay-1s overflow-hidden">
                <div class="driver_header">
                    <p class="borderLeft">Drive when you want</p>
                </div>
                <div class="text-center driver-signup-img">
                    <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/car.png')}}" alt="car">
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
        $(document).on('click', '#step-two-next', function () {
            var countryCode = $('#countryCode').val().split('+').pop();
            var phone = $('#phoneNumber').val();
            var codeWithNumber = '+' + countryCode + phone;
            if (phone != '') {
                if (!$.isNumeric(phone)) {
                    $('#errorPhone').html('Phone must be numeric');
                    return false;
                }
                $.ajax({
                    url: "{{route('driver.phoneExists')}}",
                    type: "post",
                    data: {phone: codeWithNumber},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        //alert("i m here"+data);
                        console.log(data);


                        if (data.response == "exist") {
                            //password form with login
                            return false;


                        }

                        if (data.response == "new") {
                            alert("otp scree");
                            //otp screen
                            $('#step-two').show();
                            $('#step-one').hide();
                        }
                    }
                });
//           event.preventDefault();
                return false;
            } else {
                $('#errorPhone').html('Phone Number Required');
                return false;
            }
        });


        $(document).on('click', '#step-one-back', function () {
           
            $('#step-two').hide();
            $('#step-one').show();
        });


        $(document).on('click', '#step-three-next', function () {
            var countryCode = $('#countryCode').val().split('+').pop();
            var phone = $('#phoneNumber').val();
            var codeWithNumber = '+' + countryCode + phone;

            var OtpArr = [];
            $(".input-size").each(function (index) {
                OtpArr.push($(this).val());
            });
            var OtpCode = OtpArr.toString().replace(/,/g, '');
            if (OtpCode.length < 4) {
                $('#errorOTP').text('OTP code must have 4 digit number.');
            } else {
                $.ajax({
                    url: "{{route('driver.verifyOTP')}}",
                    type: "post",
                    data: {phone: codeWithNumber, otp_code: OtpCode},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        console.log(data);
                        $('#step-three').show();
                        $('#step-two').hide();
                        // return false;
                        $('#errorOTP').text('');
                        if (data != '') {
                            $('#errorOTP').text(data.message);
                            return false;
                        }
                        if (data.response == 'success') {
                            $('#step-three').show();
                            $('#step-two').hide();
                            return false;
                        }
                    }
                });
                event.preventDefault();
            }


        });
        $(document).on('click', '#step-two-back', function () {
            $('#step-three').hide();
            $('#step-two').show();
        });

        $(document).on('click', '#step-four-next', function () {
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var gender = $('#gender').val();
            var password = $('#password').val();
            var city = $('#city').val();
            var state = $('#state').val();
            var post_code = $('#post_code').val();
            var address = $('#address').val();

            var error = [];
            

            error['first_name_error'] = (first_name == '') ? $('#first_name_error').text('First name required') : $('#first_name_error').text('');
            error['last_name_error'] = (last_name == '') ? $('#last_name_error').text('Last name required') : $('#last_name_error').text('');
            error['gender_error'] = (gender == '') ? $('#gender_error').text('Gender required') : $('#gender_error').text('');
            error['password_error'] = (password == '') ? $('#password_error').text('Password required') : $('#password_error').text('');
            error['city_error'] = (city == '') ? $('#city_error').text('City required') : $('#city_error').text('');
            error['state_error'] = (state == '') ? $('#state_error').text('State required') : $('#state_error').text('');
            error['post_code_error'] = (post_code == '') ? $('#post_code_error').text('Post code required') : $('#post_code_error').text('');
            error['address_error'] = (address == '') ? $('#address_error').text('Address required') : $('#address_error').text('');

            alert(error.length);
            console.log(error);
            
            if($.isEmptyObject(error)){
            alert('error  Not found');
              $('#step-four').show();
                $('#step-three').hide(); 
                return false;
            }
            if (!$.isEmptyObject(error)) {
                alert('error  found');
                return false;
            } 
            
                
                
           
        });
        $(document).on('click', '#step-two-back', function () {
            $('#step-four').hide();
            $('#step-two').show();
        });


        $(document).on('keyup', '.input-size', function () {
            if (this.value.length == this.maxLength) {
                $(this).next('.input-size').focus();
            }
        });

    });
</script>
@endpush
