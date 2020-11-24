@extends('frontEnd.layouts.master')
@section('content')
<section>
    <div class="contact_section">
        <div class="container">
            <div class="contact-img">
                <div class="contact-text">
                    <h1>Contact Us</h1>
                    <p>Save money. Meet new people. Fare Trim!</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="log-grid">
            <div class="text-center">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/contactUs/location.png')}}" alt="">
                <p><span class="bold-text">Address</span> <br> 93  Brown Street, North Sydney, New South Wales, Australia-2060.</p>
            </div>
            <div class="text-center">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/contactUs/phone.png')}}" alt="">
                <p><span class="bold-text">Phone Number</span> <br> <a class="text-dark" href="tel:(02) 9854 7515">(02) 9854 7515</a></p>
            </div>
            <div class="text-center">
                <img class="img-fluid" src="{{asset('frontEnd/assets/img/contactUs/email.png')}}" alt="">
                <p class="pt-4"><span class="bold-text">Email</span> <br> <a class="text-dark" href="mailto:mail@faretrim.com">mail@faretrim.com</a></p>
            </div>
        </div>
        <div class="send-massage">
            <p><span>Send Message</span> <br> Have a query? Submit to us here.</p>
            @include('frontEnd.layouts.alert-message')
            <div class="message-box">
                <form id="contactForm">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name" class="required">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder=" Write Your  First Name">
                            <span class="text-danger" id="first_name_error"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" class="required">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder=" Write Your  Last Name">
                            <span class="text-danger" id="last_name_error"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email" class="required">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder=" Enter Your  Email address">
                            <span class="text-danger"  id="email_error"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="required">Phone Number</label>
                            <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter Your  Phone Number">
                            <span class="text-danger" id="phone_error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject" class="required">Subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" placeholder=" Your Contact Purpose">
                        <span class="text-danger" id="subject_error"></span>
                    </div>
                    <div class="form-group" class="required">
                        <label for="message" class="required">Message</label>
                        <textarea class="form-control" name="message" id="message" placeholder=" Write Your  Message" rows="5"></textarea>
                        <span class="text-danger" id="message_error"></span>
                    </div>
                    <div class="contact-button">
                        <button type="submit" id="contactFormBtn">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-map pt-4">
        <img class="img-fluid" src="{{asset('frontEnd/assets/img/contactUs/map.png')}}" alt="map">
    </div>
</section>
<!-- Mission Statement area -->
@endsection
@push('script')
<script type="text/javascript">
        $(document).on('click', '#contactFormBtn', function (event) {
            event.preventDefault();
            var data = new FormData($('#contactForm')[0]);
            $.ajax({
                url: "{{url('helpAndSupport')}}",
                data: data,
                type: "POST",
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#ajaxLoader').show();
                },
                success: function (data) {
                    $('#first_name_error').text('');
                    $('#last_name_error').text('');
                    $('#email_error').text('');
                    $('#phone_error').text('');
                    $('#subject_error').text('');
                    $('#message_error').text('');
                    if (data.errors) {
                        $('#first_name_error').text(data.errors.first_name);
                        $('#last_name_error').text(data.errors.last_name);
                        $('#email_error').text(data.errors.email);
                        $('#phone_error').text(data.errors.phone);
                        $('#subject_error').text(data.errors.subject);
                        $('#message_error').text(data.errors.message);
                    }
                    if (data.response == 'success') {
                        $('.alert-success').show().text('Your Contact message sent successfully!!');
                    }
                },
                complete: function () {
                    $('#ajaxLoader').hide();
                }
            });
        });
</script>
@endpush