<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    public function showForgetPasswordForm(){
        return view('auth.passwords.reset');
    }

    public function showResetPasswordForm($token){

        return view('auth.passwords.newpassword',[
            'token'=>$token
        ]);
    }
    public function submitForgetPasswordForm(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=> Carbon::now()
        ]);

        Mail::send('email.forgetPassword',['token'=>$token], function($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');

    }

    public function submitResetPasswordForm(Request $request){
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);


        $updatePassword = DB::table('password_resets')
                        ->where([
                            'token'=>$request->token
                        ])
                        ->first();
        if(!$updatePassword){
            return back()->withInput()->with('message','Invalid Token');
        }
        $user = User::where('email',$updatePassword->email)
                    ->update([
                        'password'=>Hash::make($request->password)
                    ]);
        DB::table('password_resets')->where('email',$updatePassword->email)->delete();

        return redirect()->route('login')->with('message','Password Berhasil di Ubah Silahkan Login');
    }

    use SendsPasswordResetEmails;
}
