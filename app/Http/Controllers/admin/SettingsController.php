<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::latest('id')->first();
        return view('backEnd.settings.index',compact('settings'));
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
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings,$id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings,$id)
    {
        // print_r($request->all());
        // exit;
         $settings = Settings::where('id',$id)->first();

         $request->validate([
            'site_name' => 'required',
            'dateformat' => 'required',
            'timeformat' => 'required',
            'rows_per_page' => 'required',
            'default_email' => 'required',
        ]);
         if (isset($request->logo)) {
            $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if (file_exists($settings->logo)) {
                @unlink($settings->logo);    
            }
            $path = "uploads/settings/";
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->move($path, $imageName);
            $image = $path.$imageName;
        }
        $settings->site_name = $request->site_name;
        $settings->dateformat = $request->dateformat;
        $settings->timeformat = $request->timeformat;
        $settings->rows_per_page = $request->rows_per_page;
        $settings->default_email = $request->default_email;
        $settings->logo = isset($request->logo)? $image : $settings->logo;

        $settings->save();
        return redirect()->route('settings.index')->with('success','Settings updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
