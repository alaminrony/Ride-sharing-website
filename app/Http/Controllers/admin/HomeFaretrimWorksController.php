<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSlider;
use Image;

class HomeFaretrimWorksController extends Controller {

    public function index() {
//        echo "<pre>";print_r('hello');exit;
        $homeSlider = HomeSlider::orderBy('id','desc')->paginate(5);
        return view('backEnd.homeSlider.index', compact('homeSlider'));
    }

    public function create() {
        return view('backEnd.homeSlider.create');
    }

    public function store(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required',
        ]);

        $slider = new HomeSlider;
        $slider->status = $request->status;
        if ($files = $request->file('image')) {
            $imagePath = 'uploads/homeSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $slider->image = $imageName;
        }

        if ($slider->save()) {
            return redirect('admin/home-slider')->with('success', 'Home slider added successfully');
        }
    }

    public function edit(Request $request) {
        $homeSlider = HomeSlider::where('id', $request->id)->first();
        return view('backEnd.homeSlider.edit', compact('homeSlider'));
    }

    public function update(Request $request) {
        $homeSlider = HomeSlider::where('id', $request->id)->first();
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }


        $homeSlider->status = $request->status;
        if ($files = $request->file('image')) {
            if (file_exists($homeSlider->image)) {
                @unlink($homeSlider->image);
            }
            $imagePath = 'uploads/homeSlider/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(280, 490, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $homeSlider->image = $imageName;
        }

        $homeSlider->save();
        return redirect()->route('home-slider.index')->with('success', 'Home slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $homeSlider = HomeSlider::where('id', $request->id)->first();
        if ($homeSlider->delete()) {
            if (file_exists($homeSlider->image)) {
                @unlink($homeSlider->image);
            }
            return redirect()->route('home-slider.index')->with('success', 'Home slider deleteed successfully');
        }
    }

}
