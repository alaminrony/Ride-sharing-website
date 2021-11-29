@if($request->view == 'print' || $request->view == 'pdf')
<html>
    <head>
        <title>Cab Ride List</title>

        @if(Request::get('view') == 'print')
        <link rel="shortcut icon" href="{{URL::to('/')}}/public/img/favicon.ico" />
         <link href="{{ asset('paper') }}/css/downloadPdfPrint/print.css" rel="stylesheet" />

        @elseif(Request::get('view') == 'pdf')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="shortcut icon" href="{!! base_path() !!}/public/img/favicon.ico" />
        @endif
    </head>
    <body>
        @endif
        <!--Laravel Excel not supported body & other tags, only Table tag accepted-->
                     <table style="border-spacing: -1px;">
                        <thead>
                            <tr>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">SL</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.DRIVER_NAME')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.PASSENGER')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.PICK_UP_TIME')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.DESTINATION_TIME')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.DISTANCE_KM')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.DISCOUNT')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.BID_AMOUNT')</th>
                                <th style="border:1px solid #000; text-align: center;padding: 4px;">@lang('lang.STATUS')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;?>
                            @foreach($cabrides as $cabride)
                             <?php $i++;?>
                            <tr>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$i}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->driver->full_name??''}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->passenger->full_name??''}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{pickupDate($cabride->start_time)}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{pickupDate($cabride->end_time)}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->riding_distance}}</td>

                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->ride_type == '1'? 'Yes' : 'No'}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->bid_amount??''}}</td>
                                <td style="border:1px solid #000; text-align: center;padding: 4px;">{{$cabride->ridestatus->name??''}}</td>
                            </tr>
                            @endforeach 

                            @if($cabrides->isEmpty())
                            <tr>
                                <td colspan="9">No data available.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

        @if($request->view == 'print' || $request->view == 'pdf')
        <div class="row">
            <div class="col-md-4">
                <div class="col-md-4">
                    <p>Report Generate On {{ Helper::dateFormat(date('Y-m-d H:i:s')).' by '.Auth::user()->first_name.' '.Auth::user()->last_name}}</p>
                </div>
            </div>
            <div class="col-md-8 print-footer">
                <p><b>Thanks for being with {{$settingArr['company_name'] ?? 'faretrim'}}</b></p>
            </div>
        </div>

    </body>
    <script src="{{ asset('paper') }}/js/core/jquery.min.js"></script>
    <script>
$(document).ready(function () {
    window.print();
});
    </script>
</html>
@endif








