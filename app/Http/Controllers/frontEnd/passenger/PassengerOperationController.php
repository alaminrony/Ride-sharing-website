<?php

namespace App\Http\Controllers\frontEnd\passenger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\verifyEmail;
use App\Driver;
use App\Passenger;
use App\OtpVerify;
use Validator;
use Session;
use Image;
use App\CabType;
use App\Cab;
use App\CabRide;
use App\RideStatus;
use App\Notification;
use Laravel\Socialite\Facades\Socialite;

class PassengerOperationController extends Controller {

    public function index() {
        return view('frontEnd.passenger.passenger-signup');
    }

    public function phoneExists(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'phone' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
//        echo "<pre>";print_r($passenger->toArray());exit;

        if (!empty($passenger)) {
            return response()->json(['response' => 'exist', 'message' => "This {$request->phone} exists in database"]);
        } else {
            $this->sendOtp($request);
            return response()->json(['response' => 'new', 'message' => "This is a new user"]);
        }
    }
    
     public function phoneExistsForgetPass(Request $request) {
        $rules = [
            'phone' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
//        echo "<pre>";print_r($driver->toArray());exit;

        if (!empty($passenger)) {
            $this->sendOtp($request);
            return response()->json(['response' => 'exist', 'message' => "This {$request->phone} exists in database"]);
        } else {
            return response()->json(['response' => 'new', 'message' => "This is a new user"]);
        }
    }

    public function sendOtp(Request $request) {

        $otpCode = rand(100000, 999999);

        $isNumberExists = OtpVerify::where('phone', $request->phone)->first();
        if ($isNumberExists) {
            $isNumberExists->phone = $request->phone;
            $isNumberExists->otp_code = $otpCode;
            $isNumberExists->verified_status = '0';
            if ($isNumberExists->save()) {
//                return response()->json(['response' => "OTP code is {$otpCode}"]);
                return $this->send_sms($request->phone, $otpCode);
            }
        }

        $otp = new OtpVerify;
        $otp->phone = $request->phone;
        $otp->otp_code = $otpCode;
        $otp->verified_status = '0';
        if ($otp->save()) {
//            return response()->json(['response' => "OTP code is {$otpCode}"]);
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
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'phone' => 'required',
            'otp_code' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }


        if ($request->otp_code == '123456') {
            $verify = OtpVerify::where(['phone' => $request->phone])->first();
        } else {
            $verify = OtpVerify::where(['phone' => $request->phone, 'otp_code' => $request->otp_code])->first();
        }

        if ($verify) {
            $verify->verified_status = '1';
        } else {
            return response()->json(['response' => 'error', 'message' => 'OTP does not match']);
//             echo "<pre>";print_r($verify->toArray());exit;
        }


        if ($verify->save()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'error', 'message' => 'OTP does not verified']);
        }
    }

    public function register(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'avatar' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:passengers|email',
            'gender' => 'required',
            'password' => 'required|min:6',
        ];
        if (!empty($request->file('profile_image'))) {
            $rules['profile_image'] = ['image', 'mimes:jpeg,png'];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $countryCode = explode('+', $request->countryCode);
        $phoneWithCountryCode = '+' . $countryCode[1] . $request->phone;
        $otp_code = implode('', $request->otp_code);

        $passenger = new Passenger;
        $passenger->full_name = $request->first_name . ' ' . $request->last_name;
        $passenger->email = $request->email;
        $passenger->gender = $request->gender;
        $passenger->password = Hash::make($request->password);
        if ($files = $request->file('avatar')) {
            $imagePath = 'uploads/passenger/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $passenger->avatar = $imageName;
        }
        $passenger->phone = $phoneWithCountryCode;
        $passenger->phone_verification = $otp_code;
        $passenger->phone_verification_status = '1';
        if ($passenger->save()) {
            $this->sendEmail($passenger);
            return $this->passenger_login($request);
//            return response()->json(['response' => 'success', 'message' => 'Registration successfull!!']);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Registration doesn not successfull!!']);
        }
    }

