<?php

namespace App\Services\Crawlers\Contracts;

use App\Models\Bank;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface DriverInterface
{
    public function make(User|Model $user, Bank|Model $bank, array $options = []);
    public function requestOTP(User|Model $user, Bank|Model $bank, array $options = []);
    public function validationOTP(User|Model $user, Bank|Model $bank, array $options = []);
}