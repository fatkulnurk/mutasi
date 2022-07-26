<?php

namespace App\Services\Crawlers;

use App\Models\Bank;
use App\Models\Service;
use App\Models\User;
use App\Services\Crawlers\Contracts\DriverInterface;
use App\Services\Crawlers\Drivers\IbankKlikBca\BankBcaService;
use Illuminate\Database\Eloquent\Model;

class CrawlerFactory
{
    public static function make(Bank|Model $bank, array $options = [])
    {
        $bank->loadMissing(['service', 'user']);
        $driver = self::getProvider($bank->service);

        return $driver->make(user: $bank->user, bank: $bank,options: $options);
    }

    public static function getProvider(Service|Model $service): DriverInterface
    {
        return match (strtoupper($service->code)) {
            'BCA' => new BankBcaService(),
            default => throw new \Exception('Error: unknown service code.')
        };
    }
}