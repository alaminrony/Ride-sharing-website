<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DriverSlider;
use Image;

class DriverSliderController extends Controller {

    public function index() {
//        echo "<pre>";print_r('hello');exit;
        $driverSlider = DriverSlider::orderBy('id','desc')->paginate(5);
        return view('backEnd.driverSlider.index', compact('driverSlider'));
    }

    public function create() {
        return view('backEnd.driverSlider.create');
    }

    public function store(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ]);

        $slider = new DriverSlider;
        $slider->status = $request->status;
        if ($files = $request->file('image')) {
            $imagePath = 'uploads/driverSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $slider->image = $imageName;
        }

        if ($slider->save()) {
            return redirect('admin/driver-slider')->with('success', 'Driver slider added successfully');
        }
    }

    public function edit(Request $request) {
        $driverSlider = DriverSlider::where('id', $request->id)->first();
        return view('backEnd.driverSlider.edit', compact('driverSlider'));
    }

    public function update(Request $request) {
        $driverSlider = DriverSlider::where('id', $request->id)->first();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
        }


        $driverSlider->status = $request->status;
        if ($files = $request->file('image')) {
            if (file_exists($driverSlider->image)) {
                @unlink($driverSlider->image);
            }
            $imagePath = 'uploads/driverSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $driverSlider->image = $imageName;
        }

        $driverSlider->save();
        return redirect()->route('driver-slider.index')->with('success', 'Driver slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $driverSlider = DriverSlider::where('id', $request->id)->first();
        if ($driverSlider->delete()) {
            if (file_exists($driverSlider->image)) {
                @unlink($driverSlider->image);
            }
            return redirect()->route('driver-slider.index')->with('success', 'Driver slider deleteed successfully');
        }
    }
}
