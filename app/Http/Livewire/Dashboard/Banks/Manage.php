<?php

namespace App\Http\Livewire\Dashboard\Banks;

use App\Models\Bank;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public function render()
    {
        $banks = Bank::where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('livewire.dashboard.banks.manage', compact('banks'));
    }
}
