<?php

use App\Models\Bank;
use App\Services\Crawlers\CrawlerFactory;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('crawler:all', function () {
    $banks = Bank::orderBy('created_at')->get();
    foreach ($banks as $bank) {
        try {
            CrawlerFactory::make($bank);
        } catch (Exception $e) {
        }
    }
})->purpose('Crawler Data');
