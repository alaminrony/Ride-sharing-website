@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'operatorList'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.TAXI_OPERATOR')</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('taxi-operator.create')}}" class="btn btn-sm btn-primary">@lang('lang.ADD_TAXI_OPERATOR')</a>
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
                                <th scope="col">@lang('lang.SL')</th>
                                <th scope="col">@lang('lang.TAXI_OPERATOR_NAME')</th>
                                <th scope="col">@lang('lang.STATUS')</th>
                                <th scope="col">@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($taxiOperator as $operator)
                            <?php $i++;?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$operator->name}}</td>
                                <td>{{($operator->status == 1)? 'Active' :'Inactive'}}</td>
                                <td>
                                    <form action="{{ route('taxi-operator.destroy',$operator->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('taxi-operator.edit',$operator->id) }}">
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
                {{ $taxiOperator->links() }}
            </div>
        </div>
    </div>
</div>
@endsection