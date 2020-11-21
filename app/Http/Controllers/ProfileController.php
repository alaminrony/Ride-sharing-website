<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Session;
use App\User;

class ProfileController extends Controller {

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit() {
        return view('backEnd.profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
                    'first_name' => ['required', 'min:3'],
                    'last_name' => ['required', 'min:3'],
                    'email' => ['required', 'email', Rule::unique((new User)->getTable())->ignore(auth()->id())],
        ]);

        if ($validator->fails()) {
            return redirect('profile')->withInput()->withErrors($validator);
        }
//        echo "<pre>";print_r(auth()->id());exit;
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($user->save()) {
            Session::flash('status', 'Profile successfully updated');
            return redirect()->back();
        }
//        auth()->user()->update($request->all());
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request) {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
    public function profile_image(Request $request) {
//       echo "<pre>";print_r($request->all());exit;
       if (!empty($request->file('profile_image'))) {
            $rules['profile_image'] = ['required', 'image', 'mimes:jpeg,png'];
        }

        $message = [
            'profile_image.required' => 'Profile photo is required',
        ];


        $validator = Validator::make($request->all(), $rules, $message);

        if ($validator->fails()) {
            return redirect('profile')->withErrors($validator);
        }
        
        $user = User::findOrFail(auth()->user()->id);
        
        if ($files = $request->file('profile_image')) {
            $imagePath = 'uploads/user/profile_photo/';
            $imageName = $imagePath . '' . uniqid() . "." . date('Ymd') . "." . $files->getClientOriginalExtension();
            $files->move($imagePath, $imageName);
            $user->profile_image = $imageName;
        }
        
        if($user->save()){
          Session::flash('status', 'Profile photo added successfully');
          return redirect('profile');  
        }

        
    }

}
