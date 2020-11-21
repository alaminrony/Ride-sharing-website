@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'profile'
])

@section('content')
<div class="content">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if (session('password_status'))
    <div class="alert alert-success" role="alert">
        {{ session('password_status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="image">
                    <img src="{{ asset('paper/img/bg/fabio-mangione.jpg') }}" alt="...">
                </div>
                <form class="col-md-12" action="{{ route('profile.profile_image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div style="float: right;" class="text-primary">
                            <i class="fa fa-camera" style="font-size: 20px;"></i>
                            <input type="file" name="profile_image" id="" style=" display: none;">
                        </div>
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset(auth()->user()->profile_image) }}" alt="...">
                                <div>
                            @if ($errors->has('profile_image'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('profile_image') }}</strong>
                            </span>
                            @endif
                        </div>
                                <h5 class="title">{{ __(auth()->user()->first_name)}} {{ __(auth()->user()->last_name)}}</h5>
                            </a>
                            <p class="description">
                                Email: {{ __(auth()->user()->email)}}<br>
                                Phone: {{ __(auth()->user()->phone)}}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Team Members') }}</h4>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled team-members">
                        <li>
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar">
                                        <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image"
                                             class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ __('DJ Khaled') }}
                                    <br />
                                    <span class="text-muted">
                                        <small>{{ __('Offline') }}</small>
                                    </span>
                                </div>
                                <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                            class="fa fa-envelope"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar">
                                        <img src="{{ asset('paper/img/faces/joe-gardner-2.jpg') }}" alt="Circle Image"
                                             class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-7 col-7">
                                    {{ __('Creative Tim') }}
                                    <br />
                                    <span class="text-success">
                                        <small>{{ __('Available') }}</small>
                                    </span>
                                </div>
                                <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                            class="fa fa-envelope"></i></button>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-2 col-2">
                                    <div class="avatar">
                                        <img src="{{ asset('paper/img/faces/clem-onojeghuo-2.jpg') }}" alt="Circle Image"
                                             class="img-circle img-no-padding img-responsive">
                                    </div>
                                </div>
                                <div class="col-ms-7 col-7">
                                    {{ __('Flume') }}
                                    <br />
                                    <span class="text-danger">
                                        <small>{{ __('Busy') }}</small>
                                    </span>
                                </div>
                                <div class="col-md-3 col-3 text-right">
                                    <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                            class="fa fa-envelope"></i></button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center">
            <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Edit Profile') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('First Name') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ auth()->user()->first_name }}">
                                </div>
                                @if ($errors->has('first_name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Last Name') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ auth()->user()->last_name }}">
                                </div>
                                @if ($errors->has('last_name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}">
                                </div>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{ __('Change Password') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                </div>
                                @if ($errors->has('old_password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('old_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                </div>
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $("i").click(function () {
            $("input[type='file']").trigger('click');
        });

        $('input[type="file"]').on('change', function () {
            var val = $(this).val();
            $(this).siblings('span').text(val);
        })

    });
</script>
@endpush