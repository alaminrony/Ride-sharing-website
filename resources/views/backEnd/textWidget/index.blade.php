@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'textWidget'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Text widget List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('admin/text-widget/create')}}" class="btn btn-sm btn-primary">Add Text widget</a>
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
                                <th scope="col">SL</th>
                                <th scope="col">@lang('lang.TITLE')</th>
                                <th scope="col">@lang('lang.CONTENT_LINK')</th>
                                <th scope="col">@lang('lang.POSITION')</th>
                                <th scope="col">@lang('lang.CREATED_AT')</th>
                                <th scope="col">@lang('lang.STATUS')</th>
                                <th scope="col">@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($targets->isNotEmpty())
                            <?php $i = 0;?>
                            @foreach($targets as $target)
                            <?php $i++;?>
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$target->title}}</td>
                                <td>{{urldecode($target->content_link)}}</td>
                                <td>{{$sectionArr[$target->position]}}</td>
                                <td>{{ datefunction($target->created_at) }}</td>
                                <td>{{ status($target->status) }}</td>
                                <td>
                                    <form action="{{ route('text-widget.delete',$target->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('text-widget.edit',$target->id) }}">
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
                            @else
                            <tr>
                                <td>{{'No data found'}}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                {{ $targets->links() }}
            </div>
        </div>
    </div>
</div>
@endsection