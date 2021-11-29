<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Driver;
use App\DriverType;
use App\DriverActivityLog;
use App\AdminNotification;
use Auth;
use Illuminate\Support\Facades\Mail;

class DriverController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $drivers = Driver::where('trash_status', 0)
                        ->where('active', 1)
                        ->latest()->paginate(5);

        $driverType = DriverType::pluck('option', 'id')->toArray();

//        echo "<pre>";print_r($driverType);exit;
        return view('backEnd.driver.index', compact('drivers', 'driverType'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $driverTypes = DriverType::where('active', 1)
                ->pluck('option', 'id');

        return view('backEnd.driver.create', compact('driverTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//         echo "<pre>";
//         print_r($request->all());
//         exit;
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required|between:11,14',
            'gender' => 'required',
            'email' => 'required|email|unique:drivers,email',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
            'date_of_birth' => 'required',
            'driving_licence_no' => 'required',
            'australian_taxi_licence_no' => 'required',
            // 'cab_driver_no' => 'required',
            'driver_type_id' => 'required',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required',
        ]);

        if (isset($request->avatar)) {
            $path = "uploads/driver/";
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move($path, $imageName);
            $image = $path . $imageName;
        }

        $activation_code = rand(000000, 999999);

        $driver = new Driver;
        $driver->full_name = $request->full_name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->date_of_birth = $request->date_of_birth;
        $driver->gender = $request->gender;
        $driver->address = $request->address;
        $driver->driving_licence_no = $request->driving_licence_no;
        $driver->driving_licence_expire_date = $request->driving_licence_expire_date;
        $driver->australian_taxi_licence_no = $request->australian_taxi_licence_no;
        $driver->australian_taxi_licence_expire_date = $request->australian_taxi_licence_expire_date;
        // $driver->cab_driver_no = 0;
        $driver->driver_type_id = $request->driver_type_id;
        $driver->ip_address = $_SERVER['REMOTE_ADDR'];
        $driver->password = Hash::make($request->password);
        $driver->profile_photo = isset($request->avatar) ? $image : null;
        $driver->active = $request->status;
        $driver->d_point = 0;
        $driver->rating_value = 0;
        $driver->cab_id = 0;
        $driver->is_online = 0;
        $driver->trash_status = 0;
        $driver->country = 0;
        $driver->city = 0;
        $driver->state = 0;
        $driver->post_code = 0;
        $driver->mail_verification = $activation_code;
        $driver->created_by = Auth::user()->id;
        $driver->updated_by = Auth::user()->id;
        if ($driver->save()) {
            $driver_activity = new DriverActivityLog;
            $driver_activity->driver_id = $driver->id;
            $driver_activity->type = $request->driver_type_id;
            $driver_activity->save();

            $notifyForDriver = new AdminNotification;
            $notifyForDriver->title = 'New Driver Registered';
            $notifyForDriver->details = "Click to view {$driver->full_name} details";
            $notifyForDriver->type = '1';
            $notifyForDriver->type_id = $driver->id;
            $notifyForDriver->status = '0';
            $notifyForDriver->save();

            if ($request->notify == 1) {
                $code = base64_encode($activation_code);
                $link = url('/mailvarification') . "/$driver->id/$code";

                $toEmail = trim($request->email);
                $toName = $driver->full_name;
                $subject = 'Fare trim Driver confirmation';


                $data = [
                    'name' => $driver->full_name,
                    'email' => $driver->email,
                    'subject' => 'Fare trim Driver confirmation',
                    'link' => $link,
                    'status' => 'Pending',
                    'password' => $request->password,
                ];

                Mail::send('email-template.driverRegister', ['data' => $data], function($message) use($toEmail, $toName, $subject) {
                    $message->to($toEmail, $toName)->subject($subject);
//                    $message->from('info@faretrim.com.au', 'Fare Trim');
                });
            }
        }
        return redirect()->route('driver.index')
                        ->with('success', 'Driver added successfully');
    }

    public function mailvarification(Request $request) {
        $id = $request->id;
        $code = base64_decode($request->code);

        $driver = Driver::where('id', $id)
                ->where('mail_verification', $code)
                ->first();

        if (!empty($driver)) {
            $driver->mail_verification_status = 1;
            $driver->save();

            return redirect('/login')->with('success', 'your email is now varified.you can login now.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $driver = Driver::where('id', $id)->first();
        return view('backEnd.driver.modal', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver) {
        $driverTypes = DriverType::where('active', 1)
                ->pluck('option', 'id');
        return view('backEnd.driver.edit', compact('driver', 'driverTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver) {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required|between:11,14',
            'gender' => 'required',
            'email' => 'required|email|unique:drivers,email,' . $driver->id,
            'date_of_birth' => 'required',
            'driving_licence_no' => 'required',
            'australian_taxi_licence_no' => 'required',
            // 'cab_driver_no' => 'required',
            'driver_type_id' => 'required',
            'status' => 'required',
        ]);

        if (isset($request->password)) {
            $request->validate([
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'min:6',
            ]);
        }
        if (isset($request->avatar)) {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            ]);
            if (file_exists($driver->profile_photo)) {
                @unlink($driver->profile_photo);
            }
            $path = "uploads/driver/";
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->move($path, $imageName);
            $image = $path . $imageName;
        }


        $driver->full_name = $request->full_name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->date_of_birth = $request->date_of_birth;
        $driver->gender = $request->gender;
        $driver->address = $request->address;
        $driver->driving_licence_no = $request->driving_licence_no;
        $driver->driving_licence_expire_date = $request->driving_licence_expire_date;
        $driver->australian_taxi_licence_no = $request->australian_taxi_licence_no;
        $driver->australian_taxi_licence_expire_date = $request->australian_taxi_licence_expire_date;
        // $driver->cab_driver_no = $request->cab_driver_no;
        $driver->driver_type_id = $request->driver_type_id;
        $driver->ip_address = $_SERVER['REMOTE_ADDR'];
        if ($request->password) {
            $driver->password = Hash::make($request->password);
        }
        $driver->profile_photo = isset($request->avatar) ? $image : $driver->profile_photo;
        $driver->active = $request->status;
        // $driver->d_point = 0;
        // $driver->rating_value = 0;
        // $driver->cab_id = 0;
        // $driver->user_name = 0;
        // $driver->is_online = 0;
        // $driver->trash_status = 0;
        // $driver->country = 0;
        // $driver->city = 0;
        // $driver->state = 0;
        // $driver->post_code = 0;
        // $driver->created_by = 0;
        $driver->updated_by = Auth::user()->id;
        $driver->save();
        return redirect()->route('driver.index')
                        ->with('success', 'Driver updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver) {

        if (file_exists($driver->profile_photo)) {
            @unlink($driver->profile_photo);
        }
        $driver->delete();
        return redirect()->route('driver.index')
                        ->with('success', 'Driver deleted successfully');
    }

    public function trash($id) {

        $driver = Driver::findOrFail($id);
        if ($driver->trash_status == 0) {
            $driver->trash_status = 1;
            if ($driver->save()) {
                return redirect()->route('driver.index')
                                ->with('success', 'Driver has been moved to trash');
            }
        } else {
            $driver->trash_status = 0;
            if ($driver->save()) {
                return redirect()->route('driver.index')
                                ->with('success', 'Driver restore successfully');
            }
        }
    }

    public function trashlist() {
        $drivers = Driver::where('trash_status', 1)
                        ->latest()->paginate(5);
        $driverType = DriverType::pluck('option', 'id')->toArray();
        return view('backEnd.driver.trashlist', compact('drivers', 'driverType'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function inactive() {
        $drivers = Driver::where('trash_status', 0)
                        ->where('active', 0)
                        ->latest()->paginate(5);
        return view('backEnd.driver.inactive', compact('drivers'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

}
