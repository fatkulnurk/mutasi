<?php

namespace App\Http\Livewire\Dashboard\Banks;

use App\Models\Bank;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public function updateStatus($bankId)
    {
        $bank = Bank::select(['id', 'is_active'])->where('id', $bankId)->first();
        if (!blank($bank)) {
            $bank->is_active = !$bank->is_active;
            $bank->save();
        }
    }

    public function render()
    {
        $banks = Bank::with(['service:id,name', 'package:id,name'])
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.dashboard.banks.manage', compact('banks'));
    }
}
