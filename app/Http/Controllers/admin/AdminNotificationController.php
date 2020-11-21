<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Driver;
use App\Passenger;
use App\CabRide;
use App\Cab;
use App\AdminNotification;

class AdminNotificationController extends Controller {

    public function notificationUpdate(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $notification = AdminNotification::findOrFail($request->id);
        $notification->status = '1';
        if ($notification->save()) {
            return response()->json(['response' => 'success']);
        }
    }

    public function search(Request $request) {
        $users = User::search($request->get('search'))->get();
        $drivers = Driver::search($request->get('search'))->get();
        $passengers = Passenger::search($request->get('search'))->get();
        $cabRides = CabRide::search($request->get('search'))->get();
        $cabs = Cab::search($request->get('search'))->get();
//        echo "<pre>";print_r($users->toArray());
//        echo "<pre>";print_r($cabs->toArray());exit;
        $viewData = view('backEnd.pages.search')->with(compact('users','drivers','passengers','cabRides','cabs'))->render();
        return response()->json(['viewData'=>$viewData]);
    }

}
