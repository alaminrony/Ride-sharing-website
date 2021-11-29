<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Driver;
use App\Passenger;
use Laravel\Socialite\Facades\Socialite;
use Session;

class SocialLoginController extends Controller {

    public function redirect(Request $request) {
//        echo "<pre>";print_r($request->provider);exit;
        $url = url()->previous();

        Session::put('preUrl', $url);
        return Socialite::driver($request->provider)->redirect();
    }

    public function callback(Request $request) {

        $preUrl = Session::get('preUrl');
        $lastUrlValue = explode('/', $preUrl);
        $checkUrl = end($lastUrlValue);
        $socialUser = Socialite::driver($request->provider)->stateless()->user();
        
        if ($checkUrl == 'driverLogin' || $checkUrl == 'driver-signup') {
            $driver = Driver::where('email', $socialUser->getEmail())->first();
            if ($driver) {
                Auth::guard('driver')->login($driver);
                $driver_id = Auth::guard('driver')->id();
                return redirect('driver-profile?driverId=' . $driver_id);
            }
            return redirect('driver-signup');
        } else {
            $passenger = Passenger::where('email', $socialUser->getEmail())->first();
            if ($passenger) {
                Auth::guard('passenger')->login($passenger);
                $passenger_id = Auth::guard('passenger')->id();
                return redirect('passenger-profile?passengerId=' .$passenger_id);
            }
            return redirect('passenger-signup');
        }
    }

}
