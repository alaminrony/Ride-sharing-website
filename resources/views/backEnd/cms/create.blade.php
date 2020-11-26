@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'cmsCreate'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">CMS Page Create<i class="nc-icon nc-single-02"></i></h3>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="card-body ">
                        {!! Form::open(['route' => 'cms-page.store','method' => 'POST','enctype' => 'multipart/form-data']) !!}
                        @csrf
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                {!! Form::text('title',old('title'),['class' => 'form-control','placeholder' =>Lang::get('lang.TITLE')]) !!}
                                @if ($errors->has('title'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                {!! Form::text('link',old('link'),['class' => 'form-control','placeholder' =>'Enter Page Link']) !!}
                                @if ($errors->has('link'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('link') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-group col-md-12">

                                {!! Form::textarea('description',old('description'),['class' => 'form-control','id'=>'editor','placeholder' =>Lang::get('lang.DESCRIPTION')]) !!}
                                @if ($errors->has('description'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                {!! Form::text('meta_title',old('meta_title'),['class' => 'form-control','placeholder' =>'Meta title']) !!}
                                @if ($errors->has('meta_title'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('meta_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="input-group col-md-6">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                {!! Form::text('meta_description',old('meta_description'),['class' => 'form-control','placeholder' =>'Meta Description']) !!}
                                @if ($errors->has('meta_description'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('meta_description') }}</strong>
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
                                {!! Form::select('status', ['0' => 'Inactive', '1' => 'Active'],null,['class'=>'form-control','placeholder'=> 'Status'])!!}
                                @if ($errors->has('status'))
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer ">
                            <button type="submit" class="btn btn-info btn-round">{{ __('Submit') }}</button>
                            <a href="{{url('admin/latest-news')}}" class="btn btn-warning btn-round">Cancel</a>
                        </div>
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
           var editor = new Jodit('#editor');
            editor.value = '{!!old('description')!!}';
</script>
@endpush
