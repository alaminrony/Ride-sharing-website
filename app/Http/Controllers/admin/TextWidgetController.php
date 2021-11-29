<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LatestNews;
use App\CmsPage;
use App\TextWidget;
use Image;

class TextWidgetController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $targets = TextWidget::latest()->paginate(5);
        $sectionArr = ['1' => 'Home (About faretrim)', '2' => 'Driver page (Driver guidelines)'];
        return view('backEnd.textWidget.index', compact('targets', 'sectionArr'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//        echo "<pre>";print_r('hello');exit;
        $sectionArr = ['1' => 'Home (About faretrim)', '2' => 'Driver page (Driver guidelines)'];
        return view('backEnd.textWidget.create')->with(compact('sectionArr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $target = new TextWidget;
        $target->title = $request->title;
        $target->description = $request->description;
        $target->content_link = !empty($request->content_link) ? urlencode($request->content_link) : '';

        if ($files = $request->file('image')) {
            $imagePath = 'uploads/textWidget/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate()->save($imageName);
            $target->image = $imageName;
        }

        $target->position = $request->position;
        $target->status = $request->status;
        if ($target->save()) {
            return redirect()->route('text-widget.index')->with('success', 'Text widget  added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request) {
        $sectionArr = ['1' => 'Home (About faretrim)', '2' => 'Driver page (Driver guidelines)'];
        $target = TextWidget::where('id', $request->id)->first();
        return view('backEnd.textWidget.edit', compact('target', 'sectionArr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        // echo "<pre>";print_r($request->all());exit;
        $target = TextWidget::where('id', $request->id)->first();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'position' => 'required',
            'status' => 'required',
        ]);

        $target->title = $request->title;
        $target->description = $request->description;
        $target->content_link = !empty($request->content_link) ? urlencode($request->content_link) : '';

        if ($files = $request->file('image')) {
            $imagePath = 'uploads/textWidget/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate()->save($imageName);
            $target->image = $imageName;
        }

        $target->position = $request->position;
        $target->status = $request->status;
        $target->save();
        return redirect()->route('text-widget.index')->with('success', 'Text widget updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $target = TextWidget::where('id', $request->id)->first();
        if ($target->delete()) {
            return redirect()->route('text-widget.index')->with('success', 'Text widget deleted successfully');
        }
    }

}
