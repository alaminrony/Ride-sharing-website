@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.passenger.passenger-left-sidebar')
            <div class="right-dashbord-content">
                <div class="header">
                    <p>Edit Profile</p>
                </div>
                @include('frontEnd.layouts.alert-message')
                <div class="form driver-edit-form">
                    <form  id="profileEditForm">
                        <input type="hidden" name="passenger_id" value="{{$passenger->id}}">
                        <div class="form-row-grid">
                            <div>
                                <label for="full_name">Name</label>
                                <input type="name" id="full_name" placeholder="Name" name="full_name" value="{{$passenger->full_name}}">
                                <div class="text-danger" id="full_name_error"></div>
                            </div>

                            <div>
                                <label for="phone">Phone Number</label>
                                <input type="" id="phone" placeholder="Phone" name="phone" value="{{$passenger->phone}}">
                                <div class="text-danger" id="phone_error"></div>
                            </div>
                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="email">E-mail Address</label>
                                <input type="name" id="email" placeholder="E-mail" name="email" value="{{$passenger->email}}">
                                <div class="text-danger" id="email_error"></div>
                            </div>

                            <div>
                                <label for="gender">Gender</label>
                                <select class="form-control w-100" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male" <?= $passenger->gender == 'Male' ? 'selected="selected"' : '' ?>>Male</option>
                                        <option value="Female"  <?= $passenger->gender == 'Female' ? 'selected="selected"' : '' ?>>Female</option>
                                    </select>
                                <div class="text-danger" id="gender_error"></div>
                            </div>

                        </div>
                        <div class="form-row-grid">
                            <div>
                                <label for="profile_photo">Profile Photo</label>
                                <img src="{{url($passenger->avatar)}}" alt="Driving Licence Front" class="image-size" style="float: right;" id="profile_photo">
                                <img src="#" alt="Profile Photo" class="image-size" style="display: none;float: right;" id="profile_photo_preview">
                                <div class="text-danger" id="profile_photo_error"></div>
                            </div>

                            <div>
                                <div class="d-flex design-btn">
                                    <button id="profile_photo_input_button" style="margin-top: 10px !important;width: 100% !important;">Add Photo <img class="img-fluid ml-2" src="{{asset('frontEnd/assets/img/login/btn-img.png')}}" alt=""></button>
                                    <input type="file" name="avatar"  id="profile_photo_input" style="display: none;float: right;">
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


        $(document).on('click', '#profileEditSubmit', function (event) {
            event.preventDefault();
            var editData = new FormData($('#profileEditForm')[0]);
            $.ajax({
                url: "{{ route('passenger.passengerUpdateProfile')}}",
                data: editData,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend:function(){
                    $('#ajaxLoader').show();
                },
                success: function (data) {
                    console.log(data);
                    $('#full_name_error').text('');
                    $('#phone_error').text('');
                    $('#email_error').text('');
                    $('#gender_error').text('');
                    $('#profile_photo_error').text('');
                    if (data.errors) {
                        $('#full_name_error').text(data.errors.full_name);
                        $('#phone_error').text(data.errors.phone);
                        $('#email_error').text(data.errors.email);
                        $('#gender_error').text(data.errors.gender);
                        $('#profile_photo_error').text(data.errors.avatar);
                    }
                    if (data.response == 'success') {
                        $('.alert-success').show().text('Profile update successfully!!');
                    }
                },
                complete:function(){
                    $('#ajaxLoader').hide();
                },
            });
        });
</script>
@endpush
