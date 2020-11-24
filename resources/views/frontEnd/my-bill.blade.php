@extends('frontEnd.layouts.master')
@section('content')
<!-- Driver Dashboard area -->
<section class="driver_dashboard_area">
    <div class="container">
        <div class="dashboard-grid">
            @include('frontEnd.layouts.driver-profile-left-bar')
            <div class="right-dashbord-content">
                <div class="d-flex justify-content-between marginBottom">
                    <p>My Bill</p>
                </div>
                <div class="table mt-5">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Tran Id</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Amount</th>
                                <th>Payment Status</th>
                                <th>Created at</th>
                            </tr>
                            @if($driverBill->isNotEmpty())
                            <?php $i =0;?>
                            @foreach($driverBill as $bill)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$bill->transaction_id}}</td>
                                <td>{{$bill->start_date}}</td>
                                <td>{{$bill->end_date}}</td>
                                <td>{{$bill->amount}}</td>
                                @if($bill->payment_status == '1')
                                 <td>{{'Free'}}</td>
                                 @elseif($bill->payment_status == '2')
                                  <td>{{'Paid'}}</td>
                                 @else
                                  <td>{{'Pending'}}</td>
                                @endif
                               
                                <td>{{date('d M Y \a\t h:i a',strtotime($bill->created_at))}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td>No data found</td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection