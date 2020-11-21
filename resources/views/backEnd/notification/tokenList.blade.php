@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'tokenList'
])
@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Device Token</h3>
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
                                <th scope="col">Name</th>
                                <th scope="col">Device Type</th>
                                <th scope="col">User Type</th>
                                <th scope="col">Token</th>
                                <th scope="col">Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach($allTokens as $token)
                            <?php $i++; ?>
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ (!empty($token->user_type) && ($token->user_type == '1'))? $drivers[$token->driver_id]??'' : $passengers[$token->driver_id]??'' }}</td>
                                <td>{{ $token->device_id == '1' ? 'IOS' : 'Android' }}</td>
                                <td>{{  (!empty($token->user_type) && ($token->user_type == '1'))? 'Drivers' : 'Passengers'}}</td>
                                <td>{{  !empty($token->token)? $token->token : 'N/A'}}</td>
                                <td>{{ date('d F Y \a\t h:i: a',strtotime($token->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$allTokens->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
