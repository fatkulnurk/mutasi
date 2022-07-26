<?php

namespace App\Services\Banks;

use App\Models\Bank;

class BankService
{
    public function getAllBy($userId)
    {
        return Bank::with('service:id,name')->where('user_id', $userId)->orderByDesc('created_at')->get();
    }
}