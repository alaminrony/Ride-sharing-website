<?php

namespace App\Http\Controllers\Api\Passenger\Auth;

use App\Http\Controllers\Controller;
use App\Driver;
use App\OtpVerify;
use App\Cab;
use App\User;
use App\ContactUs;
use App\CabRide;
use App\DriverDailySummary;
use App\HelpAndSupport;
use App\PassengerRating;
use App\DriverPaymentInfo;
use App\DriverBill;
use Validator;
use JWTAuth;
use Config;
use DB;
use App\Passenger;
use App\DriverRating;
use App\RideCancel;
use App\PassengerPaymentInfo;
use App\PassengerBill;
use Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Notifications\verifyEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller {

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'sendOTP', 'verifyOTP', 'resetPassword', 'verifyEmail', 'phoneExists']]);

        Config::set('jwt.user', Passenger::class);
        Config::set('auth.providers', ['users' => [
                'driver' => 'eloquent',
                'model' => Passenger::class,
        ]]);
    }

    public function phoneExists(Request $request) {
        $rules = [
            'phone' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
        if (!empty($passenger)) {
            return response()->json(['response' => 'success', 'message' => "This {$request->phone} exists in database"]);
        } else {
            return response()->json(['response' => 'success', 'message' => "This {$request->phone} does not exists in database"]);
        }

//        echo "<pre>";
//        print_r($passenger->toArray());
//        exit;
    }

    public function sendOTP(Request $request) {
        $rules = [
            'phone' => 'required|numeric',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $otpCode = rand(100000, 999999);

        $isNumberExists = OtpVerify::where('phone', $request->phone)->first();
//        echo "<pre>"; print_r($isNumberExists->toArray());exit;
        if ($isNumberExists) {
            $isNumberExists->phone = $request->phone;
            $isNumberExists->otp_code = $otpCode;
            $isNumberExists->verified_status = '0';
            if ($isNumberExists->save()) {
                return $this->send_sms($request->phone, $otpCode);
            }
        }

        $otp = new OtpVerify;
        $otp->phone = $request->phone;
        $otp->otp_code = $otpCode;
        $otp->verified_status = '0';
        if ($otp->save()) {
            return $this->send_sms($request->phone, $otpCode);
        }
    }

    protected function send_sms($contact_no, $otpCode) {
        $message = "Your OTP code is {$otpCode}";
        $url = "http://bangladeshsms.com/smsapi";

        $data = [
            "api_key" => "R60008575d96f4d09ad551.76306938",
            "type" => "text",
            "contacts" => '88' . $contact_no,
            "senderid" => "8809601000500",
            "msg" => "{$message}",
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return response()->json(['response' => 'success', 'message' => $message, 'phone' => $contact_no, 'otp_code' => $otpCode, 'response_id' => $response]);
    }

    public function verifyOTP(Request $request) {
//         echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'phone' => 'required|numeric',
            'otp_code' => 'required|digits_between:6,6',
        ];

        $message = [
            'otp_code.digits_between' => 'OTP code must be 6 digit',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $verify = OtpVerify::where(['phone' => $request->phone, 'otp_code' => $request->otp_code])->first();
        if ($verify) {
            $verify->verified_status = '1';
        } else {
            return response()->json(['response' => 'error', 'message' => 'OTP does not match']);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
        if (!empty($passenger)) {
            $passenger->phone_verification = $request->otp_code;
            $passenger->phone_verification_status = '1';
            $passenger->save();
        }


        if ($verify->save()) {
            return response()->json(['response' => 'success', 'message' => "OTP verification Successful", 'phone' => $request->phone, 'otp_code' => $request->otp_code, 'phone_verification_status' => $passenger->phone_verification_status]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'OTP does not verified']);
        }
    }

    public function resetPassword(Request $request) {
//         echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'phone' => 'required',
            'password' => 'required|confirmed|string|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
        $passenger->password = Hash::make($request->password);
        if ($passenger->save()) {
            return response()->json(['response' => 'success', 'message' => 'Password reset successfully', 'passenger' => $passenger]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Password does not reset']);
        }
    }

    public function register(Request $request) {
        $rules = [
            'full_name' => 'required|between:2,100',
            'email' => 'required|email|unique:passengers|max:50',
            'password' => 'required|string|min:6',
            'avatar' => 'required',
            'phone' => 'required|unique:passengers',
        ];

        if (!empty($request->file('avatar'))) {
            $rules['avatar'] = ['required', 'image', 'mimes:jpeg,png'];
        }



        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

//        echo "<pre>";print_r($request->all());exit;

        $passenger = new Passenger;
        $passenger->full_name = $request->full_name;
        $passenger->email = $request->email;
        $passenger->password = Hash::make($request->password);


        if ($files = $request->file('avatar')) {
            $imagePath = 'uploads/passenger/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $imageName);
            $passenger->avatar = $imageName;
        }
        $passenger->phone = $request->phone;
        if ($passenger->save()) {
            return $this->sendEmail($passenger);
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
//         echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'email' => 'required',
            'password' => 'required|string|min:6',
        ];

        $message = [
            'email.required' => 'Email Or Phone field is required',
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (is_numeric($request->get('email'))) {
            $credentials = ['phone' => $request->get('email'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('email'), 'password' => $request->get('password')];
        }

//        $credentials = $request->only('phone', 'password');

        if (!$token = Auth::guard()->attempt($credentials)) {
            return response()->json([
                        'response' => 'error',
                        'message' => 'Invalid email or password',
            ]);
        }

        $passenger = Auth::guard()->user();


        return $this->createNewToken($token, $passenger);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile() {
        $passenger = Auth::guard()->user();

        $passengerArr = [
            'passenger_id' => $passenger->id,
            'full_name' => $passenger->full_name,
            'email' => $passenger->email,
            'phone' => $passenger->phone,
            'saved_home_address' => $passenger->saved_home_address,
            'saved_work_address' => $passenger->saved_work_address,
            'avatar' => $passenger->avatar,
        ];

        return response()->json(['response' => 'success', 'passenger' => $passengerArr]);
    }

    public function logout() {
        Auth::guard()->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh() {
        return $this->createNewToken(Auth::guard()->refresh());
    }

    protected function createNewToken($token, $passenger) {

        return response()->json([
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => Auth::guard()->factory()->getTTL() * 60,
                    'passenger' => $passenger,
        ]);
    }

    public function sendEmail($passenger) {
        $details = [
            'greeting' => 'Hi ' . $passenger->full_name,
            'body' => "Please confirm that {$passenger->email} is your email address for clicking this button",
            'actionText' => 'Verify Email',
            'actionURL' => url('/api/passenger/verifyEmail/' . base64_encode($passenger->email)),
        ];

        $passenger->notify(new verifyEmail($details));
//        Notification::send($driver, new verifyEmail($details));
//        Notification::route('mail', $driver->email)
//                ->notify(new verifyEmail($details));
        return response()->json(['response' => 'success', 'message' => 'Successfully registered', 'passenger' => $passenger], 201);
    }

    public function verifyEmail(Request $request) {
        $email = base64_decode($request->email);

        $Passenger = Passenger::where('email', $email)->first();

        if ($Passenger) {
            $Passenger->mail_verification_status = '1';
            if ($Passenger->save()) {
                return response()->json(['response' => 'success', 'message' => 'Your Email account is activated.', 'email' => $email, 'verified_status' => 1]);
            }
        }
        return response()->json(['response' => 'success', 'message' => 'Your Email does not Exists']);
    }

    public function resendEmail(Request $request) {
        $email = base64_decode($request->email);
//        echo "<pre>";print_r($email);exit;
        $passenger = Passenger::where('email', $email)->first();

        $details = [
            'greeting' => 'Hi ' . $passenger->full_name,
            'body' => "Please confirm that {$passenger->email} is your email address for clicking this button",
            'actionText' => 'Verify Email',
            'actionURL' => url('/api/passenger/verifyEmail/' . base64_encode($passenger->email)),
        ];

        $passenger->notify(new verifyEmail($details));
        return response()->json(['response' => 'success', 'message' => 'Verify Email Sent Successfully', 'id' => $passenger->id, 'email' => $email, 'phone' => $passenger->phone]);
    }

    public function requestRides(Request $request) {
//        echo "<pre>"; print_r($request->driver_id);exit;
        $requestRides = CabRide::join('passengers', 'passengers.id', '=', 'cab_rides.passenger_id')
                ->select('cab_rides.id as ride_id', 'passengers.full_name as passenger_name', 'cab_rides.pickup_address', 'cab_rides.destination_address', 'cab_rides.bid_amount',
                        'cab_rides.riding_distance', 'cab_rides.ridestatus_id')
                ->where('cab_rides.ridestatus_id', '1')
                ->where('cab_rides.driver_id', $request->driver_id)
                ->whereDate('cab_rides.created_at', '=', date('Y-m-d'))
                ->get();

        $requestRidesArr = [];
        $i = 0;
        if ($requestRides->isNotEmpty()) {
            foreach ($requestRides as $requestRide) {
                $requestRidesArr[$i]['ride_id'] = $requestRide->ride_id;
                $requestRidesArr[$i]['passenger_name'] = $requestRide->passenger_name;
                $requestRidesArr[$i]['pickup_address'] = $requestRide->pickup_address;
                $requestRidesArr[$i]['destination_address'] = $requestRide->destination_address;
                $requestRidesArr[$i]['bid_amount'] = $requestRide->bid_amount;
                $requestRidesArr[$i]['riding_distance'] = $requestRide->riding_distance;
                $requestRidesArr[$i]['ride_details'] = route('rideDetails', $requestRide->ride_id);
                $i++;
            }
        }
        return response()->json(['response' => 'success', 'requestRides' => $requestRidesArr]);
    }

    public function rideDetails(Request $request) {
        $rideDetails = CabRide::findOrFail($request->ride_id);
        return response()->json(['response' => 'success', 'rideDetails' => $rideDetails]);
    }

    public function rideCancel(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $rideStatus = CabRide::findOrFail($request->ride_id);
        $rideStatus->ridestatus_id = '3';
        $rideStatus->canceled_by_passenger = $request->passenger_id;
        if ($rideStatus->save()) {
            return response()->json(['response' => 'success', 'message' => 'Ride Cancel Successfully', 'rideDetails' => $rideStatus]);
        }
    }

    public function rideCancelReason(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'ride_id' => 'required',
            'driver_id' => 'required',
            'passenger_id' => 'required',
            'ridestatus_id' => 'required',
            'cancel_issue' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $rideStatus = CabRide::findOrFail($request->ride_id);
        $rideStatus->cancel_issue = $request->cancel_issue;
        $rideStatus->save();

        $cancelReason = new RideCancel;
        $cancelReason->cabride_id = $request->ride_id;
        $cancelReason->driver_id = $request->driver_id;
        $cancelReason->passenger_id = $request->passenger_id;
        $cancelReason->cancel_time = date('Y-m-d H:i:s');
        $cancelReason->ridestatus_id = $request->ridestatus_id;
        $cancelReason->cancel_issue = $request->cancel_issue;
        if ($cancelReason->save()) {
            return response()->json(['response' => 'success', 'message' => 'Ride cancel issue insert Successfully', 'cancelReason' => $cancelReason]);
        }
    }

    public function editProfile(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'full_name' => 'required|between:2,100',
            'email' => 'required|email|max:50',
            'phone' => 'required',
            'saved_home_address' => 'required',
            'saved_work_address' => 'required',
            'old_password' => 'required|string|min:6',
            'new_password' => 'required|string|min:6',
        ];

        if (!empty($request->file('avatar'))) {
            $rules['avatar'] = ['required', 'image', 'mimes:jpeg,png'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $passenger = Passenger::findOrFail($request->passenger_id);
        $passenger->full_name = $request->full_name;
        $passenger->email = $request->email;
        $passenger->phone = $request->phone;
        $passenger->saved_home_address = $request->saved_home_address;
        $passenger->saved_work_address = $request->saved_work_address;

        if (Hash::check($request->old_password, $passenger->password) == false) {
            return response()->json(['response' => 'error', 'message' => 'Your old password does not match']);
        }
        $passenger->password = Hash::make($request->new_password);

        if ($files = $request->file('avatar')) {
            if (file_exists($passenger->avatar) && !empty($passenger->avatar)) {
                unlink($passenger->avatar);
            }
            $imagePath = 'uploads/passenger/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $imageName);
            $passenger->avatar = $imageName;
        }


        if ($passenger->save()) {
            return response()->json(['response' => 'success', 'message' => 'Profile updated successfully', 'passenger' => $passenger]);
        }
    }

    public function requestRidesAdd(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'passenger_id' => 'required',
            'adult_number' => 'required',
            'has_children' => 'required',
            'children_number' => 'required',
            'has_wheelchair' => 'required',
            'riding_distance' => 'required',
            'pickup_address' => 'required',
            'pickup_latitude' => 'required',
            'pickup_longitude' => 'required',
            'destination_latitude' => 'required',
            'destination_longitude' => 'required',
            'destination_address' => 'required',
            'ridestatus_id' => 'required',
            'bid_amount' => 'required',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }


        $addRide = new CabRide;
        $addRide->passenger_id = $request->passenger_id;
        $addRide->adult_number = $request->adult_number;
        $addRide->has_children = $request->has_children;
        $addRide->children_number = $request->children_number;
        $addRide->has_wheelchair = $request->has_wheelchair;
        $addRide->riding_distance = $request->riding_distance;
        $addRide->pickup_address = $request->pickup_address;
        $addRide->pickup_latitude = $request->pickup_latitude;
        $addRide->pickup_longitude = $request->pickup_longitude;
        $addRide->destination_latitude = $request->destination_latitude;
//        $addRide->cancel_issue = !empty($request->cancel_issue) ? $request->cancel_issue : '';
//        $addRide->canceled_by_driver = !empty($request->canceled_by_driver) ? $request->canceled_by_driver : '0';
//        $addRide->canceled_by_passenger = !empty($request->canceled_by_passenger) ? $request->canceled_by_passenger : '0';
        $addRide->destination_longitude = $request->destination_longitude;
        $addRide->destination_address = $request->destination_address;
        $addRide->ridestatus_id = $request->ridestatus_id;
        $addRide->bid_amount = $request->bid_amount;
//        $addRide->total_fare_amount = !empty($request->total_fare_amount) ? $request->total_fare_amount : '0';
//        $addRide->charge_amount = !empty($request->charge_amount) ? $request->charge_amount : '0';
//        $addRide->charge_type = !empty($request->charge_type) ? $request->charge_type : '0';
//        $addRide->charge_status = !empty($request->charge_status) ? $request->charge_status : '0';
//        $addRide->comment = !empty($request->comment) ? $request->comment : '';
        if ($addRide->save()) {
            return response()->json(['response' => 'success', 'message' => 'Ride added successfully', 'ride' => $addRide]);
        }
    }

    public function driverRating(Request $request) {
        $raring = new DriverRating;
        $raring->ride_id = $request->ride_id;
        $raring->passenger_id = $request->passenger_id;
        $raring->driver_id = $request->driver_id;
        $raring->rating_value = $request->rating_value;
        $raring->note = $request->note;
        if ($raring->save()) {
            return response()->json(['response' => 'success', 'message' => 'Pessanger rating added successfully', 'raring' => $raring]);
        }
    }

    public function cardAdd(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'passenger_id' => 'required|numeric',
            'cc_info' => 'required',
            'card_type' => 'required',
            'stripe_profile_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'expire_month' => 'required|numeric',
            'expire_year' => 'required|numeric',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $cardAdd = new PassengerPaymentInfo;
        $cardAdd->passenger_id = $request->passenger_id;
        $cardAdd->cc_info = $request->cc_info;
        $cardAdd->card_type = $request->card_type;
        $cardAdd->stripe_profile_id = $request->stripe_profile_id;
        $cardAdd->amount = $request->amount;
        $cardAdd->expire_month = $request->expire_month;
        $cardAdd->expire_year = $request->expire_year;
        if ($cardAdd->save()) {
            return response()->json(['response' => 'success', 'message' => 'Card info added successfully', 'cardAdd' => $cardAdd]);
        }
    }

    public function cardUpdate(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'card_id' => 'required|numeric',
            'passenger_id' => 'required|numeric',
            'cc_info' => 'required',
            'card_type' => 'required',
            'stripe_profile_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'expire_month' => 'required|numeric',
            'expire_year' => 'required|numeric',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $cardUpdate = PassengerPaymentInfo::findOrFail($request->card_id);
        $cardUpdate->passenger_id = $request->passenger_id;
        $cardUpdate->cc_info = $request->cc_info;
        $cardUpdate->card_type = $request->card_type;
        $cardUpdate->stripe_profile_id = $request->stripe_profile_id;
        $cardUpdate->amount = $request->amount;
        $cardUpdate->expire_month = $request->expire_month;
        $cardUpdate->expire_year = $request->expire_year;
        if ($cardUpdate->save()) {
            return response()->json(['response' => 'success', 'message' => 'Card info updated successfully', 'cardUpdate' => $cardUpdate]);
        }
    }

    public function cardDelete(Request $request) {
        $card = PassengerPaymentInfo::findOrFail($request->card_id);
        if ($card->delete()) {
            return response()->json(['response' => 'success', 'message' => 'Card info Deleted successfully']);
        }
    }

    public function helpAndSupport(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'subject' => 'required',
            'message' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $contact = new HelpAndSupport;
        $contact->first_name = $request->first_name;
        $contact->last_name = $request->last_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        $admins = User::where('status', '1')->select(DB::raw("CONCAT(first_name,' ',last_name) as adminName"), 'email')->get();

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'body_message' => $request->message,
        ];
        $fromName = $request->first_name . ' ' . $request->last_name;
        $fromEmail = $request->email;
        $subject = $request->subject;

        $mailArr = [];
        if ($admins->isNotEmpty()) {
            foreach ($admins as $admin) {
                $mailArr[] = $admin->email;
                $toEmail = $admin->email;
                $toName = $admin->adminName;
                Mail::send('email-template.helpCenter', $data, function($message) use($toEmail, $toName, $fromEmail, $subject, $fromName) {
                    $message->to($toEmail, $toName)->subject($subject);
                    $message->from($fromEmail, $fromName);
                });
            }
        }

        return response()->json(['response' => 'success', 'message' => 'Email Sent Successfully', 'toMail' => $mailArr, 'fromMail' => $fromEmail]);
    }

    public function rideHistory(Request $request) {

        $histories = CabRide::join('drivers', 'drivers.id', '=', 'cab_rides.driver_id')
                ->select('cab_rides.id as ride_id', 'cab_rides.passenger_id', 'cab_rides.driver_id',
                        'cab_rides.pickup_address', 'cab_rides.destination_address',
                        'cab_rides.total_fare_amount', 'cab_rides.bid_amount', 'cab_rides.ridestatus_id', 'cab_rides.created_at'
                        , 'drivers.full_name as driver_name', 'drivers.profile_photo as driver_photo')
                ->where('cab_rides.passenger_id', $request->passenger_id)
                ->orderBy('cab_rides.id', 'desc')
                ->get();



        $driverRatingByPassenger = DriverRating::where('passenger_id', $request->passenger_id)->pluck('rating_value', 'ride_id')->toArray();


        $historyArr = [];
        $i = 0;
        if ($histories->isNotEmpty()) {
            foreach ($histories as $history) {
                $historyArr[$i]['ride_id'] = $history->ride_id;
                $historyArr[$i]['passenger_id'] = $history->passenger_id;
                $historyArr[$i]['driver_id'] = $history->driver_id;
                $historyArr[$i]['driver_name'] = $history->driver_name;
                $historyArr[$i]['driver_photo'] = $history->driver_photo;
                $historyArr[$i]['driver_rating'] = !empty($driverRatingByPassenger[$history->ride_id]) ? $driverRatingByPassenger[$history->ride_id] : '';
                $historyArr[$i]['pickup_address'] = $history->pickup_address;
                $historyArr[$i]['destination_address'] = $history->destination_address;
                $historyArr[$i]['total_fare_amount'] = number_format($history->total_fare_amount, 2);
                $historyArr[$i]['bid_amount'] = number_format($history->bid_amount, 2);
                $historyArr[$i]['ridestatus_id'] = $history->ridestatus_id;
                $historyArr[$i]['created_at'] = date('F d,Y,g:i A', strtotime($history->created_at));
                $i++;
            }
        }
        
        return response()->json(['response' => 'success', 'rideHistory' => $historyArr]);
    }

    public function cancelHistory(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $histories = CabRide::join('drivers', 'drivers.id', '=', 'cab_rides.driver_id')
                ->select('cab_rides.id as ride_id', 'cab_rides.passenger_id', 'cab_rides.driver_id',
                        'cab_rides.pickup_address', 'cab_rides.destination_address',
                        'cab_rides.total_fare_amount', 'cab_rides.bid_amount', 'cab_rides.ridestatus_id', 'cab_rides.created_at'
                        , 'drivers.full_name as driver_name', 'drivers.profile_photo as driver_photo')
                ->where('cab_rides.passenger_id', $request->passenger_id)
                ->where('cab_rides.canceled_by_passenger',$request->passenger_id)
                ->orderBy('cab_rides.id', 'desc')
                ->get();

        $driverRatingByPassenger = DriverRating::where('passenger_id', $request->passenger_id)->pluck('rating_value', 'ride_id')->toArray();


        $historyArr = [];
        $i = 0;
        if ($histories->isNotEmpty()) {
            foreach ($histories as $history) {
                $historyArr[$i]['ride_id'] = $history->ride_id;
                $historyArr[$i]['passenger_id'] = $history->passenger_id;
                $historyArr[$i]['driver_id'] = $history->driver_id;
                $historyArr[$i]['driver_name'] = $history->driver_name;
                $historyArr[$i]['driver_photo'] = $history->driver_photo;
                $historyArr[$i]['driver_rating'] = !empty($driverRatingByPassenger[$history->ride_id]) ? $driverRatingByPassenger[$history->ride_id] : '';
                $historyArr[$i]['pickup_address'] = $history->pickup_address;
                $historyArr[$i]['destination_address'] = $history->destination_address;
                $historyArr[$i]['total_fare_amount'] = number_format($history->total_fare_amount, 2);
                $historyArr[$i]['bid_amount'] = number_format($history->bid_amount, 2);
                $historyArr[$i]['ridestatus_id'] = $history->ridestatus_id;
                $historyArr[$i]['created_at'] = date('F d,Y,g:i A', strtotime($history->created_at));
                $i++;
            }
        }
        
        return response()->json(['response' => 'success', 'rideHistory' => $historyArr]);
    }
    
    public function fareDetails(Request $request) {
//        echo "<pre>"; print_r($request->all());exit;
        $fareDetails = CabRide::join('drivers', 'drivers.id', '=', 'cab_rides.driver_id')
                ->join('cabs', 'cabs.id', '=', 'cab_rides.cab_id')
                ->join('cab_types','cab_types.id','=','cabs.cabtype_id')
                ->select('cab_rides.id as ride_id', 'cab_rides.passenger_id', 'cab_rides.driver_id', 'cab_rides.cab_id',
                        'cab_rides.pickup_address', 'cab_rides.destination_address',
                        'cab_rides.bid_amount','cab_rides.total_fare_amount', 'cab_rides.ridestatus_id', 'cab_rides.created_at',
                        'drivers.id as driver_id', 'drivers.full_name as driver_name',
                        'drivers.profile_photo as driver_photo','cab_types.type_name as cab_type','cabs.photo as cabs_photo')
                ->where('cab_rides.id', $request->ride_id)
                ->first();
        

       $driverRatingByPassenger = DriverRating::where('ride_id', $request->ride_id)->pluck('rating_value', 'ride_id')->toArray();
       
//        echo "<pre>"; print_r($driverRatingByPassenger);exit;
       
        $fareDetailsArr = [];
        if (!empty($fareDetails)) {
            $fareDetailsArr['ride_id'] = $fareDetails->ride_id;
            $fareDetailsArr['passenger_id'] = $fareDetails->passenger_id;
            $fareDetailsArr['cab_id'] = $fareDetails->cab_id;
            $fareDetailsArr['cabs_photo'] = $fareDetails->cabs_photo;
            $fareDetailsArr['cab_type'] = $fareDetails->cab_type;
            $fareDetailsArr['driver_id'] = $fareDetails->driver_id;
            $fareDetailsArr['driver_name'] = $fareDetails->driver_name;
            $fareDetailsArr['driver_photo'] = $fareDetails->driver_photo;
            $fareDetailsArr['driver_rating'] = !empty($driverRatingByPassenger[$fareDetails->ride_id]) ? $driverRatingByPassenger[$fareDetails->ride_id] : '';
            $fareDetailsArr['pickup_address'] = $fareDetails->pickup_address;
            $fareDetailsArr['destination_address'] = $fareDetails->destination_address;
            $fareDetailsArr['bid_amount'] = number_format($fareDetails->bid_amount, 2);
            $fareDetailsArr['total_fare_amount'] = number_format($fareDetails->total_fare_amount, 2);
            $fareDetailsArr['ridestatus_id'] = $fareDetails->ridestatus_id;
            
            $fareDetailsArr['created_at'] = date('F d,Y,g:i A', strtotime($fareDetails->created_at));
        }
        return response()->json(['response' => 'success', 'fareDetailsArr' => $fareDetailsArr]);
    }
    
    public function addBill(Request $request){
        $billAdd = new PassengerBill;
        $billAdd->transaction_id = $request->transaction_id;
        $billAdd->passenger_id = $request->passenger_id;
        $billAdd->amount = $request->amount;
        $billAdd->payment_status = $request->payment_status;
        if($billAdd->save()){
            return response()->json(['response' => 'success','message'=>'Passenger bill added successfully', 'billAdd' => $billAdd]);
        }
    }
    
    public function billList(Request $request){
//        echo "<pre>"; print_r($request->all());exit;
        $passengerBill = PassengerBill::where('passenger_id',$request->passenger_id)->get();
        
        if($passengerBill->isNotEmpty()){
            return response()->json(['response'=>'success','billList'=>$passengerBill]);
        }else{
            return response()->json(['response'=>'error','message'=>'No data found']);
        }
    }

}
