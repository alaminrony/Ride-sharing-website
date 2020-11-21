<div class="table-responsive">
    <table class="table table-striped">
        <tr>
            <td>Title</td>
            <td>{{$notification->title}}</td>
        </tr>

        <tr>
            <td>Details</td>
            <td>{{$notification->notification_details}}</td>
        </tr>
        <tr>
            <td>Send To</td>
            @if($notification->type == '1')
            <td>{{'Drivers'}}</td>
            @elseif($notification->type == '2')
             <td>{{'Passengers'}}</td>
             @elseif($notification->type == '3')
             <td>{{'All'}}</td>
             @else
             <td>{{'N/A'}}</td>
            @endif
        </tr>
        @if(!empty($drivers))
        <tr>
            <td>Drivers</td>
            <td>
                <p>
                    @foreach($drivers as $driver)
                    {{$driver}},
                    @endforeach
                </p>
            </td>
        </tr>
        @endif
        @if(!empty($passengers))
        <tr>
            <td>Passengers</td>
            <td>
                <p>
                    @foreach($passengers as $passenger)
                    {{$passenger}},
                    @endforeach
                </p>

            </td>
        </tr>
        @endif
        <tr>
            <td>Created At</td>
            <td>{{ date('d F Y \a\t h:i: a',strtotime($notification->created_at)) }}</td>
        </tr>
        <tr>
            <td>Created by</td>
            <td>{{created_by($notification->created_by)}}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>{{status($notification->status)}}</td>
        </tr>
    </table>
</div>