<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BillChargeOption;
use Auth;
use Validator;

class BillChargeOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $options = BillChargeOption::latest()->paginate(5);
        return view('backEnd.billOption.index',compact('options')) 
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
         $validator = Validator::make($request->all(), [
            'bill_charge_title' => 'required',
        ]);

        if ($validator->fails()) {    
            // return response()->json($validator->messages(), 200);
             return response()->json(
           
            $validator->getMessageBag());
        }

        $option = new BillChargeOption;
        $option->bill_charge_title = $request->bill_charge_title;
        $option->created_by = Auth::user()->id;
        $option->updated_by = Auth::user()->id;

        if ($option->save()) {
            return response()->json([
                'res' => 'Bill charge option added successfully'
            ]);

        }
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
    public function edit(Request $request)
    {
        $id =  $request->id;
        $option = BillChargeOption::where('id', $id)->first();
         return response()->json(
               $option
            );

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
         $validator = Validator::make($request->all(), [
            'bill_charge_title' => 'required',
        ]);

        if ($validator->fails()) {    
            // return response()->json($validator->messages(), 200);
             return response()->json(
           
            $validator->getMessageBag());
        }

        $id =  $request->id;
        $option = BillChargeOption::where('id', $id)->first();
         $option->bill_charge_title = $request->bill_charge_title;
        // $option->created_by = Auth::user()->id;
        $option->updated_by = Auth::user()->id;

        if ($option->save()) {
            return response()->json([
                'res' => 'Bill charge option updated successfully'
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = BillChargeOption::where('id', $id)->first();
        $option->delete();
        return redirect()->route('bill-options.index')
                    ->with('success','Bill Charge option deleted successfully');
    }
}
