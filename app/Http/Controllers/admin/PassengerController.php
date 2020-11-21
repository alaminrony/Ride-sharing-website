<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Passenger;
use App\AdminNotification;
use Illuminate\Support\Facades\Mail;
use Auth;

class PassengerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        echo "<pre>"; print_r($request->all());exit;
        $passengers = Passenger::where('trash_status', 0)
                            ->where('active', 1)
                            ->latest()->paginate(5);
        return view('backEnd.passenger.index',compact('passengers')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backEnd.passenger.create');
        
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
            'full_name' => 'required',
            'phone' => 'required|between:11,14',
            'gender' => 'required',
            'email' => 'required|email|unique:passengers,email',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'status' => 'required',
        ]);

        $activation_code = rand(000000, 999999);
        
        $passenger =  new Passenger;
        $passenger->full_name = $request->full_name;
        $passenger->phone = $request->phone;
        $passenger->email = $request->email;
        $passenger->gender = $request->gender;
        $passenger->ip_address = $_SERVER['REMOTE_ADDR'];
        $passenger->password = Hash::make($request->password);
        $passenger->active = $request->status;
        $passenger->address = '';
        // $passenger->point = 0;
        $passenger->trash_status = 0;
         $passenger->mail_verification = $activation_code;
        $passenger->created_by = Auth::user()->id;
        $passenger->updated_by = Auth::user()->id;
        
        if($passenger->save()){
            $notifyForDriver = new AdminNotification;
            $notifyForDriver->title = 'New Passenger Registered';
            $notifyForDriver->details = "Click to view {$passenger->full_name} details";
            $notifyForDriver->type = '2';
            $notifyForDriver->type_id = $passenger->id;
            $notifyForDriver->status = '0';
            $notifyForDriver->save();
            
            if ($request->notify == 1) {
                
                $code = base64_encode($activation_code);
                 $link = url('/mailvarification') . "/$passenger->id/$code";

                $toEmail = trim($request->email);
                $toName = $request->full_name;
                $subject = 'Fare trim Passenger register confirmation';


                $data = [
                    'name' => $request->full_name,
                    'email' => $request->email,
                    'subject' => 'Fare trim Passenger register confirmation',
                    'password' => $request->password,
                ];

                Mail::send('email-template.passengerRegister',['data'=>$data], function($message) use($toEmail, $toName,$subject) {
                    $message->to($toEmail, $toName)->subject($subject);
                    $message->from('info@faretrim.com.au', 'Fare Trim');
                });
            }
            return redirect()->route('passenger.index')->with('success','Passenger Added successfully');

        }
        
    }
    
    public function mailvarification(Request $request) {
        $id = $request->id;
        $code = base64_decode($request->code);

        $passenger = Passenger::where('id', $id)
                ->where('mail_verification', $code)
                ->first();

        if (!empty($passenger)) {
            $passenger->mail_verification_status = 1;
            $passenger->save();
            return redirect('/login')->with('success', 'your email is now varified.you can login now.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $passenger = Passenger::where('id', $id)->first();
        return view('backEnd.passenger.modal',compact('passenger'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Passenger $passenger)
    {
        return view('backEnd.passenger.edit',compact('passenger'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passenger $passenger)
    {
         $request->validate([
            'full_name' => 'required',
            'phone' => 'required|between:11,14',
            'gender' => 'required',
            'email' => 'required|email|unique:passengers,email,'.$passenger->id,
          
            'status' => 'required',
        ]);
        if (isset($request->password)) {
            $request->validate([
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            ]);
        }

          $passenger->full_name = $request->full_name;
        $passenger->phone = $request->phone;
        $passenger->email = $request->email;
        $passenger->gender = $request->gender;
        $passenger->gender = $request->gender;
        $passenger->ip_address = $_SERVER['REMOTE_ADDR'];

        if ($request->password) {
        $passenger->password = Hash::make($request->password);
        }

        $passenger->active = $request->status;
        $passenger->address = '';
       
        // $passenger->trash_status = 0;
      
        $passenger->updated_by = Auth::user()->id;
        $passenger->save();
        return redirect()->route('passenger.index')
                        ->with('success','Passenger Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passenger $passenger)
    {
        $passenger->delete();
        return redirect()->route('passenger.index')
                        ->with('success','Passenger deleted successfully');
    }
    public function trash($id){
         
        $passenger = Passenger::findOrFail($id);
        
        if ($passenger->trash_status == 0) {
             $passenger->trash_status = 1;
        if ($passenger->save()) {
           return redirect()->route('passenger.index')
                        ->with('success','Passenger has been moved to trash');
        }    
        }else{
            $passenger->trash_status = 0;
        if ($passenger->save()) {
           return redirect()->route('passenger.index')
                        ->with('success','Passenger restore successfully');
        } 
        }
           
    }
    public function trashlist()
    {
        $passengers = Passenger::where('trash_status', 1)
                    ->latest()->paginate(5);
        return view('backEnd.passenger.trashlist',compact('passengers')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function inactive()
    {
        $passengers = Passenger::where('trash_status', 0)
                    ->where('active',0)
                    ->latest()->paginate(5);
        return view('backEnd.passenger.inactive',compact('passengers')) 
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
