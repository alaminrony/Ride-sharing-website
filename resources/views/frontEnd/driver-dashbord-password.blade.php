@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="header">
                    <p>Change Password</p>
                </div>
                @include('frontEnd.layouts.alert-message')
                <div class="form">
                    <form id='updatePasswordForm'>
                        <input type="hidden" name="driver_id" value="{{$driver->id}}">
                        <input type="password" placeholder="Old Password" name='old_password'> <span><img class="img-fluid" src="{{asset('frontEnd/assets/img/dashboard/log.png')}}" alt="log"></span><br>
                        <p class="text-danger" id='old_password_error'></p>
                        <input type="password" placeholder="New Password" name='password'> <span><img class="img-fluid" src="{{asset('frontEnd/assets/img/dashboard/log.png')}}" alt="log"></span><br>
                        <p class="text-danger" id='password_error'></p>
                        <input type="password" placeholder="Confirm Password" name='password_confirmation'> <span><img class="img-fluid" src="{{asset('frontEnd/assets/img/dashboard/log.png')}}" alt="log"></span><br>
                        <p class="text-danger" id='password_confirmation_error'></p>
                        <button id='passUpdateBtn'>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    $(document).on('click', '#passUpdateBtn', function (event) {
        event.preventDefault();
        var updatePassword = new FormData($('#updatePasswordForm')[0]);
        $.ajax({
            url: "{{ route('driver.updatePassword')}}",
            data: updatePassword,
            dataType: "json",
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            beforeSend: function () {
                $('#ajaxLoader').show();
            },
            success: function (data) {
                $('#old_password_error').text('');
                $('#password_error').text('');
                $('#password_confirmation_error').text('');
                if (data.errors) {
                    $('#old_password_error').text(data.errors.old_password);
                    $('#password_error').text(data.errors.password);
                    $('#password_confirmation_error').text(data.errors.password_confirmation);
                }
                if (data.response == 'error') {
                    $('#old_password_error').text(data.message);
                }
                if (data.response == 'success') {
                    $('.alert-success').show().text('Password update successfully!!');
                }
            },
            complete: function () {
                $('#ajaxLoader').hide();
            },
        });
    });
</script>
@endpush
