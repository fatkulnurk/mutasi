<?php

namespace App\Http\Livewire\Dashboard\Mutations;

use App\Enums\MutationType;
use App\Models\Mutation;
use App\Services\Banks\BankService;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public $selectedBank;
    public $selectedType;
    public $fromDate;
    public $toDate;

    public function render()
    {
        $bankService = (new BankService());
        $mutations = Mutation::where('user_id', auth()->user()->id)
            ->when(!blank($this->selectedBank), function ($query) {
                return $query->where('bank_id', $this->selectedBank);
            })
            ->when(!blank($this->selectedType), function ($query) {
                return $query->where('type', $this->selectedType);
            })
            ->when(!blank($this->fromDate), function ($query) {
                $timestamp = Carbon::parse($this->fromDate)->timestamp;
                return $query->where('created_at', '>=', $timestamp);
            })
            ->when(!blank($this->toDate), function ($query) {
                $timestamp = Carbon::parse($this->toDate)->timestamp;
                return $query->where('created_at', '<=', $timestamp);
            })
            ->orderByDesc('created_at')
            ->paginate(10);

        $banks = $bankService->getAllBy(auth()->id());
        $types = MutationType::get();

        return view('livewire.dashboard.mutations.manage', compact(
            'mutations', 'banks', 'types'
        ));
    }
}
