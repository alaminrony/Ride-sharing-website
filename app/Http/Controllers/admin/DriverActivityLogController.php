<?php

namespace App\Http\Controllers\admin;

use App\DriverActivityLog;
use App\Driver;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class DriverActivityLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();

        $driver_logs = DriverActivityLog::latest()->paginate(5);
        return view('backEnd.driver.log',compact('driver_logs','drivers')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DriverActivityLog  $driverActivityLog
     * @return \Illuminate\Http\Response
     */
    public function show(DriverActivityLog $driverActivityLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverActivityLog  $driverActivityLog
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverActivityLog $driverActivityLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverActivityLog  $driverActivityLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverActivityLog $driverActivityLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverActivityLog  $driverActivityLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverActivityLog $driverActivityLog)
    {
        //
    }
    public function filter(Request $request)
    {
        $driver_id = $request->driver_id;
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // print_r($start_date);
        // exit;
        $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();
        
         $driver_logs = DriverActivityLog::query()
            ->where('driver_id', $driver_id)
            // ->whereBetween('created_at', array($start_date, $end_date))
             ->paginate(5);

             // print_r($driver_logs);
             // exit;
        return view('backEnd.driver.log',compact('driver_logs','drivers')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
