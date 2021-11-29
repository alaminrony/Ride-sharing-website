<?php

namespace App\Http\Controllers;
use App\User;
use App\Driver;
use App\Passenger;
use App\Cab;
use App\CabRide;
use DB;

class HomeController extends Controller
{
    /**
     * 
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalUsers = User::count();
        $totalDrivers = Driver::count();
        $totalPassengers = Passenger::count();
        $totalCabs = Cab::count();
        $totalCabRides = CabRide::count();
//        echo "<pre>";print_r($totalCabRides);exit;
        
      $monthWiseSuccessRides = CabRide::select(DB::raw('count(id) as `data`'),DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at',date('Y'))
                ->where('ridestatus_id','6')
                ->groupBy('month')
                ->orderBy('month','asc')
                ->get();
        $monthWiseCancelRides = CabRide::select(DB::raw('count(id) as `data`'),DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at',date('Y'))
                ->where('ridestatus_id','3')
                ->groupBy('month')
                ->orderBy('month','asc')
                ->get();
        
        
        $monthArr = ['1'=>'Jan','2'=>'Feb','3'=>'Mar','4'=>'Apr','5'=>'May','6'=>'Jun','7'=>'Jul','8'=>'Aug','9'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec'];        
        
        $monthWiseCabRides = CabRide::select(DB::raw('count(id) as `data`'),DB::raw('MONTH(created_at) as month'))
                ->whereYear('created_at',date('Y'))
                ->groupBy('month')
                ->orderBy('month','asc')
                ->get();
        
        $cabRidesComplete = CabRide::select(DB::raw('count(id) as `data`'))->where('ridestatus_id','6')->first();
        $cabRidesCancel = CabRide::select(DB::raw('count(id) as `data`'))->where('ridestatus_id','3')->first();
        $cabRidesPending = CabRide::select(DB::raw('count(id) as `data`'))->where('ridestatus_id','1')->first();
        $cabRidesTimeout = CabRide::select(DB::raw('count(id) as `data`'))->where('ridestatus_id','7')->first();
        $data['cabRidesComplete'] = $cabRidesComplete;
        $data['cabRidesCancel'] = $cabRidesCancel;
        $data['cabRidesPending'] = $cabRidesPending;
        $data['cabRidesTimeout'] = $cabRidesTimeout;
        
//        echo "<pre>";print_r($cabRidesCancel->data);exit;
        
        return view('backEnd.pages.dashboard',$data)->with(compact('totalUsers','totalDrivers','totalPassengers','totalCabs','monthWiseSuccessRides','monthWiseCancelRides','monthArr','monthWiseCabRides','totalCabRides'));
    }
    
    
}
