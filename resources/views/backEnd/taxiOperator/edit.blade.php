@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'editOperator'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.EDIT')  @lang('lang.TAXI_OPERATOR')
                        </div>
                    </div>
                  
                </div>
                <div class="table-responsive">
                    <div class="card-body ">
                    {!! Form::open( ['route' => ['taxi-operator.update', $taxiOperator->id],'enctype'=>'multipart/form-data']) !!}
                     {{ method_field('PATCH') }}
                        @csrf
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                {!! Form::text('name',!empty($taxiOperator->name) ? $taxiOperator->name : old('name'),['class' => 'form-control','placeholder' =>Lang::get('lang.TAXI_OPERATOR_NAME')]) !!}
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" style="display: block;" role="cancel_issue_type">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-question-circle"></i>
                                    </span>
                                </div>
                                {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'],!empty($taxiOperator->status) ? $taxiOperator->status : old('status'),['class'=>'form-control','placeholder'=> Lang::get('lang.STATUS')])!!}
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-info btn-round">{{ __('Update') }}</button>
                            <a href="{{route('cancel-issue.index')}}" class="btn btn-warning btn-round">Cancel</a>
                        </div>
                        {!! Form::close() !!}                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection