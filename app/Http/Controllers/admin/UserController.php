<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Group;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::latest()->paginate(5);
        return view('backEnd.users.index', compact('users'))
                        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $groups = Group::all()->pluck('name', 'id');
        return view('backEnd.users.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
//        echo "<pre>";
//        print_r($request->all());
//        exit;
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'group_id' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:6',
                // 'status' => 'required',
        ]);

        $activation_code = rand(000000, 999999);

        $user = New User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->status = 0;
        // $user->status = $request->status;
        $user->activation_code = $activation_code;
        $user->ip_address = $_SERVER['REMOTE_ADDR'];
        $user->last_ip_address = $_SERVER['REMOTE_ADDR'];
        $user->group_id = $request->group_id;
        $user->password = Hash::make($request->password);
        if ($user->save()) {

            $code = base64_encode($activation_code);
            $link = url('/mailvarification') . "/$user->id/$code";

            if ($request->notify == 1) {

                $toEmail = trim($request->email);
                $toName = $user->first_name . ' ' . $user->last_name;
                $subject = 'Fare trim admin confirmation';


                $data = [
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'email' => $request->email,
                    'subject' => 'Fare trim admin confirmation',
                    'link' => $link,
                    'status' => 'Pending',
                    'password' => $request->password,
                ];

                Mail::send('email-template.userEmail',['data'=>$data], function($message) use($toEmail, $toName,$subject) {
                    $message->to($toEmail, $toName)->subject($subject);
                    $message->from('info@faretrim.com.au', 'Fare Trim');
                });
            }

            return redirect()->route('user.index')
                            ->with('success', 'User created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::where('id',$id)->first();
        return view('backEnd.users.modal',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {
        $groups = Group::all()->pluck('name', 'id');
        return view('backEnd.users.edit', compact('user', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {
//         echo "<pre>";print_r($request->all());exit;

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'group_id' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'status' => 'required',
        ]);
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'sometimes|min:6|same:confirm_password',
                'confirm_password' => 'sometimes|min:6',
            ]);
        }

        $user = User::WHERE('id', $user->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->group_id = $request->group_id;
        $user->last_ip_address = $_SERVER['REMOTE_ADDR'];

        if (!empty($request->password)) {

            $user->password = Hash::make($request->password);
        }

        if($user->save()){
            if ($request->notify == 1) {

                $toEmail = trim($request->email);
                $toName = $user->first_name . ' ' . $user->last_name;
                $subject = 'your Fare trim Profile Updated';

                $data = [
                    'name' => $user->first_name . ' ' . $user->last_name,
                    'email' => $request->email,
                    'subject' => 'your Fare trim Profile Updated',
                    'password' => $request->password,
                    'gender'=>$user->gender,
                    'phone'=>$request->phone,
                ];

                Mail::send('email-template.userUpdate',['data'=>$data], function($message) use($toEmail, $toName,$subject) {
                    $message->to($toEmail, $toName)->subject($subject);
                    $message->from('faretrim@gmail.com', 'Fare Trim');
                });
            }
            return redirect()->route('user.index')
                        ->with('success', 'User Updated successfully.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('user.index')
                        ->with('success', 'User deleted successfully');
    }

    public function mailvarification(Request $request) {
        $id = $request->id;
        $code = base64_decode($request->code);

        $user = User::WHERE('id', $id)
                ->WHERE('activation_code', $code)
                ->first();

        if (!empty($user)) {
            $user->status = 1;
            $user->active = 1;
            $user->activation_code = null;
            $user->save();

            return redirect('/login')->with('success', 'your email is now varified.you can login now.');
        }
    }

}
