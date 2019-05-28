<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\verifyEmail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index1()
    {
        return redirect()->route('verifyOTP');
    }

    public function index()
    {
        return view('home');
    }

    public function sendEmail($thisUser){
        // $emailid = $thisUser->email;
        Mail::send(['text'=>'auth.sendOTP'],['otp'=>$thisUser->otp],function($message) use ($thisUser) {
            $message->to($thisUser->email,'to Japteg')->subject('OTP verification');
            $message->from('japteg.2698@gmail.com','Japteg');
        });
        // mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    

    public function verifyOTP(){
        $user = \Auth::user();
        // $thisUser = User::findOrFail($user->id);
        $this->sendEmail($user);

        return view('auth.verifyOTP');
        // return view(home);
    }

    public function checkOTP(){
        // return view('home');
        $user = \Auth::user();
        $otp = $user->otp;
        $input = $_POST['otp'];
        if($input==$otp){
           return redirect('/home');
        }else{
            return redirect('/verifyOTP');
        }
    }
}
