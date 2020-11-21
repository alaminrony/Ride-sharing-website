@extends('frontEnd.layouts.master')
@push('css')
<style type="text/css">
    .red-color{
        background-color: black !important;

    }
</style>
@endpush
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')

            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottom">
                    <p>View vehicle</p>
                    <p><a href="#"><img src="{{asset('frontEnd/assets/img/dashboard/plus.png')}}" alt="Edit" class="img-fluid"></a></p>
                </div>
                @include('frontEnd.layouts.alert-message')
                <form action="#" id="addVehiclesForm">
                    <input type="hidden" name="driver_id" value="">
                    <div class="update-vehicles">
                        <div class="vehicles-photo">
                            <div>
                                <p>Photo</p>
                                <img src="{{url($vehicle->photo)}}" alt="car1" class="img-fluid" id="defaultImage">
                            </div>
                        </div>
                        <div class="inputField">
                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Model</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter Model" name="model_number" value="{{$vehicle->model_number}}" readonly> 
                                <div class="text-danger" id="model_number_error"></div>
                            </div>
                            <div class="form-group inputFiedl-inner">
                                <select id="exampleFormControlSelect1" name="cabtype_id">
                                    @foreach($cabType as $key => $cab)
                                    <option  <?= $vehicle->cabtype_id == $key ? ' selected="selected"' : ''; ?>>{{$cab}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger" id="cabtype_id_error"></div>
                            </div>

                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Color</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter color" name="color" value="{{$vehicle->color}}"> 
                                <div class="text-danger" id="color_error"></div>
                            </div>
                            <div class="form-group inputFiedl-inner">
                                <label for="exampleInputEmail1">Number Plate</label>
                                <input type="text" id="exampleInputEmail1"  placeholder="Enter Licence no" name="number_plate" value="{{$vehicle->number_plate}}"> 
                                <div class="text-danger" id="number_plate_error"></div>
                            </div>
                            <div>
                                <div class="passenger-grid">
                                    <div>
                                        <p>Passenger Capacity</p>
                                    </div>
                                    <div>
                                        <ul class="list-inline countNumber" id="passengerCapacityValue">
                                            <li class="list-inline-item" id='0'><a href="#" <?= $vehicle->passenger_capacity == '0' ? 'class="red-color"' : '' ?>>0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#" <?= $vehicle->passenger_capacity == '1' ? 'class="red-color"' : '' ?>>1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#" <?= $vehicle->passenger_capacity == '2' ? 'class="red-color"' : '' ?>>2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#" <?= $vehicle->passenger_capacity == '3' ? 'class="red-color"' : '' ?>>3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#" <?= $vehicle->passenger_capacity == '4' ? 'class="red-color"' : '' ?>>4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#" <?= $vehicle->passenger_capacity == '5' ? 'class="red-color"' : '' ?>>5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#" <?= $vehicle->passenger_capacity == '6' ? 'class="red-color"' : '' ?>>6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#" <?= $vehicle->passenger_capacity == '7' ? 'class="red-color"' : '' ?>>7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#" <?= $vehicle->passenger_capacity == '8' ? 'class="red-color"' : '' ?>>8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#" <?= $vehicle->passenger_capacity == '9' ? 'class="red-color"' : '' ?>>9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#" <?= $vehicle->passenger_capacity == '10' ? 'class="red-color"' : '' ?>>10</a></li>
                                        </ul>
                                        <span class="text-danger" id="passenger_capacity_error"></span>
                                    </div>
                                    <input type="hidden" name="passenger_capacity" id="passengerCapacity" value="">
                                    <div>
                                        <p>Children</p>
                                    </div>
                                    <div>
                                        <!--                                        <ul class="list-inline countNumber countAny" id="childrenStatus">
                                                                                    <li class="list-inline-item" id="Any"><a href="#">Any</a></li>
                                                                                    <li class="list-inline-item" id="Yes"><a href="#">Yes</a></li>
                                                                                    <li class="list-inline-item" id="No"><a href="#">No</a></li>
                                                                                </ul>
                                                                                <span class="text-danger" id="children_status_error">kgjrgrtr</span>-->
                                        <ul class="list-inline countNumber pt-2" id="childrenNumber">
                                            <li class="list-inline-item" id='0'><a href="#" <?= $vehicle->children == '0' ? 'class="red-color"' : '' ?>>0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#" <?= $vehicle->children == '1' ? 'class="red-color"' : '' ?>>1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#" <?= $vehicle->children == '2' ? 'class="red-color"' : '' ?>>2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#" <?= $vehicle->children == '3' ? 'class="red-color"' : '' ?>>3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#" <?= $vehicle->children == '4' ? 'class="red-color"' : '' ?>>4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#" <?= $vehicle->children == '5' ? 'class="red-color"' : '' ?>>5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#" <?= $vehicle->children == '6' ? 'class="red-color"' : '' ?>>6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#" <?= $vehicle->children == '7' ? 'class="red-color"' : '' ?>>7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#" <?= $vehicle->children == '8' ? 'class="red-color"' : '' ?>>8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#" <?= $vehicle->children == '9' ? 'class="red-color"' : '' ?>>9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#" <?= $vehicle->children == '10' ? 'class="red-color"' : '' ?>>10</a></li>
                                        </ul>
                                        <span class="text-danger" id="children_error"></span>
                                    </div>
                                    <!--<input type="hidden" name="children_status" id="childrenStatusInput" value="">-->
                                    <input type="hidden" name="children" id="childrenCapacity" value="">
                                    <div>
                                        <p>Wheel Chair</p>
                                    </div>
                                    <div>
                                        <ul class="list-inline countNumber countAny">
                                            <li class="list-inline-item"><a href="#" <?= $vehicle->wheelchair == '1' ? 'class="red-color"' : '' ?>>Yes</a></li>
                                            <li class="list-inline-item"><a href="#" <?= $vehicle->wheelchair == '0' ? 'class="red-color"' : '' ?>>No</a></li>
                                        </ul>
<!--                                        <ul class="list-inline countNumber pt-2" id="wheelchairNumber">
                                            <li class="list-inline-item" id='0'><a href="#" <?= $vehicle->wheelchair == '0' ? 'class="red-color"' : '' ?>>0</a></li>
                                            <li class="list-inline-item" id='1'><a href="#" <?= $vehicle->wheelchair == '1' ? 'class="red-color"' : '' ?>>1</a></li>
                                            <li class="list-inline-item" id='2'><a href="#" <?= $vehicle->wheelchair == '2' ? 'class="red-color"' : '' ?>>2</a></li>
                                            <li class="list-inline-item" id='3'><a href="#" <?= $vehicle->wheelchair == '3' ? 'class="red-color"' : '' ?>>3</a></li>
                                            <li class="list-inline-item" id='4'><a href="#" <?= $vehicle->wheelchair == '4' ? 'class="red-color"' : '' ?>>4</a></li>
                                            <li class="list-inline-item" id='5'><a href="#" <?= $vehicle->wheelchair == '5' ? 'class="red-color"' : '' ?>>5</a></li>
                                            <li class="list-inline-item" id='6'><a href="#" <?= $vehicle->wheelchair == '6' ? 'class="red-color"' : '' ?>>6</a></li>
                                            <li class="list-inline-item" id='7'><a href="#" <?= $vehicle->wheelchair == '7' ? 'class="red-color"' : '' ?>>7</a></li>
                                            <li class="list-inline-item" id='8'><a href="#" <?= $vehicle->wheelchair == '8' ? 'class="red-color"' : '' ?>>8</a></li>
                                            <li class="list-inline-item" id='9'><a href="#" <?= $vehicle->wheelchair == '9' ? 'class="red-color"' : '' ?>>9</a></li>
                                            <li class="list-inline-item" id='10'><a href="#" <?= $vehicle->wheelchair == '10' ? 'class="red-color"' : '' ?>>10</a></li>
                                        </ul>-->
                                        <span class="text-danger" id="wheelchair_error"></span>
                                    </div>
                                    <input type="hidden" name="wheelchair" id="wheelchairCapacity" value="">
                                    <div>
                                        <p>Status</p>
                                    </div>
                                    <div class="active-clas d-flex">
                                        <p><label class="containerCheckBox">Active
                                                <input type="radio" name='status' <?= $vehicle->status == '1' ? 'checked="checked"' : '' ?>  value="1" class="status-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </p>
                                        <p class="mx-2"><label class="containerCheckBox">Inactive
                                                <input type="radio" name='status' <?= $vehicle->status == '0' ? 'checked="checked"' : '' ?> value="0" class="status-radio">
                                                <span class="checkmark"></span>
                                            </label>
                                        </p>
                                    </div>
                                </div>
                                <div class="btn-bottom text-center">
                                    <button onclick='window.location.href ="{{url('vehicles-list?driverId='.$vehicle->driver_id)}}";return false;'>Back to List</button>
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

