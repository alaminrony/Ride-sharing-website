<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <a class="navbar-brand" href="#pablo">{{ __('Faretrim Dashboard') }}</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form action="" method="post" >
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search..." id="searchForm">
                    <div id="searchData"></div>
                    
                    <!--                    <div class="input-group-append">
                                            <div class="input-group-text">
                                                <i class="nc-icon nc-zoom-split"></i>
                                            </div>
                                        </div>-->
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn-magnify" href="#pablo">
                        <i class="nc-icon nc-layout-11"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Stats') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item btn-rotate dropdown" id="refresh">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="nc-icon nc-bell-55"></i>
                        <span class="qty badge">( {{$notifications??'0'}} )</span>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                        </p>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" style="width: 310px;">
                        @if($allNotifications->isNotEmpty())
                        @foreach ($allNotifications as $notifications)
                        @if($notifications->type == '1')
                        <button type="button" class="dropdown-item clickDriver" data-driverId="{{$notifications->type_id}}"  data-id='{{$notifications->id}}' style="font-size:11px;">{{ $notifications->title }} ({{ date("d M Y h:i a", strtotime($notifications->created_at)) }}) </br>
                            <p>{{ $notifications->details }}</p>
                        </button>
                        @elseif($notifications->type == '2')
                        <button type="button" class="dropdown-item clickPassenger"  data-passengerId="{{$notifications->type_id}}" data-id='{{$notifications->id}}' style="font-size:11px;">{{ $notifications->title }} ({{ date("d M Y h:i a", strtotime($notifications->created_at)) }}) </br>
                            <p>{{ $notifications->details }}</p>
                        </button>
                        @elseif($notifications->type == '3')
                        <button type="button" class="dropdown-item clickRide"  data-rideId="{{$notifications->type_id}}" data-id='{{$notifications->id}}' style="font-size:11px;">{{ $notifications->title }} ({{ date("d M Y h:i a", strtotime($notifications->created_at)) }}) </br>
                            <p>{{ $notifications->details }}</p>
                        </button>
                        @else
                        @endif
                        @endforeach
                        @else
                        <a href="#" class="dropdown-item" style="font-size:12px;text-align: center;">{{'Notification not found'}} </br>
                        </a>
                        @endif
                    </div>
                </li>
                <li class="nav-item btn-rotate dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                            <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" onclick="document.getElementById('formLogOut').submit();">{{ __('Log out') }}</a>
                            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('My profile') }}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '.clickDriver', function () {
            var id = $(this).attr('data-id');
            var driverId = $(this).attr('data-driverId');
            if (id != '') {
                $.ajax({
                    url: "{{url('notificationUpdate')}}",
                    type: "post",
                    data: {id: id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.response == 'success') {
                            var url = "{{url('driver?driverId=')}}" + driverId;
                            $("#refresh").load(" #refresh");
                            window.open(url, '_blank');
                        }
                    }
                });
            }
        });
        $(document).on('click', '.clickPassenger', function () {
            var id = $(this).attr('data-id');
            var passengerId = $(this).attr('data-passengerId');
//            alert(passengerId);return false;
            if (id != '') {
                $.ajax({
                    url: "{{url('notificationUpdate')}}",
                    type: "post",
                    data: {id: id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.response == 'success') {
                            var url = "{{url('passenger?passengerId=')}}" + passengerId;
                            $("#refresh").load(" #refresh");
                            window.open(url, '_blank');
                        }
                    }
                });
            }
        });
        $(document).on('click', '.clickRide', function () {
            var id = $(this).attr('data-id');
            var rideId = $(this).attr('data-rideId');
//            alert(passengerId);return false;
            if (id != '') {
                $.ajax({
                    url: "{{url('notificationUpdate')}}",
                    type: "post",
                    data: {id: id},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        if (data.response == 'success') {
                            var url = "{{url('cab-ride?rideId=')}}" + rideId;
                            $("#refresh").load(" #refresh");
                            window.open(url, '_blank');
                        }
                    }
                });
            }
        });
        $(document).on('keyup', '#searchForm', function () {
            var searchVal = $(this).val();
            if (searchVal != '') {
                $.ajax({
                    url: "{{url('search')}}",
                    type: "post",
                    data: {search: searchVal},
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#searchData').html(data.viewData);
                        
                    }
                });
            } else {
                $('#searchData').html('');
            }
        });
//        $(document).on('click', 'li', function () {
//            var searchVal = $(this).text();
//            $('#searchForm').val(searchVal);
////            alert(searchVal);return false;
//        });
        
    });

</script>
@endpush





