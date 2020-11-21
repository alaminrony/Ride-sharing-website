<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CabType;
use Auth;

class CabTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $cabtypes = CabType::latest()->paginate(5);
        return view('backEnd.cabBody.index',compact('cabtypes')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.cabBody.create');
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
            'type_name' => 'required|string',
        ]);

         $cabtype = new CabType;
         $cabtype->type_name = $request->type_name;
         $cabtype->description = $request->description;
         $cabtype->created_by = Auth::user()->id;
         $cabtype->save();

         return redirect()->route('cab-body-type.index')->with('success','Body Type Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cabtype = CabType::where('id',$id)->first();
        return view('backEnd.cabBody.modal',compact('cabtype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CabType $cabtype,$id)
    {
        $cabtype = CabType::where('id',$id)->first();
        
        return view('backEnd.cabBody.edit',compact('cabtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CabType $cabtype,Request $request, $id)
    {
         $request->validate([
            'type_name' => 'required|string',
        ]);

         $cabtype =  CabType::where('id',$id)->first();
         $cabtype->type_name = $request->type_name;
         $cabtype->description = $request->description;
         // $cabtype->created_by = Auth::user()->id;
         $cabtype->save();

         return redirect()->route('cab-body-type.index')->with('success','Body Type Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabtype =  CabType::where('id',$id)->first();
        $cabtype->delete();
        return redirect()->route('cab-body-type.index')->with('success','Body Type Deleted Successfully');
    }
}
