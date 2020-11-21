<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use App\NewsCategory;
use Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where('trash_status',0)
        ->latest()->paginate(5);
        return view('backEnd.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = NewsCategory::all()->pluck('title','id');
        return view('backEnd.news.create',compact('categories'));
        
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
            'newscategory_id' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

         if (isset($request->image)) {
            $path = "uploads/news/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

        $news = new News;
        $news->title = $request->title;
        $news->newscategory_id = $request->newscategory_id;
        $news->short_description = $request->description;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->created_by = Auth::user()->id;
        $news->updated_by = Auth::user()->id;
        $news->trash_status = 0;
        $news->newslike = 0;
        $news->comment = 0;
        $news->image = isset($request->image)? $image:null;

         $news->save();
         return redirect()->route('news.index')->with('success', 'News added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $categories = NewsCategory::all()->pluck('title','id');
        return view('backEnd.news.edit',compact('categories','news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
       $request->validate([
            'title' => 'required',
            'newscategory_id' => 'required',
            'status' => 'required',
        ]);

         if (isset($request->image)) {

            $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
            if (file_exists($news->image)) {
                @unlink($news->image);    
            }
            $path = "uploads/news/";
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move($path, $imageName);
            $image = $path.$imageName;
        }

        
        $news->title = $request->title;
        $news->newscategory_id = $request->newscategory_id;
        $news->short_description = $request->description;
        $news->description = $request->description;
        $news->status = $request->status;
        $news->created_by = Auth::user()->id;
        $news->updated_by = Auth::user()->id;
        // $news->trash_status = 0;
        // $news->newslike = 0;
        // $news->comment = 0;
        $news->image = isset($request->image)? $image:$news->image;

         $news->save();
         return redirect()->route('news.index')->with('success', 'News updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if (file_exists($news->image)) {
                @unlink($news->image);    
            }
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
    public function trash(News $news,$id){

        $news = News::find($id)->first();
        if ($news->trash_status == 0) {
             $news->trash_status = 1;
        if ($news->save()) {
           return redirect()->route('news.index')
                        ->with('success','News has been moved to trash');
        }    
        }else{
            $news->trash_status = 0;
        if ($news->save()) {
           return redirect()->route('news.index')
                        ->with('success','News restore successfully');
        } 
        }
           
    }
    public function trashlist()
    {
        $news = News::where('trash_status', 1)
                    ->latest()->paginate(5);
        return view('backEnd.news.trashlist',compact('news')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
