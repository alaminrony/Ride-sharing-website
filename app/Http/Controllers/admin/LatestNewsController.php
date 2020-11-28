<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LatestNews;
use Image;

class LatestNewsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $latestNews = LatestNews::latest()->paginate(5);
        return view('backEnd.latestNews.index', compact('latestNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//        echo "<pre>";print_r('hello');exit;
        return view('backEnd.latestNews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'details_image' => 'required|image|mimes:jpeg,png,jpg',
            'status' => 'required',
            'key_words' => 'required',
        ]);



        $news = new LatestNews;
        $news->title = $request->title;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->created_by =auth()->user()->id;
        $news->key_words =$request->key_words;
        if ($files = $request->file('image')) {
            $imagePath = 'uploads/latestNews/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(500, 500, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $news->image = $imageName;
        }
        if ($files = $request->file('details_image')) {
            $imagePath = 'uploads/latestNews/details/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(725, 325)->save($imageName);
            $news->details_image = $imageName;
        }
        
        if ($news->save()) {
            return redirect('admin/latest-news')->with('success', 'Latest news added successfully');
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
        $latestNews = LatestNews::where('id', $request->id)->first();
        return view('backEnd.latestNews.edit', compact('latestNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $latestNews = LatestNews::where('id', $request->id)->first();
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
            'key_words' => 'required',
        ]);
        if (isset($request->image)) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
        }

        $latestNews->title = $request->title;
        $latestNews->description = $request->description;
        $latestNews->status = $request->status;
        $latestNews->created_by =auth()->user()->id;
        $latestNews->key_words =$request->key_words;
        if ($files = $request->file('image')) {
            if (file_exists($latestNews->image)) {
                @unlink($latestNews->image);
            }
            $imagePath = 'uploads/latestNews/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(500, 500, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $latestNews->image = $imageName;
        }
        if ($files = $request->file('details_image')) {
            if (file_exists($latestNews->details_image)) {
                @unlink($latestNews->details_image);
            }
            $imagePath = 'uploads/latestNews/details/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(725, 325)->save($imageName);
            $latestNews->details_image = $imageName;
        }

        $latestNews->save();
        return redirect()->route('latest-news.index')->with('success', 'Latest news updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $latestNews = LatestNews::where('id', $request->id)->first();
        if ($latestNews->delete()) {
            if (file_exists($latestNews->image)) {
                @unlink($latestNews->image);
            }
            if (file_exists($latestNews->details_image)) {
                @unlink($latestNews->details_image);
            }
            return redirect()->route('latest-news.index')->with('success', 'Latest news deleteed successfully');
        }
    }

}
