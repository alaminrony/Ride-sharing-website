<?php

namespace App\Http\Controllers\admin;

use App\BillSettingsLog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BillSettingsLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_settings_log = BillSettingsLog::latest()->paginate(10);
        return view('backEnd.billSettingslog.index',compact('bill_settings_log'));
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
     * @param  \App\BillSettingsLog  $billSettingsLog
     * @return \Illuminate\Http\Response
     */
    public function show(BillSettingsLog $billSettingsLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillSettingsLog  $billSettingsLog
     * @return \Illuminate\Http\Response
     */
    public function edit(BillSettingsLog $billSettingsLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillSettingsLog  $billSettingsLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillSettingsLog $billSettingsLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillSettingsLog  $billSettingsLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $log = BillSettingsLog::where('id',$id)->first();
        $log->delete();
        return redirect()->route('bill-settings-log.index')->with('success','Bill settings log deleted successfully');

    }
}
