<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PassengerSlider;
use Image;

class PassengerSliderController extends Controller {

    public function index() {
//        echo "<pre>";print_r('hello');exit;
        $passengerSlider = PassengerSlider::orderBy('id','desc')->paginate(5);
        return view('backEnd.passengerSlider.index', compact('passengerSlider'));
    }

    public function create() {
        return view('backEnd.passengerSlider.create');
    }

    public function store(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ]);

        $slider = new PassengerSlider;
        $slider->status = $request->status;
        if ($files = $request->file('image')) {
            $imagePath = 'uploads/passengerSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490)->save($imageName);
            $slider->image = $imageName;
        }

        if ($slider->save()) {
            return redirect('admin/rider-slider')->with('success', 'Rider slider added successfully');
        }
    }

    public function edit(Request $request) {
        $passengerSlider = PassengerSlider::where('id', $request->id)->first();
        return view('backEnd.passengerSlider.edit', compact('passengerSlider'));
    }

    public function update(Request $request) {
        $passengerSlider = PassengerSlider::where('id', $request->id)->first();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg',
            ]);
        }


        $passengerSlider->status = $request->status;
        if ($files = $request->file('image')) {
            if (file_exists($passengerSlider->image)) {
                @unlink($passengerSlider->image);
            }
            $imagePath = 'uploads/passengerSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490)->save($imageName);
            $passengerSlider->image = $imageName;
        }

        $passengerSlider->save();
        return redirect()->route('rider-slider.index')->with('success', 'Rider slider updated successfully');
    }

    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $passengerSlider = PassengerSlider::where('id', $request->id)->first();
        if ($passengerSlider->delete()) {
            if (file_exists($passengerSlider->image)) {
                @unlink($passengerSlider->image);
            }
            return redirect()->route('rider-slider.index')->with('success', 'Rider slider deleteed successfully');
        }
    }

}
