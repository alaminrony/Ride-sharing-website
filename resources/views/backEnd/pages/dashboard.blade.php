@extends('backEnd.layouts.app', [
'class' => '',
'elementActive' => 'dashboard'
])

@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-users text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Users</p>
                                <p class="card-title">{{$totalUsers}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <!--<i class="fa fa-refresh"></i> Update Now-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-users text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Drivers</p>
                                <p class="card-title">{{$totalDrivers}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <!--<i class="fa fa-calendar-o"></i> Last day-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-users text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Passengers</p>
                                <p class="card-title">{{$totalPassengers}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <!--<i class="fa fa-clock-o"></i> In the last hour-->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="fa fa-car text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Total Cabs</p>
                                <p class="card-title">{{$totalCabs}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <!--<i class="fa fa-refresh"></i> Update now-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Month Wise Cab Rides</h5>
                    <p class="card-category">Current Year Performance</p>
                </div>
                <div class="card-body ">
                    <canvas id=chartHours width="400" height="100"></canvas>
                </div>
<!--                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> 
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">Ride Status</h5>
                    <p class="card-category">Overall Performance</p>
                </div>
                <div class="card-body ">
                    <canvas id="chartEmail"></canvas>
                </div>
                <div class="card-footer ">
                    <div class="legend">
                        <i class="fa fa-circle text-danger"></i> Complete
                        <i class="fa fa-circle text-warning"></i> Cancel
                        <i class="fa fa-circle text-primary"></i> Pending
                        <i class="fa fa-circle text-gray"></i> Time Out
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-calendar"></i> Number of Rides <b>{{!empty($totalCabRides)?$totalCabRides:''}}</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">Ride Status</h5>
                    <p class="card-category">Line Chart with Points</p>
                </div>
                <div class="card-body">
                    <canvas id="speedChart" width="400" height="100"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                         <i class="fa fa-circle text-warning"></i> Complete Rides
                        <i class="fa fa-circle text-info"></i> Cancel Rides
                    </div>
                    <hr />
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js

        chartColor = "#FFFFFF";

        ctx = document.getElementById('chartHours').getContext("2d");

        myChart = new Chart(ctx, {
            type: 'line',

            data: {
//                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
                labels: [
                    <?php
                  if($monthWiseCabRides->isNotEmpty()){
                      foreach($monthWiseCabRides as $cabRide){ ?>
                                      "{{!empty($monthArr[$cabRide->month])?$monthArr[$cabRide->month]:'0'}}",
                          
                  <?php }}?>
                ],
                datasets: [{
                        borderColor: "#f17e5d",
                        backgroundColor: "#f17e5d",
                        pointRadius: 0,
                        pointHoverRadius: 0,
                        borderWidth: 3,
//                        data: [300, 310, 316, 322, 330, 326, 333, 345, 338, 354]
                        data: [
                            <?php
                  if($monthWiseCabRides->isNotEmpty()){
                      foreach($monthWiseCabRides as $cabRide){ ?>
                                      "{{!empty($cabRide->data)? $cabRide->data:'0'}}",
                          
                  <?php }}?>
                        ]
                    },
//                    {
//                        borderColor: "#f17e5d",
//                        backgroundColor: "#f17e5d",
//                        pointRadius: 0,
//                        pointHoverRadius: 0,
//                        borderWidth: 3,
//                        data: [320, 340, 365, 360, 370, 385, 390, 384, 408, 420]
//                    },
//                    {
//                        borderColor: "#fcc468",
//                        backgroundColor: "#fcc468",
//                        pointRadius: 0,
//                        pointHoverRadius: 0,
//                        borderWidth: 3,
//                        data: [370, 394, 415, 409, 425, 445, 460, 450, 478, 484]
//                    }
                ]
            },
            options: {
                legend: {
                    display: false
                },

                tooltips: {
                    enabled: false
                },

                scales: {
                    yAxes: [{

                            ticks: {
                                fontColor: "#9f9f9f",
                                beginAtZero: false,
                                maxTicksLimit: 5,
                                //padding: 20
                            },
                            gridLines: {
                                drawBorder: false,
                                zeroLineColor: "#ccc",
                                color: 'rgba(255,255,255,0.05)'
                            }

                        }],

                    xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(255,255,255,0.1)',
                                zeroLineColor: "transparent",
                                display: false,
                            },
                            ticks: {
                                padding: 20,
                                fontColor: "#9f9f9f"
                            }
                        }]
                },
            }
        });


        ctx = document.getElementById('chartEmail').getContext("2d");

        myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [1, 2, 3],
                datasets: [{
                        label: "Emails",
                        pointRadius: 0,
                        pointHoverRadius: 0,
                        backgroundColor: [
                            '#e3e3e3',
                            '#4acccd',
                            '#fcc468',
                            '#ef8157',
                        ],
                        borderWidth: 0,
//                        data: [100, 200, 300, 400]
                        data: [<?php echo $cabRidesTimeout->data?>, <?php echo $cabRidesPending->data?>, <?php echo $cabRidesCancel->data?>,<?php echo $cabRidesComplete->data?>]
                    }]
            },

            options: {

                legend: {
                    display: false
                },

                pieceLabel: {
                    render: 'percentage',
                    fontColor: ['white'],
                    precision: 2
                },

                tooltips: {
                    enabled: false
                },

                scales: {
                    yAxes: [{

                            ticks: {
                                display: false
                            },
                            gridLines: {
                                drawBorder: false,
                                zeroLineColor: "transparent",
                                color: 'rgba(255,255,255,0.05)'
                            }

                        }],

                    xAxes: [{
                            barPercentage: 1.6,
                            gridLines: {
                                drawBorder: false,
                                color: 'rgba(255,255,255,0.1)',
                                zeroLineColor: "transparent"
                            },
                            ticks: {
                                display: false,
                            }
                        }]
                },
            }
        });

        var speedCanvas = document.getElementById("speedChart");

        var dataFirst = {
//            data: [0, 19, 15, 20, 30, 40, 40, 50, 25, 30, 50, 70],
            data: [
                <?php
                  if($monthWiseSuccessRides->isNotEmpty()){
                      foreach($monthWiseSuccessRides as $SuccessRides){ ?>
                                      "{{!empty($SuccessRides->data)?$SuccessRides->data:'0'}}",
                                      
                          
                  <?php }}?>
            ],
            fill: false,
            borderColor: '#fbc658',
            backgroundColor: 'transparent',
            pointBorderColor: '#fbc658',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8,
        };

        var dataSecond = {
//            data: [0, 5, 10, 12, 20, 27, 30, 34, 42, 45, 55, 63],
            data: [
                <?php
                  if($monthWiseCancelRides->isNotEmpty()){
                      foreach($monthWiseCancelRides as $cancelRides){ ?>
                                      "{{!empty($cancelRides->data)?$cancelRides->data:'0'}}",
                                      
                          
                  <?php }}?>
            ],
            fill: false,
            borderColor: '#51CACF',
            backgroundColor: 'transparent',
            pointBorderColor: '#51CACF',
            pointRadius: 4,
            pointHoverRadius: 4,
            pointBorderWidth: 8
        };

        var speedData = {
//            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            labels: [
                <?php
                  if($monthWiseSuccessRides->isNotEmpty()){
                      foreach($monthWiseSuccessRides as $SuccessRides){ ?>
                                      "{{!empty($monthArr[$SuccessRides->month])?$monthArr[$SuccessRides->month]:'0'}}",
                          
                  <?php }}?>
            ],
            datasets: [dataFirst, dataSecond]
        };

        var chartOptions = {
            legend: {
                display: false,
                position: 'top'
            }
        };

        var lineChart = new Chart(speedCanvas, {
            type: 'line',
            hover: false,
            data: speedData,
            options: chartOptions
        });
        
//        demo.initChartsPages();

    });
</script>
@endpush