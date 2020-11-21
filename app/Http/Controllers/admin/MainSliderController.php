<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\MainSlider;
use Illuminate\Http\Request;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = MainSlider::latest()->paginate(5);
        return view('backEnd.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.slider.create');
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
        ]);
          if (isset($request->image)) {
            $path = "uploads/slider/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

         $slider = new MainSlider;
         $slider->title = $request->title;
         $slider->description = $request->description;
         // $slider->status = $request->status;
         $slider->image = isset($request->image)? $image : null;

         $slider->save();
         return redirect()->route('slider.index')->with('success', 'Slider added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function show(MainSlider $mainSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(MainSlider $slider)
    {
        return view('backEnd.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainSlider $slider)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if (file_exists($slider->image)) {
                @unlink($slider->image);    
            }
            $path = "uploads/slider/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->image = isset($request->image)? $image : $slider->image;

         $slider->save();
         return redirect()->route('slider.index')->with('success', 'Slider updated success fully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainSlider $slider)
    {
         $slider->delete();
         return redirect()->route('slider.index')->with('success', 'Slider delete successfully');
    }
}
