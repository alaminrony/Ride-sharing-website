<?php

namespace App\Http\Controllers\admin;

use App\ContactUs;
use App\HelpAndSupport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $targets = HelpAndSupport::latest()->paginate(10);
        return view('backEnd.contactUs.index',compact('targets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactView(Request $request)
    {
        $target = HelpAndSupport::where('id',$request->id)->first();
        $view = view('backEnd.contactUs.view')->with(compact('target'))->render();
        return response()->json(['data'=>$view]);
    }

  
    public function destroy(ContactUs $contactUs,$id)
    {
        $contactUs = HelpAndSupport::where('id',$id)->first();
        $contactUs->delete();
        return redirect()->route('contact.index')
                        ->with('success','Contact details deleted successfully');
    }
}
