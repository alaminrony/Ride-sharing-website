<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurService;

class OurServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ouservices = OurService::latest()->paginate(5);
        return view('backEnd.ourService.index',compact('ouservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.ourService.create');
        
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);
          if (isset($request->image)) {
            $path = "uploads/service/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

         $ouservice = new OurService;
         $ouservice->title = $request->title;
         $ouservice->description = $request->description;
         $ouservice->status = $request->status;
         $ouservice->image = isset($request->image)? $image : null;

         $ouservice->save();
         return redirect()->route('our-services.index')->with('success', 'service added success fully');
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
        $ouservice = OurService::where('id',$id)->first();
        
        return view('backEnd.ourService.edit',compact('ouservice'));
        
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
        $ouservice = OurService::where('id',$id)->first();

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if (file_exists($ouservice->image)) {
                @unlink($ouservice->image);    
            }
            $path = "uploads/service/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

        $ouservice->title = $request->title;
        $ouservice->description = $request->description;
        $ouservice->status = $request->status;
        $ouservice->image = isset($request->image)? $image : $ouservice->image;

         $ouservice->save();
         return redirect()->route('our-services.index')->with('success', 'service updated success fully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ouservice = OurService::where('id',$id)->first();
         $ouservice->delete();
         return redirect()->route('our-services.index')->with('success', 'service delete success fully');

    }
}
