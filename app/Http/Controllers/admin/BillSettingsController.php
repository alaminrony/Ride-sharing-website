<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillSettings;
use App\BillChargeOptionValue;
use App\BillChargeOption;
use App\Country;
use App\BillSettingsLog;
use DataTables;
use Auth;
use Validator;
class BillSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_settings = BillSettings::latest()->paginate(10);
        return view('backEnd.billSettings.index',compact('bill_settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $billcharge_option = BillChargeOption::all()->pluck('bill_charge_title','id');
        $billcharge_option_value = BillChargeOptionValue::all()->pluck('option_value_name','id');
        $countries = Country::all()->pluck('country_name','id');
        return view('backEnd.billSettings.create',compact('billcharge_option','billcharge_option_value','countries'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'billchargeoption_id' => 'required',
            'billchargeoptionvalue_id' => 'required',
            'charge_value' => 'required',
            'bill_days' => 'required',
            'tryal_period' => 'required',
            'ride_request_cancel_time' => 'required',
            'driver_fine_over_time' => 'required',
            'driver_fine_amount' => 'required',
            'passenger_fine_over_time'=> 'required',
            'passenger_fine_amount' => 'required',
            
        ]);
       
        $bill_settings = new BillSettings;

        $bill_settings->country_id = $request->country_id;
        $bill_settings->billchargeoption_id = $request->billchargeoption_id;
        $bill_settings->billchargeoptionvalue_id = $request->billchargeoptionvalue_id;
        $bill_settings->charge_value = $request->charge_value;
        $bill_settings->bill_days = $request->bill_days;
        $bill_settings->tryal_period = $request->tryal_period;
        $bill_settings->ride_request_cancel_time = $request->ride_request_cancel_time;
        $bill_settings->driver_fine_over_time = $request->driver_fine_over_time;
        $bill_settings->driver_fine_amount = $request->driver_fine_amount;
        $bill_settings->passenger_fine_over_time = $request->passenger_fine_over_time;
        $bill_settings->passenger_fine_amount = $request->passenger_fine_amount;
        $bill_settings->created_by = Auth::user()->id;
        $bill_settings->updated_by = Auth::user()->id;

        if($bill_settings->save()){
 // echo "<pre>";
 //        print_r($request->all());
 //        exit;
            // bill setting log
             $bill_settings_log = new BillSettingsLog;

        $bill_settings_log->country_id = $request->country_id;
        $bill_settings_log->billchargeoption_id = $request->billchargeoption_id;
        $bill_settings_log->billchargeoptionvalue_id = $request->billchargeoptionvalue_id;
        $bill_settings_log->charge_value = $request->charge_value;
        $bill_settings_log->bill_days = $request->bill_days;
        $bill_settings_log->tryal_period = $request->tryal_period;
        $bill_settings_log->ride_request_cancel_time = $request->ride_request_cancel_time;
        $bill_settings_log->driver_fine_over_time = $request->driver_fine_over_time;
        $bill_settings_log->driver_fine_amount = $request->driver_fine_amount;
        $bill_settings_log->passenger_fine_over_time = $request->passenger_fine_over_time;
        $bill_settings_log->passenger_fine_amount = $request->passenger_fine_amount;
        $bill_settings_log->created_by = Auth::user()->id;
        $bill_settings_log->updated_by = Auth::user()->id;

        $bill_settings_log->save();
        }
        return redirect()->route('bill-settings.index')
                        ->with('success','Bill settings created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill_settings = BillSettings::where('id',$id)->first();
        // print_r($bill_settings);
        // exit;
        $billcharge_option = BillChargeOption::all()->pluck('bill_charge_title','id');
        $billcharge_option_value = BillChargeOptionValue::where('billchargeoption_id',$bill_settings->billchargeoption_id)->pluck('option_value_name','id');
        $countries = Country::all()->pluck('country_name','id');
        return view('backEnd.billSettings.edit',compact('billcharge_option','billcharge_option_value','countries','bill_settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // print_r($id);
        // exit;
         $request->validate([
            'country_id' => 'required',
            'billchargeoption_id' => 'required',
            'billchargeoptionvalue_id' => 'required',
            'charge_value' => 'required',
            'bill_days' => 'required',
            'tryal_period' => 'required',
            'ride_request_cancel_time' => 'required',
            'driver_fine_over_time' => 'required',
            'driver_fine_amount' => 'required',
            'passenger_fine_over_time'=> 'required',
            'passenger_fine_amount' => 'required',
            
        ]);
         $bill_settings = BillSettings::where('id',$id)->first();

        // $bill_settings = new BillSettings;
// print_r($request->all());
// exit;

        $bill_settings->country_id = $request->country_id;
        $bill_settings->billchargeoption_id = $request->billchargeoption_id;
        $bill_settings->billchargeoptionvalue_id = $request->billchargeoptionvalue_id;
        $bill_settings->charge_value = $request->charge_value;
        $bill_settings->bill_days = $request->bill_days;
        $bill_settings->tryal_period = $request->tryal_period;
        $bill_settings->ride_request_cancel_time = $request->ride_request_cancel_time;
        $bill_settings->driver_fine_over_time = $request->driver_fine_over_time;
        $bill_settings->driver_fine_amount = $request->driver_fine_amount;
        $bill_settings->passenger_fine_over_time = $request->passenger_fine_over_time;
        $bill_settings->passenger_fine_amount = $request->passenger_fine_amount;
        // $bill_settings->created_by = Auth::user()->id;
        $bill_settings->updated_by = Auth::user()->id;

        if($bill_settings->save()){
            // bill settings log
             $bill_settings_log = new BillSettingsLog;

        $bill_settings_log->country_id = $request->country_id;
        $bill_settings_log->billchargeoption_id = $request->billchargeoption_id;
        $bill_settings_log->billchargeoptionvalue_id = $request->billchargeoptionvalue_id;
        $bill_settings_log->charge_value = $request->charge_value;
        $bill_settings_log->bill_days = $request->bill_days;
        $bill_settings_log->tryal_period = $request->tryal_period;
        $bill_settings_log->ride_request_cancel_time = $request->ride_request_cancel_time;
        $bill_settings_log->driver_fine_over_time = $request->driver_fine_over_time;
        $bill_settings_log->driver_fine_amount = $request->driver_fine_amount;
        $bill_settings_log->passenger_fine_over_time = $request->passenger_fine_over_time;
        $bill_settings_log->passenger_fine_amount = $request->passenger_fine_amount;
        $bill_settings_log->created_by = Auth::user()->id;
        $bill_settings_log->updated_by = Auth::user()->id;

        $bill_settings_log->save();
        }
        return redirect()->route('bill-settings.index')
                        ->with('success','Bill settings updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $bill_settings = BillSettings::where('id',$id)->first();
        $bill_settings->delete();
         return redirect()->route('bill-settings.index')
                        ->with('success','Bill settings deleted successfully');
    }
    public function option(Request $request){
        $option_id = $request->option_id;

        $billcharge_option_value = BillChargeOptionValue::
                 where('billchargeoption_id',$option_id)
              ->pluck('option_value_name','id');
        // print_r($billcharge_option_value);

 return view('backEnd.billSettings.optionvalue',compact('billcharge_option_value'))->render();
           
    }
}
