<?php

namespace App\Http\Controllers\frontEnd\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Driver;
use Laravel\Socialite\Facades\Socialite;

class DriverSocialLoginController extends Controller {

    public function redirect(Request $request) {
//        echo "<pre>";print_r($request->provider);exit;
        return Socialite::driver($request->provider)->redirect();
    }

    public function callback(Request $request) {
        $socialUser = Socialite::driver($request->provider)->stateless()->user();
        $driver = Driver::where('email', $socialUser->getEmail())->first();
        if ($driver) {
            Auth::guard('driver')->login($driver);
            $driver_id = Auth::guard('driver')->id();
            return redirect('driver-profile?driverId='.$driver_id);
        }
        return redirect('driver-signup');
    }

}
