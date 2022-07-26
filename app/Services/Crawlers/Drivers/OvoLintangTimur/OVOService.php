<?php

namespace App\Services\Crawlers\Drivers\OvoLintangTimur;

use App\Models\Bank;
use App\Models\Service;
use App\Models\User;
use App\Services\Crawlers\Contracts\DriverInterface;
use Illuminate\Database\Eloquent\Model;

class OVOService implements DriverInterface
{
    public function make(Model|User $user, Model|Bank $bank, array $options = [])
    {
        // TODO: Implement make() method.
    }

    public function requestOTP(Model|User $user, Model|Bank $bank, array $options = [])
    {
        // TODO: Implement requestOTP() method.
    }

    public function validationOTP(Model|User $user, Model|Bank $bank, array $options = [])
    {
        // TODO: Implement validationOTP() method.
    }
}