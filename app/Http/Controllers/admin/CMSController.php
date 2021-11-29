<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LatestNews;
use App\CmsPage;
use Image;

class CMSController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $targets = CmsPage::latest()->paginate(5);
        return view('backEnd.cms.index', compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
//        echo "<pre>";print_r('hello');exit;
        return view('backEnd.cms.create');
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
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $target = new CmsPage;
        $target->title = $request->title;
        $target->description = $request->description;
        $target->link = urlencode($request->slug);
        $target->meta_title = !empty($request->meta_title)?$request->meta_title :'';
        $target->meta_description = !empty($request->meta_description)?$request->meta_description :'';
        $target->status = $request->status;
        if ($target->save()) {
            return redirect()->route('cms-page.index')->with('success', 'CMS page added successfully');
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
        $target = CmsPage::where('id', $request->id)->first();
        return view('backEnd.cms.edit', compact('target'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $target = CmsPage::where('id', $request->id)->first();
        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $target->title = $request->title;
        $target->description = $request->description;
        $target->link = urlencode($request->slug);
        $target->meta_title = !empty($request->meta_title)?$request->meta_title :'';
        $target->meta_description = !empty($request->meta_description)?$request->meta_description :'';
        $target->status = $request->status;
        $target->save();
        return redirect()->route('cms-page.index')->with('success', 'CMS page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request) {
//        echo "<pre>";print_r($request->id);exit;
        $cms = CmsPage::where('id', $request->id)->first();
        if ($cms->delete()) {
            return redirect()->route('cms-page.index')->with('success', 'Cms page deleted successfully');
        }
    }

}
