@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Signup area -->
<section class="driver_signup_area fix">
    <div class="container">
        <div class="driverGrid">
            <form id="mainForm">
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
                                <button class="driver-sign-up-btn" id="step-two-next">Next</button>

                            </div>
                            <hr />
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button onclick="window.open('http://localhost/faretrimDev/ftdev/driver/login/facebook', '_self'); return false;" class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button><br>
                                <button onclick="window.open('http://localhost/faretrimDev/ftdev/driver/login/google', '_self'); return false;" class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <!--<p>Have an account? <span><a href="{{url('/front-login')}}">Log In</a></span></p>-->
                                <p>Have an account? <span><a href="{{url('driverLogin')}}">Log In</a></span></p>
                            </div>
                        </div>
                    </section>

                    <section id="step-two" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
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
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('driverLogin')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section id="step-three" style="display:none">
                        <!--                    <form id="stepThreeForm" enctype="multipart/form-data" class="childForm">-->
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">3</span></p>
                            </div>
                            <div class="driver-signup-img">
                                <img class="img-fluid" id="profileImage" src="{{asset('frontEnd/assets/img/login/profile image.png')}}" alt="key">
                                <img class="img-fluid" src="#" alt="profile image"  title="change profile image" id="profileImage_review" alt="" style="display: none; width: 135px;height: 135px;border-radius: 50%;">
                                <input type="file" name="profile_image" accept="image/*" id="profile_image" style="display:none;"><br>
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
<!--                                    <select class="form-control w-100" name="gender" id="gender">
                                        <option value="">--Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>-->
                                    <select class="form-control" name="gender" id="ControlSelect1">
                                        <option value="">--Select Gender --</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span class="text-danger" id="gender_error"></span>
                                    <div class="form-group">
                                        <div class="position-relative" id="show_hide_password">
                                            <input class="form-control" name="password" type="password" placeholder="Set a Password*" id="password">
                                            <div class="input-group-addon passEye eyeIcon ml-2 mt-2 pt-1">
                                                <a href=""><img src="{{asset('frontEnd/assets/img/login/icon.png')}}" class="img-fluid" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger" id="password_error"></span>
                                   <!-- <input class="form-control" type="password" placeholder="Set a Password*" required> -->
                                    <input class="form-control" type="text" name="state" placeholder="State*" id="state">
                                    <span class="text-danger" id="state_error"></span>
                                    <input class="form-control" type="text" name="city" placeholder="City*" id="city">
                                    <span class="text-danger" id="city_error"></span>
                                    <input class="form-control" type="number" name="post_code" placeholder="Post Code*" id="post_code">
                                    <span class="text-danger" id="post_code_error"></span>
                                    <input class="form-control" type="text" placeholder="Address*" name="address" id="address">
                                    <span class="text-danger" id="address_error"></span>
                                </div>
                                <a id="step-four-next">
                                    <button class="driver-sign-up-btn" type="button" >Next</button>
                                </a>
                                <br>
                                <a id="step-two-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('driverLogin')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                        <!--                    </form>-->
                    </section>
                    <section id="step-four" style="display:none">
                        <!--                    <form id="stepFourForm" enctype="multipart/form-data" class="childForm">-->
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header d-flex justify-content-between">
                                <p class="borderLeft">Driver Sign Up</p>
                                <p class="step">Step <span class="circle-bg">4</span></p>
                            </div>
                            <div class="driver-signup-btn">
                                <p class="text-capitalize margin-none text-center mb-2">Enter your legal information</p>
                                <div class="all-input">
                                    <input class="form-control" type="text" placeholder="Driving licence" name="driving_licence_no">
                                    <span class="text-danger" id="driving_licence_no_error"></span>
                                    <input class="form-control" type="text" placeholder="Australian taxi license" name="australian_taxi_licence_no">
                                    <span class="text-danger" id="australian_taxi_licence_no_error"></span>
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date"  title="Driving Licence Expiry Date" placeholder="Driving Licence Expiry" name="driving_licence_expire_date">
                                            <span class="text-danger" id="driving_licence_expire_date_error"></span>
                                        </div>
                                        <!--                                        <div class="">
                                                                                    <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                                                                </div>-->
                                    </div>
                                    <div class="d-flex">
                                        <div class="calender-input">
                                            <input class="form-control" type="date"  title="Australian Taxi  Licence Expiry" placeholder="Australian Taxi  Licence Expiry" name="australian_taxi_licence_expire_date">
                                            <span class="text-danger" id="australian_taxi_licence_expire_date_error"></span>
                                        </div>
                                        <!--                                        <div class="">
                                                                                    <a href="#"><img class="img-fluid ml-3 mt-2" src="{{asset('frontEnd/assets/img/login/calender.png')}}" alt="calender"></a>
                                                                                </div>-->
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button type="button" id="openDriLiFrontSide">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href="#"><img class="ml-4" id="DLPFS" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                            <p><a href="#"><img class="ml-4" src="#" id="DLPFS_preview" alt="" style="display: none; width: 60px;height: 50px;"></a></p>
                                            <input type="file" id="driLiFrontSide" accept="image/*" name="driving_licence_photo_front" style="display:none;"/>
                                        </div>
                                        <span class="text-danger" id="driving_licence_photo_front_error"></span>
                                    </div>
                                    <div class="">
                                        <p>Driving Licence Photo Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button type="button" id="openDriLiBackSide">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt="" ></button>
                                            <p><a href="#"><img class="ml-4" id="DLPBS" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                            <p><a href="#"><img class="ml-4" src="#" id="DLPBS_preview" alt="" style="display: none; width: 60px;height: 50px;"></a></p>
                                            <input type="file" id="driLiBackSide" accept="image/*" name="driving_licence_photo_back" style="display:none;"/>
                                        </div>
                                        <span class="text-danger" id="driving_licence_photo_back_error"></span>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Front Side*</p>
                                        <div class="d-flex design-btn">
                                            <button type="button" id="openAusLiFrontSide">Add Photo<img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                            <p><a href="#"><img class="ml-4" id="ATLFS" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                            <p><a href="#"><img class="ml-4" src="#" id="ATLFS_preview" alt="" style="display: none; width: 60px;height: 50px;"></a></p>
                                            <input type="file" id="ausLiFrontSide" accept="image/*" name="atln_photo_front" style="display:none;"/>
                                        </div>
                                        <span class="text-danger" id="atln_photo_front_error"></span>
                                    </div>
                                    <div class="">
                                        <p>Australian Taxi License Back Side*</p>
                                        <div class="d-flex design-btn">
                                            <button type="button" id="openAusLiBackSide">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt="" ></button>
                                            <p><a href="#"><img class="ml-4" id="ATLBS" src="{{asset('frontEnd/assets/img/login/photo-img.png')}}" alt=""></a></p>
                                            <p><a href="#"><img class="ml-4" src="#" id="ATLBS_preview" alt="" style="display: none; width: 60px;height: 50px;"></a></p>
                                            <input type="file" id="ausLiBacktSide" accept="image/*" name="atln_photo_back" style="display:none;"/>
                                        </div>
                                        <span class="text-danger" id="atln_photo_back_error"></span>
                                    </div>
                                </div>
                                <div class="form-check checkBox mb-1 mt-2">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="termAndCondition" value="1">
                                    <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="{{url('terms-and-condition')}}">terms and conditions.</a></span></label>
                                    <span class="text-danger" id="termAndCondition_error"></span>
                                </div>
                                <!--<a href="{{url('driver-profile')}}">-->
                                <button class="driver-sign-up-btn" type="button" id="fourStepValidation">Become a driver</button>
                                <a id="step-three-back">
                                    <button class="driver-sign-up-btn-black black-btn">Back</button>
                                </a>
                                <div class="have-account">
                                    <p class="font-weight-normal">Have an account? <span><a href="{{url('driverLogin')}}">Log In</a></span></p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="passwordField" style="display:none;">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header">
                                <p class="borderLeft">Driver Login</p>
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
                                <button class="driver-sign-up-btn" id="loginWithExistsPassword">Login as Driver</button>
                                <p><a class="text-dark" href="#" id="forgetPasswordFromPassField">Forgot your password or user name?</a></p>
                            </div>
                            <hr />
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button> <br>
                                <button class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <!--                                <div class="form-check checkBox mb-3">
                                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                    <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="#">terms and conditions.</a></span></label>
                                                                </div>-->
                                <p>Have an account? <span><a href="{{url('driver-signup')}}">Sign Up?</a></span></p>
                            </div>
                        </div>
                    </section>

                    <section id="driverEmailField" style="display:none">
                        <div class="driver-signup animate__animated animate__fadeInLeft animate__delay-1s fix overflow-hidden">
                            <div class="driver_header">
                                <p class="borderLeft">Driver Login</p>
                            </div>
                            <div class="driver-signup-img text-center">
                                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/key.png')}}" alt="key">
                            </div>
                            <div class="driver-signup-btn signUpbtnMove">
                                <div class="d-flex driver-mobile-input-field">
                                    <div class="driver-selectOption">
                                        <select class="border-0" id="country_code" name="country_code">
                                            <option>AU+61</option>
                                            <option>BD+88</option>
                                        </select>
                                    </div>
                                    <div class="borderRight anotherBorderRight text-danger"></div>
                                    <div class="driver-input-field">
                                        <input class="border-0" type="text" placeholder="Mobile Number/Email">
                                    </div>
                                </div>
                                <a href="{{url('driverLogin')}}"><button class="driver-sign-up-btn">Login as Driver</button></a>
                                <p><a class="text-dark" href="#">Forgot your password or user name?</a></p>
                            </div>
                            <hr />
                            <div class="Position-Middle">OR</div>
                            <div class="driver-sign-up-2btn">
                                <button class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button> <br>
                                <button class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
                                <div class="form-check checkBox mb-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">I agree to the <strong>faretrim</strong> <span><a href="{{url('terms-and-condition')}}">terms and conditions.</a></span></label>
                                </div>
                                <p>Have an account? <span><a href="{{url('driver-signup')}}">Sign Up?</a></span></p>
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
                        <button onclick="window.open('{{url('driver/login/facebook')}}', '_self'); return false;" class="driver-sign-up-fb-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/fb.png')}}" alt=""> Log in with Facebook</button><br>
                        <button onclick="window.open('{{url('driver/login/google')}}', '_self'); return false;" class="driver-sign-up-google-btn"><img class="mr-2" src="{{asset('frontEnd/assets/img/driver-sign-up/google.png')}}" alt=""> Connect with Google</button>
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
                        <button class="driver-sign-up-btn-black black-btn" onclick="window.open('{{url('driverLogin')}}', '_self'); return false;">Back to Login</button>
                    </div>
                </div>
            </section>
            <!-- End Forget password Section-->
        </div>


        <div class="driver-right-section animate__animated animate__fadeInRight animate__delay-1s overflow-hidden">
            <div class="driver_header">
                <p class="borderLeft">Drive when you want</p>
            </div>
            <div class="text-center driver-signup-img">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/driver-sign-up/car-update.png')}}" alt="car">
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
    url: "{{route('driver.phoneExists')}}",
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
    url: "{{route('driver.verifyOTP')}}",
            type: "post",
            data: {phone: codeWithNumber, otp_code: OtpCode},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
            // Show image container
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
            complete: function (data) {
            // Hide image container
            $("#ajaxLoader").hide();
            }

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
    url: "{{ route('driver.sendOtp')}}",
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
    $(document).on('click', '#step-two-back', function (event) {
    event.preventDefault();
    $('#step-three').hide();
    $('#step-two').show();
    });
    $(document).on('click', '#step-four-next', function (event) {
    event.preventDefault();
    var stepThreeData = new FormData($('#mainForm')[0]);
    $.ajax({
    url: "{{ route('driver.thirdStepVerify')}}",
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
            $("#ajaxLoader").show();
            },
            success: function (data) {
            console.log(data);
            $('#profile_image_error').text('');
            $('#first_name_error').text('');
            $('#last_name_error').text('');
            $('#email_error').text('');
            $('#gender_error').text('');
            $('#password_error').text('');
            $('#city_error').text('');
            $('#state_error').text('');
            $('#post_code_error').text('');
            $('#address_error').text('');
            if (data.errors) {
            $('#profile_image_error').text(data.errors.profile_image);
            $('#first_name_error').text(data.errors.first_name);
            $('#last_name_error').text(data.errors.last_name);
            $('#email_error').text(data.errors.email);
            $('#gender_error').text(data.errors.gender);
            $('#password_error').text(data.errors.password);
            $('#city_error').text(data.errors.city);
            $('#state_error').text(data.errors.state);
            $('#post_code_error').text(data.errors.post_code);
            $('#address_error').text(data.errors.address);
            }
            if (data.response == 'success') {
            $('#step-four').show();
            $('#step-three').hide();
            }
            },
            complete: function () {
            $("#ajaxLoader").hide();
            },
    });
    });
    $(document).on('click', '#step-two-back', function (event) {
    event.preventDefault();
    $('#step-four').hide();
    $('#step-two').show();
    });
    $(document).on('click', '#step-three-back', function (event) {
    event.preventDefault();
    $('#step-four').hide();
    $('#step-three').show();
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
//                    console.log(data);return false;
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
    var countryCode = $('#countryCode').val().split('+').pop();
    var phone = $('#phoneNumber').val();
    var codeWithNumber = '+' + countryCode + phone;
    var password = $('#existsPassword').val();
    if (password == '') {
    $('#exists_password_error').text('Password field is required');
    return false;
    }
    if (codeWithNumber != '' && password != '') {
    $.ajax({
    url: "{{route('driver.login')}}",
            type: "post",
            data: {phone: codeWithNumber, password: password},
            dataType: "json",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
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
            var url = "{{url('driver-profile?driverId=')}}" + data.driver_id;
            window.open(url, '_self');
            }
            },
            complete: function () {
            $("#ajaxLoader").hide();
            },
    });
    }

    });
    $(document).on('click', '#forgetPassword', function (event) {
    event.preventDefault();
    $('#driverEmailField').hide();
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
    url: "{{route('driver.phoneExistsForgetPass')}}",
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
    url: "{{route('driver.verifyOTP')}}",
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
    $(document).on('click', '#Reset_Password', function (event) {
    event.preventDefault();
    var countryCode = $('#conCodeForgetPassword').val().split('+').pop();
    var phone = $('#phoneForgetPassword').val();
    var password_one = $('#password_one').val();
    var password_two = $('#password_two').val();
    var codeWithNumber = '+' + countryCode + phone;
    $.ajax({
    url: "{{route('driver.resetPassword')}}",
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
</script>
@endpush
