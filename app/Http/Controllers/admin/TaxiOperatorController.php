<?php

namespace App\Http\Controllers\admin;

use App\CancelIssue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TaxiOperator;

class TaxiOperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxiOperator = TaxiOperator::latest()->paginate(10);
        // echo "<pre>";print_r($taxiOperator->toArray());exit;
        return view('backEnd.taxiOperator.index',compact('taxiOperator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backEnd.taxiOperator.create');
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
            'name' => 'required',
            'status' => 'required',
        ]);

        $taxiOperator = new TaxiOperator;
        $taxiOperator->name = $request->name;
        $taxiOperator->status = $request->status;
        $taxiOperator->save();
        return redirect()->route('taxi-operator.index')
                    ->with('success','Taxi operator added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function show(TaxiOperator $taxiOperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(TaxiOperator $taxiOperator)
    {
        return view('backEnd.taxiOperator.edit',compact('taxiOperator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxiOperator $taxiOperator)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);

       
        $taxiOperator->name = $request->name;
        $taxiOperator->status = $request->status;
        $taxiOperator->save();
        return redirect()->route('taxi-operator.index')
                    ->with('success','Taxi operator updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxiOperator $taxiOperator)
    {
        $taxiOperator->delete();
        return redirect()->route('taxi-operator.index')
                    ->with('success','Taxi operator deleted successfully');
    }
}
