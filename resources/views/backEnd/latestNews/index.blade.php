@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'LatestNews'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Latest News List</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{url('admin/latest-news/create')}}" class="btn btn-sm btn-primary">Add Latest News</a>
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
                                <th scope="col">@lang('lang.TITLE')</th>
                                <th scope="col">@lang('lang.CREATED_AT')</th>
                                <th scope="col">@lang('lang.STATUS')</th>
                                <th scope="col">@lang('lang.ACTION')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($latestNews->isNotEmpty())
                            @foreach($latestNews as $news)
                            <tr>
                                <td><img src="{{ asset($news->image) }}" width="70px"></td>
                                <td>{{$news->title}}</td>
                                <td>{{ datefunction($news->created_at) }}</td>
                                <td>{{ status($news->status) }}</td>
                                <td>
                                    <form action="{{ route('latest-news.delete',$news->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('latest-news.edit',$news->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        {{--   <a class="btn btn-sm btn-danger" title="Add to Trash" onclick="return confirm('Are you sure')" href="{{ route('driver.trash',$driver->id) }}">
                                        <i class="fa fa-trash"></i>
                                        </a> --}}
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
                                <td colspan="6">No data found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="ml-2">
                    {{ $latestNews->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection