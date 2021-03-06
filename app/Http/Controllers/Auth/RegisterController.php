<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Mail;
use App\Mail\verifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home1';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'otp' => rand(1000,9999),
        ]);

        // $thisUser = User::findOrFail($user->id);
        // $this->sendEmail($thisUser);

        // return $user;
    }

    // public function callSendEmail(){
    //     $thisUser = User::findOrFail($user->id);
    //     $this->sendEmail($thisUser);
    // }

    // public function sendEmail($thisUser){
    //     Mail::send(['text'=>'auth.sendOTP'],['otp'=>$thisUser->otp],function($message){
    //         $message->to('japteg.2698@gmail.com','to Japteg')->subject('OTP verification');
    //         $message->from('japteg.2698@gmail.com','Japteg');
    //     });
        // mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    // public function verifyOT(){
        // $thisUser = User::findOrFail($user->id);
        // $this->sendEmail($thisUser);

        // return view('auth.verifyOTP');
        // return view(home);
    // }
}
