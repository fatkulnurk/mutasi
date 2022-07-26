<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Namdevel\Ovo;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        return view('dashboard.index');

        $app = new Ovo();

        $phoneNumber = '+6285607100255';
        $sendOtp = $app->sendOtp('+6285607100255');
        $data = collect($sendOtp)->toArray();

        if ($data['response_code'] != 'OV00000') {
            throw new \Exception('Gagal, request OTP failed');
        }
        $otpRefId = $data['data']['otp']['otp_ref_id'];

        echo $app->OTPVerify($phoneNumber, $otpRefId, '<otp_code / otp_link_code>');
        echo $app->getAuthToken('+628XXXXXXXXXX', '<otp_ref_id>', '<otp_token>', '<security_code>');

        return $sendOtp;
    }
}
