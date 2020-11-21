@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'notification'
])
@section('content')

<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">@lang('lang.NOTIFICATION')</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{route('notification.create')}}" class="btn btn-sm btn-primary">@lang('lang.ADD_NOTIFICATION')</a>
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
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Send to</th>
                                <th scope="col">Drivers</th>
                                <th scope="col">Passengers</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($Notifications as $notification)
                            <?php $i++;?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>{{ $notification->notification_details }}</td>
                                <td>{{ !empty($notification->type)? $typeArr[$notification->type] : 'N/A' }}</td>
                                <td>{{  !empty($notification->drivers)?'Yes' :'N/A'}}</td>
                                <td>{{  !empty($notification->passengers)?'Yes' :'N/A'}}</td>
                                <td>{{ date('d F Y \a\t h:i: a',strtotime($notification->created_at)) }}</td>
                                <td>
                                    <form action="{{ route('notification.destroy',$notification->id) }}" method="POST">
                                        <div class="btn-group">
<!--                                            <a class="btn btn-sm btn-primary" href="{{ route('notification.edit',$notification->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>-->
                                            <a class="btn btn-sm btn-info" onclick="show({{$notification->id}})" href="#">
                                                <i class="fa fa-info"></i>
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
                {{$Notifications->links()}}
            </div>
        </div>
    </div>
</div>

{{-- modal start--}}
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Notification details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- modal end--}}
<script>
    function show(id) {
    var id = id;
    $.get("{{ route('notification.index') }}" + '/' + id, function (data) {
    $('#detailsModal').modal('show');
    $('.modal-body').html(data);
    })
            }
</script>
@endsection