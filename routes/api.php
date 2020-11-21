<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api',
        ], function ($router) {
    Route::post('phoneExists', 'Api\Driver\Auth\AuthController@phoneExists');
    Route::post('emailExists', 'Api\Driver\Auth\AuthController@emailExists');
    Route::post('register', 'Api\Driver\Auth\AuthController@register');
    Route::post('login', 'Api\Driver\Auth\AuthController@login');
    Route::post('logout', 'Api\Driver\Auth\AuthController@logout');
    Route::post('refresh', 'Api\Driver\Auth\AuthController@refresh');
    Route::get('profile', 'Api\Driver\Auth\AuthController@profile');
    Route::post('sendOtp', 'Api\Driver\Auth\AuthController@sendOTP');
    Route::post('verifyOtp', 'Api\Driver\Auth\AuthController@verifyOTP');
    Route::post('resetPassword', 'Api\Driver\Auth\AuthController@resetPassword');
    Route::get('verifyEmail/{email}', 'Api\Driver\Auth\AuthController@verifyEmail');
    Route::get('resendEmail/{email}', 'Api\Driver\Auth\AuthController@resendEmail');
    Route::post('addVehicle/', 'Api\Driver\Auth\AuthController@addVehicle');
    Route::post('editVehicle/', 'Api\Driver\Auth\AuthController@editVehicle');
    Route::post('deleteVehicle/', 'Api\Driver\Auth\AuthController@deleteVehicle');
    Route::post('onlineOffline/', 'Api\Driver\Auth\AuthController@onlineOffline');
    Route::post('loginPin/', 'Api\Driver\Auth\AuthController@loginPin');
    Route::post('resetPin/', 'Api\Driver\Auth\AuthController@resetPin');
    Route::post('helpAndSupport/', 'Api\Driver\Auth\AuthController@helpAndSupport');
    Route::post('editProfile/', 'Api\Driver\Auth\AuthController@editProfile');
    Route::post('requestRidesAdd/', 'Api\Driver\Auth\AuthController@requestRidesAdd');
    Route::post('requestRides/', 'Api\Driver\Auth\AuthController@requestRides');
    Route::get('rideDetails/{ride_id}', 'Api\Driver\Auth\AuthController@rideDetails')->name('rideDetails');
    Route::post('rideAccept/', 'Api\Driver\Auth\AuthController@rideAccept');
    Route::post('rideCancel/', 'Api\Driver\Auth\AuthController@rideCancel');
    Route::post('rideStart/', 'Api\Driver\Auth\AuthController@rideStart');
    Route::post('rideComplete/', 'Api\Driver\Auth\AuthController@rideComplete');
    Route::post('rideComplete/', 'Api\Driver\Auth\AuthController@rideComplete');
    Route::post('paymentComplete/', 'Api\Driver\Auth\AuthController@paymentComplete');
    Route::post('rideHistory/', 'Api\Driver\Auth\AuthController@rideHistory');
    Route::post('cancelHistory/', 'Api\Driver\Auth\AuthController@cancelHistory');
    Route::post('passengerRating/', 'Api\Driver\Auth\AuthController@passengerRating');
    Route::post('fareDetails/', 'Api\Driver\Auth\AuthController@fareDetails');
    Route::post('cardAdd/', 'Api\Driver\Auth\AuthController@cardAdd');
    Route::post('cardUpdate/', 'Api\Driver\Auth\AuthController@cardUpdate');
    Route::post('cardDelete/', 'Api\Driver\Auth\AuthController@cardDelete');
    Route::post('billList/', 'Api\Driver\Auth\AuthController@billList');
    Route::post('todaySummary/', 'Api\Driver\Auth\AuthController@todaySummary');
    Route::post('todayFare/', 'Api\Driver\Auth\AuthController@todayFare');
    Route::post('deleteDriver/', 'Api\Driver\Auth\AuthController@deleteDriver');
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'passenger'
        ], function($router) {

    Route::post('register', 'Api\Passenger\Auth\AuthController@register');
    Route::post('login', 'Api\Passenger\Auth\AuthController@login');
    Route::post('logout', 'Api\Passenger\Auth\AuthController@logout');
    Route::post('refresh', 'Api\Passenger\Auth\AuthController@refresh');
    Route::post('sendOtp', 'Api\Passenger\Auth\AuthController@sendOTP');
    Route::post('verifyOtp', 'Api\Passenger\Auth\AuthController@verifyOTP');
    Route::get('verifyEmail/{email}', 'Api\Passenger\Auth\AuthController@verifyEmail');

    Route::get('resendEmail/{email}', 'Api\Passenger\Auth\AuthController@resendEmail');
    Route::post('resetPassword', 'Api\Passenger\Auth\AuthController@resetPassword');
    Route::post('editProfile/', 'Api\Passenger\Auth\AuthController@editProfile');
    Route::get('profile', 'Api\Passenger\Auth\AuthController@profile');
    Route::post('driverRating/', 'Api\Passenger\Auth\AuthController@driverRating');
    Route::post('requestRidesAdd/', 'Api\Passenger\Auth\AuthController@requestRidesAdd');
    Route::post('phoneExists/', 'Api\Passenger\Auth\AuthController@phoneExists');
    Route::post('rideCancel/', 'Api\Passenger\Auth\AuthController@rideCancel');
    Route::post('rideCancelReason/', 'Api\Passenger\Auth\AuthController@rideCancelReason');
    Route::post('cardAdd/', 'Api\Passenger\Auth\AuthController@cardAdd');
    Route::post('cardUpdate/', 'Api\Passenger\Auth\AuthController@cardUpdate');
    Route::post('cardDelete/', 'Api\Passenger\Auth\AuthController@cardDelete');
    Route::post('helpAndSupport/', 'Api\Passenger\Auth\AuthController@helpAndSupport');
    Route::post('rideHistory/', 'Api\Passenger\Auth\AuthController@rideHistory');
    Route::post('cancelHistory/', 'Api\Passenger\Auth\AuthController@cancelHistory');
    Route::post('fareDetails/', 'Api\Passenger\Auth\AuthController@fareDetails');
    Route::post('addBill/', 'Api\Passenger\Auth\AuthController@addBill');
    Route::post('billList/', 'Api\Passenger\Auth\AuthController@billList');
});




// Route::post('register', 'Api\Driver\Auth\AuthController@register');
//     Route::post('login', 'Api\Driver\Auth\AuthController@login');