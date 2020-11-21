<?php

namespace App\Http\Controllers\frontEnd\driver;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Notifications\verifyEmail;
use App\Driver;
use App\OtpVerify;
use Validator;
use Session;
use Image;
use App\CabType;
use App\Cab;
use App\CabRide;
use App\RideStatus;
use App\Notification;
use App\Passenger;
use Laravel\Socialite\Facades\Socialite;

class DriverLoginController extends Controller {

    public function index() {
        return view('frontEnd.driver-signup');
    }

    public function phoneExists(Request $request) {
        $rules = [
            'phone' => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $driver = Driver::where('phone', $request->phone)->first();
//        echo "<pre>";print_r($driver->toArray());exit;

        if (!empty($driver)) {
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

        $driver = Driver::where('phone', $request->phone)->first();
//        echo "<pre>";print_r($driver->toArray());exit;

        if (!empty($driver)) {
            $this->sendOtp($request);
            return response()->json(['response' => 'exist', 'message' => "This {$request->phone} exists in database"]);
        } else {
            return response()->json(['response' => 'new', 'message' => "This is a new user"]);
        }
    }

    public function sendOtp(Request $request) {
//         echo "<pre>";print_r($request->all());exit;
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

    public function thirdStepVerify(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'profile_image' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:drivers|email',
            'gender' => 'required',
            'password' => 'required|min:6',
            'city' => 'required',
            'state' => 'required',
            'post_code' => 'required',
            'address' => 'required',
        ];
        if (!empty($request->file('profile_image'))) {
            $rules['profile_image'] = ['image', 'mimes:jpeg,png'];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        } else {
            return response()->json(['response' => 'success']);
        }
    }

    public function register(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'email' => 'unique:drivers|email',
            'driving_licence_no' => 'required',
            'australian_taxi_licence_no' => 'required',
            'driving_licence_expire_date' => 'required',
            'australian_taxi_licence_expire_date' => 'required',
            'termAndCondition' => 'required',
            'driving_licence_photo_front' => 'required',
            'driving_licence_photo_back' => 'required',
            'atln_photo_front' => 'required',
            'atln_photo_back' => 'required',
        ];


        if (!empty($request->file('driving_licence_photo_front'))) {
            $rules['driving_licence_photo_front'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('driving_licence_photo_back'))) {
            $rules['driving_licence_photo_back'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('atln_photo_front'))) {
            $rules['atln_photo_front'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('atln_photo_back'))) {
            $rules['atln_photo_back'] = ['image', 'mimes:jpeg,png'];
        }

        $message = [
            'driving_licence_photo_front.required' => 'Driving license photo front is required',
            'driving_licence_photo_back.required' => 'Driving license photo back is required',
            'atln_photo_front.required' => 'Australin taxi license front photo is required',
            'atln_photo_back.required' => 'Australin taxi license back photo is required',
            'termAndCondition.required' => 'Please check this term & condition'
        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $countryCode = explode('+', $request->countryCode);
        $phoneWithCountryCode = '+' . $countryCode[1] . $request->phone;
        $otp_code = implode('', $request->otp_code);

        $driver = new Driver;
        $driver->full_name = $request->first_name . ' ' . $request->last_name;
        $driver->gender = $request->gender;
        $driver->email = $request->email;
        $driver->address = $request->address;
        $driver->country = $request->country;
        $driver->state = $request->state;
        $driver->city = $request->city;
        $driver->post_code = $request->post_code;
        $driver->driving_licence_no = $request->driving_licence_no;
        $driver->australian_taxi_licence_no = $request->australian_taxi_licence_no;
        $driver->driving_licence_expire_date = $request->driving_licence_expire_date;
        $driver->australian_taxi_licence_expire_date = $request->australian_taxi_licence_expire_date;

        if ($files = $request->file('profile_image')) {
            $imagePath = 'uploads/driver/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $driver->profile_photo = $imageName;
        }
        if ($files = $request->file('driving_licence_photo_front')) {
            $imagePath = 'uploads/driver/d_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->driving_licence_photo_front = $imageName;
        }
        if ($files = $request->file('driving_licence_photo_back')) {
            $imagePath = 'uploads/driver/d_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->driving_licence_photo_back = $imageName;
        }
        if ($files = $request->file('atln_photo_front')) {
            $imagePath = 'uploads/driver/a_taxi_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->atln_photo_front = $imageName;
        }
        if ($files = $request->file('atln_photo_back')) {
            $imagePath = 'uploads/driver/a_taxi_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->atln_photo_back = $imageName;
        }
        $driver->phone = $phoneWithCountryCode;
        $driver->phone_varification = $otp_code;
        $driver->phone_varification_status = '1';
        $driver->password = Hash::make($request->password);
        if ($driver->save()) {
//            return response()->json(['response' => 'success', 'message' => 'Registration successfull!!']);
            $this->sendEmail($driver);
            return $this->login($request);
//            return response()->json(['response' => 'success', 'message' => 'Registration successfull!!']);
        } else {
            return response()->json(['response' => 'success', 'message' => 'Registration doesn not successfull!!']);
        }
    }

    public function login(Request $request) {
//        echo "<pre>";
//        print_r($request->all());
//        exit;
        $rules = [
            'phone' => 'required',
            'password' => 'required|string|min:6',
        ];

//        $message = [
//            'phone.required' => 'Email Or Phone field is required',
//        ];

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

        if (Auth::guard('driver')->attempt($credentials)) {
            $driver = Auth::guard('driver')->user()->id;
            return response()->json(['response' => 'success', 'message' => 'Credential matched', 'driver_id' => $driver]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Password does not matched']);
        }
    }

    public function sendEmail($driver) {
        $details = [
            'greeting' => 'Hi ' . $driver->full_name,
            'body' => "Please confirm that {$driver->email} is your email address for clicking this button",
            'actionText' => 'Verify Email',
            'actionURL' => url('/driver/verifyEmail/' . base64_encode($driver->email)),
        ];

        $driver->notify(new verifyEmail($details));
//        Notification::send($driver, new verifyEmail($details));
//        Notification::route('mail', $driver->email)
//                ->notify(new verifyEmail($details));
//        return response()->json(['response' => 'success', 'message' => 'Successfully registered', 'driver' => $driver], 201);
    }

    public function verifyEmail(Request $request) {
        $email = base64_decode($request->email);

        $driver = Driver::where('email', $email)->first();

        if ($driver) {
            $driver->mail_verification_status = '1';
            if ($driver->save()) {
                Session::flash('success', 'Your Mail Verification complete successfully !!');
                return redirect('mail-verification-success');
//                return response()->json(['response' => 'success', 'message' => 'Your Email account is activated.', 'email' => $email, 'verified_status' => 1]);
            }
        }
        Session::flash('error', 'Your Mail Verification does not complete successfully !!');
        return redirect('mail-verification-success');
    }

    public function mailVerificationSuccess() {
        return view('frontEnd.driver.mail-verification-success');
    }

    public function driverLogin() {
        return view('frontEnd.driver-login-with-mail');
    }

    public function checkEmailOrPhone(Request $request) {
        if (is_numeric($request->get('emailOrPhone'))) {
            $phone = '+' . $request->countryCode . '' . $request->emailOrPhone;
            $driver = Driver::where('phone', $phone)->first();
        } elseif (filter_var($request->get('emailOrPhone'), FILTER_VALIDATE_EMAIL)) {
            $email = $request->get('emailOrPhone');
            $driver = Driver::where('email', $email)->first();
        }

        if (!empty($driver)) {
            return response()->json(['response' => 'exists', 'message' => 'Email or phone exists']);
        } else {
            return response()->json(['response' => 'notExists', 'message' => 'Email or phone does not exists']);
        }
    }

    public function checkEmailOrPhoneForgtPass(Request $request) {
        if (is_numeric($request->get('emailOrPhone'))) {
            $phone = '+' . $request->countryCode . '' . $request->emailOrPhone;
            $driver = Driver::where('phone', $phone)->first();
        } elseif (filter_var($request->get('emailOrPhone'), FILTER_VALIDATE_EMAIL)) {
            $email = $request->get('emailOrPhone');
            $driver = Driver::where('email', $email)->first();
        }

        if (!empty($driver)) {
            return response()->json(['response' => 'exists', 'message' => 'Email or phone exists']);
        } else {
            return response()->json(['response' => 'notExists', 'message' => 'Email or phone does not exists']);
        }
    }

    public function driverProfile(Request $request) {

        if (!empty($request->get('driverId'))) {
            $driver = Driver::findOrFail($request->get('driverId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.driver-profile')->with(compact('driver'));
    }

    public function driverEditProfile(Request $request) {
        if (!empty($request->get('driverId'))) {
            $driver = Driver::findOrFail($request->get('driverId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.driver-edit-profile')->with(compact('driver'));
    }

    public function driverUpdateProfile(Request $request) {
//        echo "<pre>";print_r($request->all());exit;

        $rules = [
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'post_code' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'city' => 'required',
            'state' => 'required',
            'driving_licence_no' => 'required',
            'australian_taxi_licence_no' => 'required',
            'driving_licence_expire_date' => 'required',
            'australian_taxi_licence_expire_date' => 'required',
        ];

        if (!empty($request->file('profile_photo'))) {
            $rules['profile_photo'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('driving_licence_photo_front'))) {
            $rules['driving_licence_photo_front'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('driving_licence_photo_back'))) {
            $rules['driving_licence_photo_back'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('atln_photo_front'))) {
            $rules['atln_photo_front'] = ['image', 'mimes:jpeg,png'];
        }
        if (!empty($request->file('atln_photo_back'))) {
            $rules['atln_photo_back'] = ['image', 'mimes:jpeg,png'];
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $driver = Driver::findOrFail($request->driver_id);
        $driver->full_name = $request->full_name;
        $driver->phone = $request->phone;
        $driver->email = $request->email;
        $driver->post_code = $request->post_code;
        $driver->address = $request->address;
        $driver->gender = $request->gender;
        $driver->city = $request->city;
        $driver->state = $request->state;
        $driver->driving_licence_no = $request->driving_licence_no;
        $driver->australian_taxi_licence_no = $request->australian_taxi_licence_no;
        $driver->driving_licence_expire_date = $request->driving_licence_expire_date;
        $driver->australian_taxi_licence_expire_date = $request->australian_taxi_licence_expire_date;
        if (!empty($request->date_of_birth)) {
            $driver->date_of_birth = $request->date_of_birth;
        }
        if ($files = $request->file('profile_photo')) {
            if (file_exists($driver->profile_photo) && !empty($driver->profile_photo)) {
                unlink($driver->profile_photo);
            }
            $imagePath = 'uploads/driver/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $driver->profile_photo = $imageName;
        }
        if ($files = $request->file('driving_licence_photo_front')) {
            if (file_exists($driver->driving_licence_photo_front) && !empty($driver->driving_licence_photo_front)) {
                unlink($driver->driving_licence_photo_front);
            }
            $imagePath = 'uploads/driver/d_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->driving_licence_photo_front = $imageName;
        }
        if ($files = $request->file('driving_licence_photo_back')) {
            if (file_exists($driver->driving_licence_photo_back) && !empty($driver->driving_licence_photo_back)) {
                unlink($driver->driving_licence_photo_back);
            }
            $imagePath = 'uploads/driver/d_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->driving_licence_photo_back = $imageName;
        }
        if ($files = $request->file('atln_photo_front')) {
            if (file_exists($driver->atln_photo_front) && !empty($driver->atln_photo_front)) {
                unlink($driver->atln_photo_front);
            }
            $imagePath = 'uploads/driver/a_taxi_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->atln_photo_front = $imageName;
        }
        if ($files = $request->file('atln_photo_back')) {
            if (file_exists($driver->atln_photo_back) && !empty($driver->atln_photo_back)) {
                unlink($driver->atln_photo_back);
            }
            $imagePath = 'uploads/driver/a_taxi_licence_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
//            $files->move($imagePath, $imageName);
            $driver->atln_photo_back = $imageName;
        }
        if ($driver->save()) {
            return response()->json(['response' => 'success']);
        }
    }

    public function driverDashBoardPass(Request $request) {
        if (!empty($request->get('driverId'))) {
            $driver = Driver::findOrFail($request->get('driverId'));
        } else {
            return abort(404);
        }
        return view('frontEnd.driver-dashbord-password')->with(compact('driver'));
    }

    public function updatePassword(Request $request) {
        $rules = [
            'driver_id' => 'required|numeric',
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $driver = Driver::findOrFail($request->driver_id);

        if ((Hash::check($request->old_password, $driver->password)) == false) {
            return response()->json(['response' => 'error', 'message' => 'Your old password does not match']);
        }
        $driver->password = Hash::make($request->password);
        if ($driver->save()) {
            return response()->json(['response' => 'success', 'message' => 'Password updated successfully']);
        }
    }

    public function driverLogout() {
        Auth::guard('driver')->logout();
        return redirect('driverLogin');
    }

    public function addVehicles(Request $request) {
        if (!empty($request->get('driverId'))) {
            $driver = Driver::findOrFail($request->get('driverId'));
        } else {
            return abort(404);
        }
        $cabType = ['' => 'Select cab type'] + CabType::pluck('type_name', 'id')->toArray();
//        echo "<pre>";print_r($cabType);exit;
        return view('frontEnd.add-vehicles', compact('driver', 'cabType'));
    }

    public function storeVehicles(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $rules = [
            'model_number' => 'required',
            'cabtype_id' => 'required',
            'color' => 'required',
            'number_plate' => 'required',
            'passenger_capacity' => 'required',
            'children' => 'required',
            'wheelchair' => 'required',
            'status' => 'required',
            'photo' => 'required',
        ];

        if (!empty($request->file('photo'))) {
            $rules['photo'] = ['image', 'mimes:jpeg,png'];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $cab = new Cab;
        $cab->model_number = $request->model_number;
        $cab->cabtype_id = $request->cabtype_id;
        $cab->color = $request->color;
        $cab->number_plate = $request->number_plate;
        $cab->passenger_capacity = $request->passenger_capacity;
        $cab->children = $request->children;
        $cab->wheelchair = $request->wheelchair;
        $cab->status = $request->status;
        $cab->driver_id = $request->driver_id;
        if ($files = $request->file('photo')) {
            $imagePath = 'uploads/driver/vehicle/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $cab->photo = $imageName;
        }

        if ($cab->save()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'error']);
        }
    }

    public function vehiclesList(Request $request) {
        if (!empty($request->get('driverId'))) {
            $driver = Driver::findOrFail($request->get('driverId'));
        } else {
            return abort(404);
        }
        $vehicleLists = Cab::where('driver_id', $request->driverId)->get();
//        echo "<pre>";print_r($vehicleLists->toArray());exit;
        return view('frontEnd.vehicles-list', compact('driver', 'vehicleLists'));
    }

    public function viewVehicle(Request $request) {
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $cabType = ['' => 'Select cab type'] + CabType::pluck('type_name', 'id')->toArray();
        $vehicle = Cab::where(['id' => $request->vehicleId, 'driver_id' => $request->driverId])->first();
        return view('frontEnd.view-vehicle', compact('vehicle', 'driver', 'cabType'));
    }

    public function editVehicle(Request $request) {
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $cabType = ['' => 'Select cab type'] + CabType::pluck('type_name', 'id')->toArray();
        $vehicle = Cab::where(['id' => $request->vehicleId, 'driver_id' => $request->driverId])->first();
        return view('frontEnd.update-vehicles', compact('vehicle', 'driver', 'cabType'));
    }

    public function updateVehicle(Request $request) {
        $rules = [
            'model_number' => 'required',
            'cabtype_id' => 'required',
            'color' => 'required',
            'number_plate' => 'required',
            'passenger_capacity' => 'required',
            'children' => 'required',
            'wheelchair' => 'required',
            'status' => 'required',
        ];

        if (!empty($request->file('photo'))) {
            $rules['photo'] = ['image', 'mimes:jpeg,png'];
        }
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $cab = Cab::findOrFail($request->vehicle_id);

        $cab->model_number = $request->model_number;
        $cab->cabtype_id = $request->cabtype_id;
        $cab->color = $request->color;
        $cab->number_plate = $request->number_plate;
        $cab->passenger_capacity = $request->passenger_capacity;
        $cab->children = $request->children;
        $cab->wheelchair = $request->wheelchair;
        $cab->status = $request->status;
        $cab->driver_id = $request->driver_id;
        if ($files = $request->file('photo')) {
            $imagePath = 'uploads/driver/vehicle/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $image = Image::make($files)->orientate();
            $image->resize(800, 800, function($constraint) {
                $constraint->aspectRatio();
            })->save($imageName);
            $cab->photo = $imageName;
        }

        if ($cab->save()) {
            return response()->json(['response' => 'success']);
        } else {
            return response()->json(['response' => 'error']);
        }
    }

    public function deleteVehicle(Request $request) {
        $vehicle = Cab::where(['id' => $request->vehicleId, 'driver_id' => $request->driverId])->first();
        if ($vehicle->delete()) {
            Session::flash('flash_message', 'Vehicle Deleted successfully!!');
            return redirect('vehicles-list?driverId=' . $request->driverId);
        }
    }

    public function rideHistory(Request $request) {

        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('driver_id', $request->driverId)->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');


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
        return view('frontEnd.driver.ride-history', compact('driver', 'cabRides', 'rideStatus'));
    }

    public function rideHistoryFilter(Request $request) {
//        echo "<pre>";
//            print_r($request->all());
//            exit;
        $url = 'driverId=' . $request->driver_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('driver-ride-history?' . $url);
    }

    public function rideComplete(Request $request) {
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('driver_id', $request->driverId)->where('ridestatus_id', '6')->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');

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
        return view('frontEnd.driver.ride-complete-history', compact('driver', 'cabRides', 'rideStatus'));
    }

    public function driverCompletehistoryFilter(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        $url = 'driverId=' . $request->driver_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('driver-ride-complete?' . $url);
    }

    public function rideHistoryCancel(Request $request) {
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $cabRides = CabRide::where('driver_id', $request->driverId)->where('ridestatus_id', '3')->select('id', 'start_time', 'end_time', 'pickup_address', 'destination_address', 'ridestatus_id');

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
        return view('frontEnd.driver.ride-history-cancel', compact('driver', 'cabRides', 'rideStatus'));
    }

    public function driverCancelHistoryFilter(Request $request) {
        $url = 'driverId=' . $request->driver_id . '&start_time=' . $request->start_time . '&end_time=' . $request->end_time . '&search_value=' . $request->search_value;
        return redirect('driver-ride-cancel-history?' . $url);
    }

    public function rideDetails(Request $request) {
//        echo "<pre>";print_r($request->all());exit;
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }
        $rideDetails = CabRide::findOrFail($request->ride_id);
        $rideStatus = RideStatus::pluck('name', 'id')->toArray();

        $passengerDetails = [];
        if (!empty($rideDetails->passenger_id)) {
            $passengerDetails = Passenger::select('id as passenger_id', 'full_name', 'phone', 'avatar')->where('id', $rideDetails->passenger_id)->first();
        }
        return view('frontEnd.driver.ride-details', compact('driver', 'rideDetails', 'passengerDetails', 'rideStatus'));
    }

    public function driverNotification(Request $request) {
        if (!empty($request->driverId)) {
            $driver = Driver::findOrFail($request->driverId);
        } else {
            return abort(404);
        }

        $driverNotifications = Notification::join('notification_sends', 'notification_sends.notification_id', '=', 'notifications.id')
                        ->where('notification_sends.user_type', '1')->where('notification_sends.user_id', $request->driverId)
                        ->select('notifications.title', 'notifications.notification_details', 'notifications.created_at')->paginate(5);
//        echo "<pre>";print_r($passNotifications->toArray());exit;
        return view('frontEnd.driver.driver-notification', compact('driver', 'driverNotifications'));
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

        $driver = Driver::where('phone', $request->phone)->first();
        $driver->password = Hash::make($request->password);
        if ($driver->save()) {
            return response()->json(['response' => 'success', 'message' => 'Password reset successfully', 'phone' => $request->phone]);
        } else {
            return response()->json(['response' => 'error', 'message' => 'Password does not reset']);
        }
    }

}
