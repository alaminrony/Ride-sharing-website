<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\RideApps;
use Illuminate\Http\Request;
use Auth;

class RideAppsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rideAppss = RideApps::latest()->paginate(5);
        return view('backEnd.rideapps.index',compact('rideAppss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.rideapps.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // print_r($request->all());
        // exit;
         $request->validate([
            'name' => 'required',
            'ride_charge' => 'required',
            'waiting_charge' => 'required',
            'per_km' => 'required',
            'status' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
          if (isset($request->logo)) {
            $path = "uploads/rideapps/";
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move($path, $imageName);
            $image = $path.$imageName;
        }

         $rideApps = new RideApps;
         $rideApps->name = $request->name;
         $rideApps->ride_charge = $request->ride_charge;
         $rideApps->waiting_charge = $request->waiting_charge;
         $rideApps->per_km = $request->per_km;
         $rideApps->status = $request->status;
         $rideApps->logo = isset($request->logo)? $image : null;
         $rideApps->created_by = Auth::user()->id;
         $rideApps->save();
         return redirect()->route('ride-apps.index')->with('success', 'Ride App added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RideApps  $rideApps
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rideApps = RideApps::where('id',$id)->first();
        return view('backEnd.rideapps.modal',compact('rideApps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RideApps  $rideApps
     * @return \Illuminate\Http\Response
     */
    public function edit(RideApps $rideApps,$id)
    {
        $rideApps = RideApps::where('id',$id)->first();
        return view('backEnd.rideapps.edit',compact('rideApps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RideApps  $rideApps
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RideApps $rideApps,$id)
    {
        $rideApps = RideApps::where('id',$id)->first();
        
        $request->validate([
            'name' => 'required',
            'ride_charge' => 'required',
            'waiting_charge' => 'required',
            'per_km' => 'required',
            'status' => 'required',
        ]);
        if (isset($request->logo)) {
            $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if (file_exists($rideApps->logo)) {
                @unlink($rideApps->logo);    
            }
            $path = "uploads/rideapps/";
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move($path, $imageName);
            $image = $path.$imageName;
        }

            $rideApps->name = $request->name;
            $rideApps->ride_charge = $request->ride_charge;
            $rideApps->waiting_charge = $request->waiting_charge;
            $rideApps->per_km = $request->per_km;
            $rideApps->status = $request->status;
            $rideApps->logo = isset($request->logo)? $image : $rideApps->logo;

            $rideApps->save();
         return redirect()->route('ride-apps.index')->with('success', 'Ride apps updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RideApps  $rideApps
     * @return \Illuminate\Http\Response
     */
    public function destroy(RideApps $rideApps,$id)
    {
        $rideApps = RideApps::where('id',$id)->first();

        $rideApps->delete();
         return redirect()->route('ride-apps.index')->with('success', 'Ride apps delete successfully');
    }
}
