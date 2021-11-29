@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'reduceFare'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.REDUCE_FARE' ) <i class="fa fa-car-side"></i></h3>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <div class="card-body ">
                        {!! Form::open(['route' => ['fare-setting.updateReduceFare',$reduceFare->id],'method' => 'PATCH']) !!}
                        @csrf
                        <div class="row">
                            <div class="input-group col-md-6">
                                {!! Form::text('reduce_fare_percentage',$reduceFare->reduce_fare_percentage,['class' => 'form-control','placeholder' =>'Enter reduce fare percentage']) !!}
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">Percentage</span>
                                </div>
                            </div>
                            @if ($errors->has('reduce_fare_percentage'))
                            <span class="invalid-feedback" style="display: block;" role="alert">
                                <strong>{{ $errors->first('reduce_fare_percentage') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="card-footer ">
                        <button type="submit" class="btn btn-info btn-round">{{ __('Update') }}</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection