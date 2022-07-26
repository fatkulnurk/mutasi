<?php

namespace App\Services\Crawlers\Drivers\OvoNamdevel;

use App\Models\Bank;
use App\Models\Service;
use App\Models\User;
use App\Services\Crawlers\Contracts\DriverInterface;
use Illuminate\Database\Eloquent\Model;
use Namdevel\Ovo;
use Ramsey\Uuid\Uuid;
use Stelin\OVOID;

class OVOService implements DriverInterface
{
    public function make(Model|User $user, Model|Bank $bank, array $options = [])
    {
        // TODO: Implement make() method.
    }

    public function requestOTP(Model|User $user, Model|Bank $bank, array $options = [])
    {
        $app = new Ovo();
        echo $app->sendOtp('+628XXXXXXXXXX');
    }

    public function validationOTP(Model|User $user, Model|Bank $bank, array $options = [])
    {
        $app = new Ovo();
        echo $app->OTPVerify('+628XXXXXXXXXX', '<otp_ref_id>', '<otp_code / otp_link_code>');
        echo $app->getAuthToken('+628XXXXXXXXXX', '<otp_ref_id>', '<otp_token>', '<security_code>');
    }
}