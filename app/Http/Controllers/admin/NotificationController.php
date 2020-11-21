<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Auth;
use App\Driver;
use App\Passenger;
use App\DriverDevice;
use App\NotificationSend;
use DB;
use App\User;

class NotificationController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $typeArr = ['' => 'Send to', '3' => 'All', '1' => 'Drivers', '2' => 'Passengers'];
        $Notifications = Notification::latest()->paginate(5);

        return view('backEnd.notification.index')->with(['Notifications' => $Notifications, 'typeArr' => $typeArr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $typeArr = ['' => 'Send to', '3' => 'All', '1' => 'Drivers', '2' => 'Passengers'];
        $drivers = ['' => 'Send to multiple drivers'] + Driver::join('driver_devices', 'driver_devices.driver_id', '=', 'drivers.id')
                        ->where('driver_devices.user_type', '1')
                        ->pluck('drivers.full_name', 'drivers.id')
                        ->toArray();
        $passengers = ['' => 'Send to multiple passengers'] + Passenger::join('driver_devices', 'driver_devices.driver_id', '=', 'passengers.id')
                        ->where('driver_devices.user_type', '2')
                        ->pluck('passengers.full_name', 'passengers.id')
                        ->toArray();

        return view('backEnd.notification.create')->with(compact('drivers', 'passengers', 'typeArr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $request->validate([
            'title' => 'required',
            'notification_details' => 'required',
        ]);


        $notification = new Notification;
        $notification->title = $request->title;
        $notification->notification_details = $request->notification_details;
        $notification->type = $request->type;
        $notification->drivers = empty($request->type) ? json_encode($request->drivers) : NULL;
        $notification->passengers = empty($request->type) ? json_encode($request->passengers) : NULL;
        ;
        $notification->status = 1;
        $notification->device_id = 1;
        $notification->created_by = Auth::user()->id;
        if ($notification->save()) {
            return $this->notifyUser($notification);
//            return redirect()->route('notification.index')->with('success', 'notification added successfully');
        }
    }

    public function notifyUser($notification) {

        if (!empty($notification->type)) {
            //type 1 means all Driver
            if ($notification->type == '1') {
                $driverIdArr = DriverDevice::where('user_type', '1')->get();

                $fcm_tokens = $driverIdArr->pluck('token')->toArray();
                $data = [];
                $i = 0;
                foreach ($driverIdArr as $driver) {
                    $data[$i]['notification_id'] = $notification->id;
                    $data[$i]['user_id'] = $driver->driver_id;
                    $data[$i]['notification_read_atatus'] = '0';
                    $data[$i]['device_id'] = $driver->device_id;
                    $data[$i]['user_type'] = $driver->user_type;
                    $i++;
                }
                $notificationSend = NotificationSend::insert($data);
            }
            //type 2 means all Passenger
            elseif ($notification->type == '2') {
                $passengerArr = DriverDevice::where('user_type', '2')->get();

                $fcm_tokens = $passengerArr->pluck('token')->toArray();

                $data = [];
                $i = 0;
                foreach ($passengerArr as $passenger) {
                    $data[$i]['notification_id'] = $notification->id;
                    $data[$i]['user_id'] = $passenger->driver_id;
                    $data[$i]['notification_read_atatus'] = '0';
                    $data[$i]['device_id'] = $passenger->device_id;
                    $data[$i]['user_type'] = $passenger->user_type;
                    $i++;
                }
                $notificationSend = NotificationSend::insert($data);
            }
            //type 3 means Both
            else {
                $allUserArr = DriverDevice::get();

                $fcm_tokens = $allUserArr->pluck('token')->toArray();

//                 echo "<pre>";print_r($allUserArr->toArray());
//                 echo "<pre>";print_r($fcm_tokens);exit;
//                return hello($driverIdArr);

                $data = [];
                $i = 0;
                foreach ($allUserArr as $user) {
                    $data[$i]['notification_id'] = $notification->id;
                    $data[$i]['user_id'] = $user->driver_id;
                    $data[$i]['notification_read_atatus'] = '0';
                    $data[$i]['device_id'] = $user->device_id;
                    $data[$i]['user_type'] = $user->user_type;
                    $i++;
                }
                $notificationSend = NotificationSend::insert($data);
            }
        } else {
            $specificDriversArr = json_decode($notification->drivers);
            $specificPassengersArr = json_decode($notification->passengers);

            $specificDrivers = [];
            if (!empty($specificDriversArr)) {
                $specificDrivers = DriverDevice::where('user_type', '1')->whereIn('driver_id', $specificDriversArr)->get();
                $driversFcmToken = $specificDrivers->pluck('token')->toArray();
                
                $data = [];
                $i = 0;
                foreach ($specificDrivers as $driver) {
                    $data[$i]['notification_id'] = $notification->id;
                    $data[$i]['user_id'] = $driver->driver_id;
                    $data[$i]['notification_read_atatus'] = '0';
                    $data[$i]['device_id'] = $driver->device_id;
                    $data[$i]['user_type'] = $driver->user_type;
                    $i++;
                }
                $notificationSend = NotificationSend::insert($data);

            }
            $specificPassengers = [];
            if (!empty($specificPassengersArr)) {
                $specificPassengers = DriverDevice::where('user_type', '2')->whereIn('driver_id', $specificPassengersArr)->get();
                $passengersFcmToken = $specificPassengers->pluck('token')->toArray();
                
                $data = [];
                $i = 0;
                foreach ($specificPassengers as $passenger) {
                    $data[$i]['notification_id'] = $notification->id;
                    $data[$i]['user_id'] = $passenger->driver_id;
                    $data[$i]['notification_read_atatus'] = '0';
                    $data[$i]['device_id'] = $passenger->device_id;
                    $data[$i]['user_type'] = $passenger->user_type;
                    $i++;
                }
                $notificationSend = NotificationSend::insert($data);
            }
            
            $fcm_tokens = array_merge($driversFcmToken, $passengersFcmToken);
          
        }


        $title = $notification->title;
        $message = $notification->notification_details;
        $notification_id = $notification->id;
        $result = sendPushNotification($fcm_tokens, $title, $message, $notification_id);

        if ($result['success'] >= 1) {
            return redirect()->route('notification.index')->with('success', 'Notification Sent successfully');
        } else {
            return redirect()->route('notification.index')->with('success', 'Notification does not Sent successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification) {
        $driversArr = json_decode($notification->drivers);

        $passengersArr = json_decode($notification->passengers);

        $drivers = [];
        if ($driversArr) {
            $drivers = Driver::select(DB::raw("CONCAT(full_name,'(',phone,')') AS name"), 'id')->whereIn('id', $driversArr)->get()->pluck('name', 'id')->toArray();
        }
        $passengers = [];
        if ($passengersArr) {
            $passengers = Passenger::select(DB::raw("CONCAT(full_name,'(',phone,')') AS name"), 'id')->whereIn('id', $passengersArr)->get()->pluck('name', 'id')->toArray();
        }
        return view('backEnd.notification.modal', compact('notification', 'drivers', 'passengers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification) {
        return view('backEnd.notification.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification) {
        $request->validate([
            'title' => 'required',
            'notification_details' => 'required',
            'type' => 'required',
        ]);

        $notification->title = $request->title;
        $notification->bg_color = $request->bg_color;
        $notification->icon_name = $request->icon_name;
        $notification->notification_details = $request->notification_details;
        $notification->type = $request->type;
        $notification->status = 1;
        $notification->created_by = Auth::user()->id;

        $notification->save();
        return redirect()->route('notification.index')->with('success', 'notification updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification) {
        $notification->delete();
        return redirect()->route('notification.index')->with('success', 'notification deleted successfully');
    }
    
    public function tokenList(){
        $allTokens = DriverDevice::orderBy('id','desc')->paginate(10);
        $drivers = Driver::pluck('full_name','id')->toArray();
        $passengers = Passenger::pluck('full_name','id')->toArray();
        
        return view('backEnd.notification.tokenList')->with(compact('allTokens','drivers','passengers'));
    }

}
