@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottom">
                    <p>Add vehicles</p>
                    <p><a href="#"><img src="{{asset('frontEnd/assets/img/dashboard/plus.png')}}" alt="Edit" class="img-fluid"></a></p>
                </div>
                @include('frontEnd.layouts.alert-message')
                <form action="#" id="addVehiclesForm">
                    <input type="hidden" name="driver_id" value="{{$driver->id}}">
                    <div class="update-vehicles">
                        <div class="vehicles-photo">
                            <div>
                                <p>Photo</p>
                                <img src="{{asset('frontEnd/assets/img/dashboard/car1.png')}}" alt="car1" class="img-fluid" id="defaultImage">
                                <img src="#" alt="car1" class="img-fluid" id="previewImage" style="display:none;width: 130px;height: 92px;">
                                <input type="file" name="photo" style="display:none" id="browsCarAdd">
                                <div class="text-danger" id="photo_error"></div>
                            </div>
                            <div class="inner-input">
                                <input type="text" class="form-control" readonly=""> 
                                <button id="addImage">Browse</button>
                            </div>
                        </div>
                        <div class="inputField">
                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Model</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter Model" name="model_number"> 
                                <div class="text-danger" id="model_number_error"></div>
                            </div>
                            <div class="form-group inputFiedl-inner">
                                <select id="exampleFormControlSelect1" name="cabtype_id">
                                    @foreach($cabType as $key => $cab)
                                    <option value="{{$key}}">{{$cab}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger" id="cabtype_id_error"></div>
                            </div>

                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Color</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter color" name="color"> 
                                <div class="text-danger" id="color_error"></div>
                            </div>
                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Number Plate</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter Licence no" name="number_plate"> 
                                <div class="text-danger" id="number_plate_error"></div>
                            </div>
                            <div>
                                <div class="passenger-grid">
                                    <div>
                                        <p>Passenger Capacity</p>
                                    </div>
                                    <div>
                                        <ul class="list-inline countNumber" id="passengerCapacityValue">
                                            <li class="list-inline-item" id='0'><a href="#">0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#">1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#">2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#">3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#">4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#">5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#">6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#">7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#">8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#">9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#">10</a></li>
                                        </ul>
                                        <span class="text-danger" id="passenger_capacity_error"></span>
                                    </div>
                                    <input type="hidden" name="passenger_capacity" id="passengerCapacity" value="">
                                    <div>
                                        <p>Children</p>
                                    </div>
                                    <div>
                                        <!--                                      <ul class="list-inline countNumber countAny" id="childrenStatus">
                                                                                    <li class="list-inline-item" id="Any"><a href="#">Any</a></li>
                                                                                    <li class="list-inline-item" id="Yes"><a href="#">Yes</a></li>
                                                                                    <li class="list-inline-item" id="No"><a href="#">No</a></li>
                                                                                </ul>
                                                                                <span class="text-danger" id="children_status_error">kgjrgrtr</span>-->
                                        <ul class="list-inline countNumber pt-2" id="childrenNumber">
                                            <li class="list-inline-item" id='0'><a href="#">0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#">1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#">2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#">3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#">4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#">5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#">6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#">7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#">8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#">9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#">10</a></li>
                                        </ul>
                                        <span class="text-danger" id="children_error"></span>
                                    </div>
                                    <!--<input type="hidden" name="children_status" id="childrenStatusInput" value="">-->
                                    <input type="hidden" name="children" id="childrenCapacity" value="">
                                    <div>
                                        <p>Wheel Chair</p>
                                    </div>
                                    <div>
                                        <ul class="list-inline countNumber countAny" id="wheelchairNumber">
                                            <li class="list-inline-item" id='1'><a href="#">Yes</a></li>
                                            <li class="list-inline-item" id="0"><a href="#">No</a></li>
                                        </ul>
<!--                                        <ul class="list-inline countNumber pt-2" id="wheelchairNumber">
                                            <li class="list-inline-item" id='0'><a href="#">0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#">1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#">2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#">3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#">4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#">5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#">6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#">7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#">8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#">9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#">10</a></li>
                                        </ul>-->
                                        <span class="text-danger" id="wheelchair_error"></span>
                                    </div>
                                    <input type="hidden" name="wheelchair" id="wheelchairCapacity" value="">
                                    <div>
                                        <p>Status</p>
                                    </div>
                                    <div class="active-clas d-flex">
                                        <p><label class="containerCheckBox">Active
                                                <input type="radio" name='status' checked="checked"  value="1" class="status-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </p>
                                        <p class="mx-2"><label class="containerCheckBox">Inactive
                                                <input type="radio" name='status'  value="0" class="status-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="btn-bottom text-center">
                                    <button id="addVehiclesFormSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#addImage', function (event) {
            event.preventDefault();
            $('#browsCarAdd').click();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#defaultImage').hide();
                    $('#previewImage').show().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#browsCarAdd").change(function () {
            readURL(this);
        });

        $(document).on('click', '#passengerCapacityValue li', function (event) {
            event.preventDefault();
            var value = $(this).attr('id');
            $('#passengerCapacity').val(value);
        });

        $(document).on('click', '#childrenNumber li', function (event) {
            event.preventDefault();
            var value = $(this).attr('id');
            $('#childrenCapacity').val(value);
        });
        $(document).on('click', '#wheelchairNumber li', function (event) {
            event.preventDefault();
            var value = $(this).attr('id');
            $('#wheelchairCapacity').val(value);
        });
        $(document).on('click', '#addVehiclesFormSubmit', function (event) {
            event.preventDefault();
            var formData = new FormData($('#addVehiclesForm')[0]);
            $.ajax({
                url: "{{ route('driver.storeVehicles')}}",
                data: formData,
                dataType: "json",
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#model_number_error').text('');
                    $('#cabtype_id_error').text('');
                    $('#color_error').text('');
                    $('#number_plate_error').text('');
                    $('#passenger_capacity_error').text('');
                    $('#children_error').text('');
                    $('#wheelchair_error').text('');
                    $('#photo_error').text('');
                    if (data.errors) {
                        $('#model_number_error').text(data.errors.model_number);
                        $('#cabtype_id_error').text(data.errors.cabtype_id);
                        $('#color_error').text(data.errors.color);
                        $('#number_plate_error').text(data.errors.number_plate);
                        $('#passenger_capacity_error').text(data.errors.passenger_capacity);
                        $('#children_error').text(data.errors.children);
                        $('#wheelchair_error').text(data.errors.wheelchair);
                        $('#photo_error').text(data.errors.photo);
                    }
                    if (data.response == 'success') {
                        $('.alert-success').show().text('Vehicle added successfully!!');
                    }
                }
            });
        });




    });
</script>
@endpush