<?php

namespace App\Services\Crawlers\Drivers\IbankKlikBca;

use App\Models\Bank;
use App\Models\Mutation;
use App\Models\Service;
use App\Models\User;
use App\Services\Crawlers\Contracts\DriverInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BankBcaService implements DriverInterface
{
    public function getTransaction($username, $password)
    {
//        $client = (new BankBca('FATKULNU1801', '222339'));
        $client = (new BankBca($username, $password));
        $transactions = $client->getListTransaksi(
            now()->subDays(29)->format('Y-m-d'),
            now()->format('Y-m-d')
        );
        $client->logout();

        return $transactions;
        $upserts = [];
        foreach ($transactions as $item) {
            $itemArray = collect($item)->toArray();
            $length = count(optional($itemArray)['description']);
            $type = strtoupper(optional($itemArray)['flows']);
            $amount = floatval(preg_replace('/[^\d.]/', '',
                optional($itemArray)['description'][($length - 1)] ?? 0
            ));

            $description = '';
            foreach (optional($itemArray)['description'] as $key => $value) {
                $break = ($key == ($length - 1)) ? '' : '</br>';
                $description = $description . $value . $break;
            }

            $hash = md5(strip_tags($description) . $amount . $type);
            $upserts[] = [
                'id' => Str::uuid()->toString(),
                'date' => optional($itemArray)['date'],
                'description' => strip_tags($description),
                'description_raw' => $description,
                'amount' => $amount,
                'type' => $type,
                'hash' => $hash
            ];
        }

        return $upserts;
    }

    public function make(Model|User $user, Model|Bank $bank, array $options = [])
    {
        $credential = $bank->credential;
        $transactions = $this->getTransaction(
            $credential['username'],
            $credential['password']
        );

        $upserts = [];
        foreach ($transactions as $item) {
            $itemArray = collect($item)->toArray();
            $length = count(optional($itemArray)['description']);
            $type = strtoupper(optional($itemArray)['flows']);
            $amount = floatval(preg_replace('/[^\d.]/', '',
                optional($itemArray)['description'][($length - 1)] ?? 0
            ));

            $description = '';
            foreach (optional($itemArray)['description'] as $key => $value) {
                $break = ($key == ($length - 1)) ? '' : '</br>';
                $description = $description . $value . $break;
            }

            $hash = md5(strip_tags($description) . $amount . $type);
            $upserts[] = [
                'id' => Str::uuid()->toString(),
                'user_id' => $user->id,
                'bank_id' => $bank->id,
                'date' => optional($itemArray)['date'],
                'description' => $description,
                'amount' => $amount,
                'type' => $type,
                'hash' => $hash
            ];
        }

        try {
            Mutation::upsert($upserts, ['description', 'amount', 'type', 'hash'], ['hash']);
        } catch (\Exception $e) {
        }
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