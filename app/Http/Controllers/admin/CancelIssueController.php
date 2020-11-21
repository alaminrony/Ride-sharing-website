<?php

namespace App\Http\Controllers\admin;

use App\CancelIssue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancelIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cancelissues = CancelIssue::latest()->paginate(10);
        return view('backEnd.cancelissue.index',compact('cancelissues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.cancelissue.create');
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
            'app_id' => 'required',
            /*'scene_name' => 'required',*/
            'cancel_issue_type' => 'required',
        ]);

        $cancelissue = new CancelIssue;
        $cancelissue->app_id = $request->app_id;
        // $cancelissue->scene_name = $request->scene_name;
        $cancelissue->cancel_issue_type = $request->cancel_issue_type;
        $cancelissue->save();
        return redirect()->route('cancel-issue.index')
                    ->with('success','Issue added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function show(CancelIssue $cancelIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function edit(CancelIssue $cancelIssue)
    {
        return view('backEnd.cancelissue.edit',compact('cancelIssue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CancelIssue $cancelIssue)
    {
        $request->validate([
            'app_id' => 'required',
            // 'scene_name' => 'required',
            'cancel_issue_type' => 'required',
        ]);

        $cancelIssue->app_id = $request->app_id;
        // $cancelIssue->scene_name = $request->scene_name;
        $cancelIssue->cancel_issue_type = $request->cancel_issue_type;
        $cancelIssue->save();
        return redirect()->route('cancel-issue.index')
                    ->with('success','Issue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CancelIssue  $cancelIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy(CancelIssue $cancelIssue)
    {
        $cancelIssue->delete();
        return redirect()->route('cancel-issue.index')
                    ->with('success','Issue deleted successfully');
    }
}