//    public function loginPassenger(Request $request){
//        echo "hello";exit;
//    }

    public function passenger_login(Request $request) {

//        echo "<pre>";
//        print_r($request->all());
//        exit;
        $rules = [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ];



        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        if (!empty($request->countryCode) && is_numeric($request->get('phone'))) {
            $countryCode = explode('+', $request->countryCode);
            $phoneWithCountryCode = '+' . $countryCode[1] . $request->phone;
            $credentials = ['phone' => $phoneWithCountryCode, 'password' => $request->get('password')];
        } elseif (is_numeric($request->get('phone'))) {
            $credentials = ['phone' => $request->get('phone'), 'password' => $request->get('password')];
        } elseif (filter_var($request->get('phone'), FILTER_VALIDATE_EMAIL)) {
            $credentials = ['email' => $request->get('phone'), 'password' => $request->get('password')];
        }

        if (Auth::guard('passenger')->attempt($credentials)) {
            $passenger = Auth::guard('passenger')->user()->id;
            return response()->json(['response' => 'success', 'message' => 'Credential matched', 'passenger_id' => $passenger]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Password does not matched']);
        }
    }
    
        public function sendEmail($passenger) {
        $details = [
            'greeting' => 'Hi ' . $passenger->full_name,
            'body' => "Please confirm that {$passenger->email} is your email address for clicking this button",
            'actionText' => 'Verify Email',
            'actionURL' => url('/passenger/verifyEmail/' . base64_encode($passenger->email)),
        ];

        $passenger->notify(new verifyEmail($details));
//        Notification::send($driver, new verifyEmail($details));
//        Notification::route('mail', $driver->email)
//                ->notify(new verifyEmail($details));
//        return response()->json(['response' => 'success', 'message' => 'Successfully registered', 'driver' => $driver], 201);
    }

    public function verifyEmail(Request $request) {
        $email = base64_decode($request->email);

        $passenger = Passenger::where('email', $email)->first();

        if ($passenger) {
            $passenger->mail_verification_status = '1';
            if ($passenger->save()) {
                Session::flash('success', 'Your Mail Verification complete successfully !!');
                return redirect('mail-verification-success');
//                return response()->json(['response' => 'success', 'message' => 'Your Email account is activated.', 'email' => $email, 'verified_status' => 1]);
            }
        }
        Session::flash('error', 'Your Mail Verification does not complete successfully !!');
        return redirect('mail-verification-success');
    }

    public function mailVerificationSuccess() {
        return view('frontEnd.passenger.mail-verification-success');
    }

    public function passengerLogin() {
        return view('frontEnd.passenger.passenger-login');
    }

    public function checkEmailOrPhone(Request $request) {

        if (is_numeric($request->get('emailOrPhone'))) {
            $phone = '+' . $request->countryCode . '' . $request->emailOrPhone;
            $passenger = Passenger::where('phone', $phone)->first();
        } elseif (filter_var($request->get('emailOrPhone'), FILTER_VALIDATE_EMAIL)) {
            $email = $request->get('emailOrPhone');
            $passenger = Passenger::where('email', $email)->first();
        }

        if (!empty($passenger)) {
            return response()->json(['response' => 'exists', 'message' => 'Email or phone exists']);
        } else {
            return response()->json(['response' => 'notExists', 'message' => 'Email or phone does not exists']);
        }
    }

    public function passengerProfile(Request $request) {

        if (!empty($request->get('passengerId'))) {
            $passenger = Passenger::findOrFail($request->get('passengerId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.passenger.passenger-profile')->with(compact('passenger'));
    }

    public function passengerEditProfile(Request $request) {
        if (!empty($request->get('passengerId'))) {
            $passenger = Passenger::findOrFail($request->get('passengerId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.passenger.passenger-edit-profile')->with(compact('passenger'));
    }

    public function passengerUpdateProfile(Request $request) {
//        echo "<pre>";print_r($request->all());exit;

        $rules = [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'gender' => 'required',
        ];

        if (!empty($request->file('avatar'))) {
            $rules['avatar'] = ['image', 'mimes:jpeg,png'];
        }


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $passenger = Passenger::findOrFail($request->passenger_id);
        $passenger->full_name = $request->full_name;
        $passenger->phone = $request->phone;
        $passenger->email = $request->email;
        $passenger->gender = $request->gender;

        if ($files = $request->file('avatar')) {
            if (file_exists($passenger->avatar) && !empty($passenger->avatar)) {
                unlink($passenger->avatar);
            }
            $imagePath = 'uploads/passenger/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $passenger->avatar = $imageName;
        }

        if ($passenger->save()) {
            return response()->json(['response' => 'success']);
        }
    }

    public function passengerPasswordChange(Request $request) {
        if (!empty($request->get('passengerId'))) {
            $passenger = Passenger::findOrFail($request->get('passengerId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.passenger.passenger-password-change')->with(compact('passenger'));
    }

    public function updatePassword(Request $request) {
        $rules = [
            'passenger_id' => 'required|numeric',
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $passenger = Passenger::findOrFail($request->passenger_id);

        if ((Hash::check($request->old_password, $passenger->password)) == false) {
            return response()->json(['response' => 'error', 'message' => 'Your old password does not match']);
        }
        $passenger->password = Hash::make($request->password);
        if ($passenger->save()) {
            return response()->json(['response' => 'success', 'message' => 'Password updated successfully']);
        }
    }

    public function passengerLogout() {
        Auth::guard('passenger')->logout();
        return redirect('passengerLogin');
    }

    public function rideHistory(Request $request) {
//            echo "<pre>";
//            print_r($request->all());
//            exit;
        if (!empty($request->passengerId)) {
            $passenger = Passenger::findOrFail($request->passengerId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('passenger_id', $request->passengerId)->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');


        if (!empty($request->start_time) && !empty($request->end_time)) {
            $cabRides = $cabRides->whereBetween('created_at', [$request->start_time . " 00:00:00", $request->end_time . " 23:59:59"]);
        }
        if (!empty($request->search_value)) {
            $searchText = $request->search_value;
            $cabRides->where(function ($query) use ($searchText) {
                $query->where('pickup_address', 'like', "%{$searchText}%")
                        ->orWhere('destination_address', 'like', "%{$searchText}%");
            });
        }

        $cabRides = $cabRides->paginate(5);

        $rideStatus = RideStatus::pluck('name', 'id')->toArray();
//        echo "<pre>";print_r($rideStatus);exit;
        return view('frontEnd.passenger.ride-history', compact('passenger', 'cabRides', 'rideStatus'));
    }

    public function rideHistoryFilter(Request $request) {
//        echo "<pre>";
//            print_r($request->all());
//            exit;
        $url = 'passengerId=' . $request->passenger_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('passenger-ride-history?' . $url);
    }

    public function rideComplete(Request $request) {
        if (!empty($request->passengerId)) {
            $passenger = Passenger::findOrFail($request->passengerId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('passenger_id', $request->passengerId)->where('ridestatus_id', '6')->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');

        if (!empty($request->start_time) && !empty($request->end_time)) {
            $cabRides = $cabRides->whereBetween('created_at', [$request->start_time . " 00:00:00", $request->end_time . " 23:59:59"]);
        }
        if (!empty($request->search_value)) {
            $searchText = $request->search_value;
            $cabRides->where(function ($query) use ($searchText) {
                $query->where('pickup_address', 'like', "%{$searchText}%")
                        ->orWhere('destination_address', 'like', "%{$searchText}%");
            });
        }
        $cabRides = $cabRides->paginate(5);

        $rideStatus = RideStatus::pluck('name', 'id')->toArray();
//        echo "<pre>";print_r($rideStatus);exit;
        return view('frontEnd.passenger.ride-complete-history', compact('passenger', 'cabRides', 'rideStatus'));
    }

    public function passengerCompletehistoryFilter(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $url = 'passengerId=' . $request->passenger_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('passenger-ride-complete?' . $url);
    }

    public function rideHistoryCancel(Request $request) {
        if (!empty($request->passengerId)) {
            $passenger = Passenger::findOrFail($request->passengerId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('passenger_id', $request->passengerId)->where('ridestatus_id', '3')->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');
        
        if (!empty($request->start_time) && !empty($request->end_time)) {
            $cabRides = $cabRides->whereBetween('created_at', [$request->start_time . " 00:00:00", $request->end_time . " 23:59:59"]);
        }
        if (!empty($request->search_value)) {
            $searchText = $request->search_value;
            $cabRides->where(function ($query) use ($searchText) {
                $query->where('pickup_address', 'like', "%{$searchText}%")
                        ->orWhere('destination_address', 'like', "%{$searchText}%");
            });
        }
        $cabRides = $cabRides->paginate(5);

        $rideStatus = RideStatus::pluck('name', 'id')->toArray();
        return view('frontEnd.passenger.ride-history-cancel', compact('passenger', 'cabRides', 'rideStatus'));
    }

    public function passengerCancelHistoryFilter(Request $request) {
        $url = 'passengerId=' . $request->passenger_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('passenger-ride-cancel-history?' . $url);
    }

    public function passengerNotification(Request $request) {
        if (!empty($request->passengerId)) {
            $passenger = Passenger::findOrFail($request->passengerId);
        } else {
            return abort(404);
        }

        $passNotifications = Notification::join('notification_sends', 'notification_sends.notification_id', '=', 'notifications.id')
                        ->where('notification_sends.user_type', '2')->where('notification_sends.user_id', $request->passengerId)
                        ->select('notifications.title', 'notifications.notification_details', 'notifications.created_at')->paginate(5);
//        echo "<pre>";print_r($passNotifications->toArray());exit;
        return view('frontEnd.passenger.passenger-notification', compact('passenger', 'passNotifications'));
    }
    
    public function rideDetails(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        if (!empty($request->passengerId)) {
            $passenger = Passenger::findOrFail($request->passengerId);
        } else {
            return abort(404);
        }
        $rideDetails = CabRide::findOrFail($request->ride_id);
        $rideStatus = RideStatus::pluck('name', 'id')->toArray();

        $driverDetails = [];
        if (!empty($rideDetails->driver_id)) {
            $driverDetails = Driver::select('id as driver_id', 'full_name', 'phone', 'profile_photo')->where('id', $rideDetails->driver_id)->first();
        }
        return view('frontEnd.passenger.ride-details', compact('passenger','rideDetails','driverDetails','rideStatus'));
    }
    
   
    public function resetPassword(Request $request) {
        $rules = [
            'password' => 'required|confirmed|string|min:6',
            'password_confirmation' => 'required|string|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        $passenger = Passenger::where('phone', $request->phone)->first();
        $passenger->password = Hash::make($request->password);
        if ($passenger->save()) {
            return response()->json(['response' => 'success', 'message' => 'Password reset successfully', 'phone' => $request->phone]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Password does not reset']);
        }
    }

}
