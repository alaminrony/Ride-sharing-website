@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'AdminEditBillSeting'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.EDIT')  @lang('lang.FARE' ) <i class="fa fa-car-side"></i></h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body ">
                         {!! Form::open(['route' => array('fare-setting.update',$fare->id), 'method' => 'PATCH']) !!}
                        @csrf
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                {!! Form::text('competitor_name',!empty($fare->competitor_name)?$fare->competitor_name:'',['class' => 'form-control','placeholder' =>'Enter competitor name']) !!}
                                @if ($errors->has('competitor_name'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('competitor_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                {!! Form::text('base_fare',!empty($fare->base_fare)?$fare->base_fare:'',['class' => 'form-control','placeholder' =>'Enter Base fare']) !!}
                                @if ($errors->has('base_fare'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('base_fare') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                {!! Form::text('cost_per_minutes',!empty($fare->cost_per_minutes)?$fare->cost_per_minutes:'',['class' => 'form-control','placeholder' =>'Enter cost per minutes']) !!}
                                @if ($errors->has('cost_per_minutes'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('cost_per_minutes') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                {!! Form::text('cost_per_kilometer',!empty($fare->cost_per_kilometer)?$fare->cost_per_kilometer:'',['class' => 'form-control','placeholder' =>'Enter cost per kilometer']) !!}
                                @if ($errors->has('cost_per_kilometer'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('cost_per_kilometer') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                </div>
                                {!! Form::text('booking_fee',!empty($fare->booking_fee)?$fare->booking_fee:'',['class' => 'form-control','placeholder' =>'Enter booking fee']) !!}
                                @if ($errors->has('booking_fee'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('booking_fee') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="card-footer ">
                            <button type="submit" class="btn btn-info btn-round">{{ __('Submit') }}</button>
                            <a href="{{route('fare-setting.index')}}" class="btn btn-warning btn-round">Cancel</a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection