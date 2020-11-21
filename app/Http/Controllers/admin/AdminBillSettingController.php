<?php

namespace App\Http\Controllers\admin;

use Validator;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Auth;
use App\AdminBillSetting;
use DB;

class AdminBillSettingController extends Controller {

    public function index() {
        $allFares = AdminBillSetting::orderBy('id', 'desc')->paginate(10);
//        echo "<pre>";print_r($allFare->toArray());exit;
        return view('backEnd.adminBillSetting.index')->with(compact('allFares'));
    }

    public function create() {

        return view('backEnd.adminBillSetting.create');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
                    'competitor_name' => 'required',
                    'base_fare' => 'required|numeric',
                    'cost_per_minutes' => 'required|numeric',
                    'cost_per_kilometer' => 'required|numeric',
                    'booking_fee' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('fare-setting/create')
                            ->withInput()
                            ->withErrors($validator);
        }

        $fareSetting = new AdminBillSetting;
        $fareSetting->competitor_name = $request->competitor_name;
        $fareSetting->base_fare = $request->base_fare;
        $fareSetting->cost_per_minutes = $request->cost_per_minutes;
        $fareSetting->cost_per_kilometer = $request->cost_per_kilometer;
        $fareSetting->booking_fee = $request->booking_fee;
        if ($fareSetting->save()) {
            return redirect('fare-setting')->with('success', __('lang.FARE_ADD_SUCCESSFULLY'));
        }
    }

    public function edit(Request $request) {
        $fare = AdminBillSetting::findOrFail($request->id);
        return view('backEnd.adminBillSetting.edit', compact('fare'));
    }

    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
                    'competitor_name' => 'required',
                    'base_fare' => 'required|numeric',
                    'cost_per_minutes' => 'required|numeric',
                    'cost_per_kilometer' => 'required|numeric',
                    'booking_fee' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('fare-setting/edit')
                            ->withInput()
                            ->withErrors($validator);
        }
        $fare = AdminBillSetting::findOrFail($request->id);
        $fare->competitor_name = $request->competitor_name;
        $fare->base_fare = $request->base_fare;
        $fare->cost_per_minutes = $request->cost_per_minutes;
        $fare->cost_per_kilometer = $request->cost_per_kilometer;
        $fare->booking_fee = $request->booking_fee;
        if ($fare->save()) {
            return redirect('fare-setting')->with('success', __('lang.FARE_UPDATED_SUCCESSFULLY'));
        }
    }

    public function delete(Request $request) {
        $fare = AdminBillSetting::findOrFail($request->id);
        if ($fare->delete()) {
            return redirect('fare-setting')->with('success', __('lang.FARE_DELETED_SUCCESSFULLY'));
        }
    }
    
    public function reduceFare(){
        $reduceFare = DB::table('reduce_fares')->where('id',1)->first();
        return view('backEnd.adminBillSetting.fare-reduce',compact('reduceFare'));
    }
    public function updateReduceFare(Request $request){
        $validator = Validator::make($request->all(), [
                    'reduce_fare_percentage' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect('fare-setting/reduceFare')
                            ->withInput()
                            ->withErrors($validator);
        }
        $reduceFare = DB::table('reduce_fares')->where('id',$request->id)->update(['reduce_fare_percentage'=>$request->reduce_fare_percentage]);
        return redirect('fare-setting/reduceFare')->with('success', __('lang.REDUCE_FARE_UPDATED_SUCCESSFULLY'));
        
    }

}
