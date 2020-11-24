@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'passengerSlider'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Passenger Slider List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('rider-slider.create')}}" class="btn btn-sm btn-primary">Add Rider slider</a>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">@lang('lang.IMAGE')</th>
                                <th scope="col">@lang('lang.CREATED_AT')</th>
                                <th scope="col">@lang('lang.STATUS')</th>
                                <th scope="col">@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($passengerSlider as $slider)
                            <tr>
                                <td><img src="{{asset($slider->image) }}" width="70px"></td>
                                <td>{{ datefunction($slider->created_at) }}</td>
                                <td>{{ status($slider->status) }}</td>
                                <td>
                                    <form action="{{ route('rider-slider.delete',$slider->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('rider-slider.edit',$slider->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $passengerSlider->links() }}
            </div>
        </div>
    </div>
</div>
@endsection