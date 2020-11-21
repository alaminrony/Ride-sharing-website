<?php

namespace App\Http\Controllers\admin;

use App\CabRide;
use App\RideStatus;
use App\Passenger;
use App\Driver;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CabRideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cabrides = CabRide::latest()->paginate(10);

        $ride_status = RideStatus::all()->pluck('name','id');

         $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();

        $passengers = Passenger::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();

        $cabrides = CabRide::query()
        ->where('ridestatus_id', 6)
        ->latest()
        ->paginate(10);
        return view('backEnd.cabride.index',compact('cabrides','ride_status','drivers','passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CabRide  $cabRide
     * @return \Illuminate\Http\Response
     */
    public function show(CabRide $cabRide)
    {
        return view('backEnd.cabride.modal',compact('cabRide'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CabRide  $cabRide
     * @return \Illuminate\Http\Response
     */
    public function edit(CabRide $cabRide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CabRide  $cabRide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CabRide $cabRide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CabRide  $cabRide
     * @return \Illuminate\Http\Response
     */
    public function destroy(CabRide $cabRide)
    {
        $cabRide->delete();
        return redirect()->route('cabe-ride.index')
                    ->with('success','Ride deleted successfully');

    }
    public function pending()
    {
        $cabrides = CabRide::query()
        ->where('ridestatus_id', 1)
        ->latest()
        ->paginate(10);
        return view('backEnd.cabride.pending',compact('cabrides'));
    }
    public function discount()
    {
         $ride_status = RideStatus::all()->pluck('name','id');

         $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();


        $passengers = Passenger::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();;


        $cabrides = CabRide::query()
       
        ->latest()
        ->paginate(10);
        return view('backEnd.cabride.discount',compact('cabrides','ride_status','drivers','passengers'));
    }
    public function filter(Request $request)
    {
        $status_id = $request->status_id;
        $driver_id = $request->driver_id;
        $passenger_id = $request->passenger_id;
        // print_r($request->all());

        $ride_status = RideStatus::all()->pluck('name','id');

        $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();


        $passengers = Passenger::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();

        // $cabrides = CabRide::all();

        $cabs = CabRide::query();

        if (!empty($status_id)) {
            $cabs->where('ridestatus_id', '=', $request->status_id);
        }

        if (!empty($driver_id)) {
            $cabs->where('driver_id','=', $request->driver_id);
        }

        if (!empty($passenger_id)) {
            $cabs->where('passenger_id','=', $request->passenger_id);
        }

        $cabrides = $cabs->get();

        return view('backEnd.cabride.index',compact('cabrides','ride_status','drivers','passengers'));
    }
}
