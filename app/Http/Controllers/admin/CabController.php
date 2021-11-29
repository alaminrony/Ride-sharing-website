<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cab;
use App\CabType;
use App\Driver;
use DB;
use Auth;

class CabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();
        $cabs = Cab::latest()->paginate(10);
        return view('backEnd.cab.index',compact('cabs','drivers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

          $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();

        $cabtypes = CabType::all()->pluck('type_name','id');
        return view('backEnd.cab.create',compact('drivers','cabtypes'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        $request->validate([
            'driver_id' => 'required',
            'cabtype_id' => 'required',
            'number_plate' => 'required',
            'model_number' => 'required',
            'color' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        if (isset($request->photo)) {
            $path = "uploads/cab/";
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move($path, $imageName);
            $image = $path.$imageName;
        }

        $cab = new Cab;
        $cab->driver_id = $request->driver_id;
        $cab->cabtype_id = $request->cabtype_id;
        $cab->number_plate = $request->number_plate;
        $cab->model_number = $request->model_number;
        $cab->color = $request->color;
        $cab->description = $request->description;
        $cab->photo = isset($request->photo)?$image :null;

        $cab->created_by = Auth::user()->id;
        $cab->updated_by = Auth::user()->id;
        $cab->manufacturer = 0;
        $cab->manufacturer_year = 0;
        $cab->taxi_operator = 0;
        $cab->passenger_capacity = 0;
        $cab->children = 0;
        $cab->wheelchair = 0;

        $cab->save();
        return redirect()->route('cab.index')
                            ->with('success','Cab Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cab = Cab::where('id',$id)->first();
//        echo "<pre>";print_r($cab->toArray());exit;
        return view('backEnd.cab.modal',compact('cab'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cab $cab)
    {
         $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();
        $cabtypes = CabType::all()->pluck('type_name','id');
        return view('backEnd.cab.edit',compact('drivers','cabtypes','cab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Cab $cab,Request $request)
    {
        $request->validate([
            'driver_id' => 'required',
            'cabtype_id' => 'required',
            'number_plate' => 'required',
            'model_number' => 'required',
            'color' => 'required',
            'description' => 'required',
            // 'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

         if (isset($request->photo)) {
                    $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

                    ]);
            if (file_exists($cab->photo)) {
                @unlink($cab->photo);    
            }
            $path = "uploads/cab/";
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move($path, $imageName);
            $image = $path.$imageName;
        }
       

        $cab->driver_id = $request->driver_id;
        $cab->cabtype_id = $request->cabtype_id;
        $cab->number_plate = $request->number_plate;
        $cab->model_number = $request->model_number;
        $cab->color = $request->color;
        $cab->description = $request->description;
        $cab->photo = isset($request->photo)?$image :null;

        // $cab->created_by = Auth::user()->id;
        $cab->updated_by = Auth::user()->id;
        // $cab->manufacturer = 0;
        // $cab->manufacturer_year = 0;
        // $cab->taxi_operator = 0;
        // $cab->adult = 0;
        // $cab->children = 0;
        // $cab->wheelchair = 0;

        $cab->save();
        return redirect()->route('cab.index')
                            ->with('success','Cab Updated Succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cab $cab)
    {
        $cab->delete();
        return redirect()->route('cab.index')
                            ->with('success','Cab Deleted Succesfully');

    }
    public function dsearch(Request $request)
    {
         $request->validate([
            'driver_id' => 'required',
        ]);
         $driver_id = $request->driver_id;
        $cabs = Cab::where('driver_id',$driver_id)->latest()->paginate(10);


          $drivers = Driver::where('active',1)
        ->where('trash_status',0)
        ->pluck('full_name','id')->toArray();
        
        return view('backEnd.cab.index',compact('cabs','drivers'));

    }
}
