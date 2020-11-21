<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $newsCategories = NewsCategory::latest()->paginate(5);
        return view('backEnd.newsCategory.index',compact('newsCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.newsCategory.create');
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
        ]);
        
         $newsCategory = new NewsCategory;
         $newsCategory->title = $request->title;
         $newsCategory->description = $request->description;

         $newsCategory->save();
         return redirect()->route('news-category.index')->with('success', 'News category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        return view('backEnd.newsCategory.edit',compact('newsCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        
         $newsCategory->title = $request->title;
         $newsCategory->description = $request->description;

         $newsCategory->save();
         return redirect()->route('news-category.index')->with('success', 'News category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsCategory $newsCategory)
    {
        $newsCategory->delete();
         return redirect()->route('news-category.index')->with('success', 'News Category deleted successfully');
    }
}
