<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckOtpRequest;
use App\Http\Requests\SendOtpRequest;
use App\Models\User;
use App\Notifications\OtpNotification;
use Ichtrojan\Otp\Otp;

class ForgetPasswordController extends Controller
{
    public function showEnterEmail()
    {
        return view('website.auth.password.email');
    }

    public function sendOtp(SendOtpRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Enter your email correctly']);
        }

        $user->notify(new OtpNotification());

        return redirect()->route('showEnterOtp', ['email' => $user->email]);
    }

    public function showEnterOtp($email)
    {
        return view('website.auth.password.code', ['email' => $email]);
    }

    public function checkOtp(CheckOtpRequest $request)
    {
        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4;

        $otp = (new Otp)->validate($request->email, $code);

        if (!$otp->status) {
            return redirect()->back()->withErrors(['error' => 'Invalid code']);
        }

        session([
            'otp_verified_email' => $request->email,
            'otp_verified_code' => $code,
        ]);

        return redirect()->route('showResetPassword', ['email' => $request->email, 'code' => $code]);
    }
}
