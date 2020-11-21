<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillChargeOptionValue;
use DataTables;
use Auth;
use App\BillChargeOption;
use Validator;
class BillChargeOptionValueController extends Controller
{
    public function index(Request $request)
    {
        $options =BillChargeOption::all()->pluck('bill_charge_title','id');

        $options_value = BillChargeOptionValue::latest()->paginate(5);
       
        return view('backEnd.billvalue.index',compact('options','options_value'));
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'billchargeoption_id' => 'required',
            'option_value_name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {    
            // return response()->json($validator->messages(), 200);
             return redirect()->route('bill-options-value.index')->with(
           
            ['errors'=>$validator->getMessageBag()]);
        }

        $optionvalue = new BillChargeOptionValue;
        $optionvalue->billchargeoption_id = $request->billchargeoption_id;
        $optionvalue->option_value_name = $request->option_value_name;
        $optionvalue->option_value_status    = $request->status;
        $optionvalue->created_by = Auth::user()->id;
        $optionvalue->updated_by = Auth::user()->id;

        $optionvalue->save();
        return redirect()->route('bill-options-value.index')->with('success',' Bill charge option value saved successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // print_r($id);
        // exit;
        $options =BillChargeOption::all()->pluck('bill_charge_title','id');

        $chargeoptionvalue = BillChargeOptionValue::find($id);
        return view('backEnd.billvalue.modal',compact('chargeoptionvalue','options'));
        // return response()->json($chargeoptionvalue);
    }
    public function update(Request $request,BillChargeOptionValue $chargeoptionvalue){

        
        $validator = Validator::make($request->all(), [
            'billchargeoption_id' => 'required',
            'option_value_name' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {    
            // return response()->json($validator->messages(), 200);
             return redirect()->route('bill-options-value.index')->with(
           
            ['errors'=>$validator->getMessageBag()]);
        }

        $optionvalue = BillChargeOptionValue::where('id',$request->id)->first();
        $optionvalue->billchargeoption_id = $request->billchargeoption_id;
        $optionvalue->option_value_name = $request->option_value_name;
        $optionvalue->option_value_status    = $request->status;
        // $optionvalue->created_by = Auth::user()->id;
        $optionvalue->updated_by = Auth::user()->id;

        $optionvalue->save();
        return redirect()->route('bill-options-value.index')->with('success',' Bill charge option value updated successfully.');

    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $chargeoptionvalue = BillChargeOptionValue::where('id',$id)->first();

        $chargeoptionvalue->delete();
     
        return redirect()->route('bill-options-value.index')->with('success','Option value deleted successfully.');
    }
}
