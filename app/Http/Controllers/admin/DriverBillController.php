<?php

namespace App\Http\Controllers\admin;

use App\DriverBill;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Driver;
use DB;

class DriverBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $drivers = Driver::where('active',1)->where('trash_status',0)->pluck('full_name','id')->toArray();
        $driverBills = DriverBill::join('drivers','drivers.id','=','driver_bills.driver_id')
                ->join('bill_charge_options','bill_charge_options.id','=','driver_bills.billchargeoption_id')
                ->join('bill_charge_option_values','bill_charge_option_values.id','=','driver_bills.billchargeoptionvalue_id')
                ->select('driver_bills.id','driver_bills.transaction_id','drivers.full_name','driver_bills.start_date','driver_bills.end_date'
                        ,'driver_bills.amount','bill_charge_options.bill_charge_title','bill_charge_option_values.option_value_name','driver_bills.payment_status')
                ->paginate(10);
//        echo "<pre>";print_r($driverBills->toArray());exit;
        return view('backEnd.driver.driverbill',compact('driverBills','drivers'));
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
     * @param  \App\DriverBill  $driverBill
     * @return \Illuminate\Http\Response
     */
    public function show(DriverBill $driverBill)
    {
        $driverBill = DriverBill::join('drivers','drivers.id','=','driver_bills.driver_id')
                ->join('bill_charge_options','bill_charge_options.id','=','driver_bills.billchargeoption_id')
                ->join('bill_charge_option_values','bill_charge_option_values.id','=','driver_bills.billchargeoptionvalue_id')
                ->select('driver_bills.id','driver_bills.transaction_id','drivers.full_name','driver_bills.start_date','driver_bills.end_date'
                        ,'driver_bills.amount','bill_charge_options.bill_charge_title','bill_charge_option_values.option_value_name','driver_bills.payment_status')
                ->where('driver_bills.id',$driverBill->id)
                ->first();
//        echo "<pre>";print_r($driverBill->toArray());exit;
        return view('backEnd.driver.billmodal',compact('driverBill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DriverBill  $driverBill
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverBill $driverBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DriverBill  $driverBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DriverBill $driverBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DriverBill  $driverBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverBill $driverBill)
    {
        //
    }
    public function search(Request $request)
    {
        $driver_id = $request->driver_id;
        // echo "<pre>";
        // print_r($request->all());
        // exit;
         $drivers = Driver::where('active',1)->where('trash_status',0)->pluck('full_name','id')->toArray();
        $driverBills = DriverBill::join('drivers','drivers.id','=','driver_bills.driver_id')
                ->join('bill_charge_options','bill_charge_options.id','=','driver_bills.billchargeoption_id')
                ->join('bill_charge_option_values','bill_charge_option_values.id','=','driver_bills.billchargeoptionvalue_id')
                ->select('driver_bills.id','driver_bills.transaction_id','drivers.full_name','driver_bills.start_date','driver_bills.end_date'
                        ,'driver_bills.amount','bill_charge_options.bill_charge_title','bill_charge_option_values.option_value_name','driver_bills.payment_status')
                ->where('driver_bills.driver_id',$driver_id)
                ->paginate(5);

        return view('backEnd.driver.driverbill',compact('driverBills','drivers'));
    }
}
