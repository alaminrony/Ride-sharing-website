@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'AdminBillSetingList'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.FARE_SETTING')</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('fare-setting.create')}}" class="btn btn-sm btn-primary">@lang('lang.ADD_FARE')</a>
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
                                <th scope="col">@lang('lang.COMPETITOR_NAME')</th>
                                <th scope="col">@lang('lang.Base_FARE')</th>
                                <th scope="col">@lang('lang.COST_PER_MIN')</th>
                                <th scope="col">@lang('lang.COST_PAR_KELOMITER')</th>
                                <th scope="col">@lang('lang.BOOKING_FEE')</th>
                                <th scope="col">@lang('lang.CREATED_AT')</th>
                                <th scope="col">@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allFares as $fare)
                            <tr>
                                <td>{{$fare->competitor_name}}</td>
                                <td>{{$fare->base_fare}}</td>
                                <td>{{$fare->cost_per_minutes}}</td>
                                <td>{{$fare->cost_per_kilometer}}</td>
                                <td>{{$fare->booking_fee}}</td>
                                <td>{{date('j F Y \a\t h:i a',strtotime($fare->created_at))}}</td>
                                <td>
                                    <form action="{{ route('fare-setting.delete',$fare->id) }}" method="POST">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-primary" href="{{ route('fare-setting.edit',$fare->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure')" class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$allFares->links()}}
            </div>
        </div>
    </div>
</div>
@endsection