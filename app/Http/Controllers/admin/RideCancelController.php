<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RideCancel;
use App\CabRide;
use Illuminate\Http\Request;

class RideCancelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $rideCancels = CabRide::where('ridestatus_id','3')->latest()->paginate(5);
        return view('backEnd.cabride.cancel',compact('rideCancels'));
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
     * @param  \App\RideCancel  $rideCancel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $cabRide = CabRide::where('ridestatus_id','3')->first();
        $view = view('backEnd.cabride.cancelmodal')->with(compact('cabRide'))->render();
        return response(['data'=>$view]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RideCancel  $rideCancel
     * @return \Illuminate\Http\Response
     */
    public function edit(RideCancel $rideCancel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RideCancel  $rideCancel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideCancel $rideCancel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RideCancel  $rideCancel
     * @return \Illuminate\Http\Response
     */
    public function destroy(RideCancel $rideCancel)
    {
        //
    }
}
