<?php

namespace App\Http\Livewire\Dashboard\Apis;

use App\Models\PersonalAccessToken;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public function render()
    {
        $tokens = PersonalAccessToken::where('tokenable_id', auth()->id())->paginate(10);

        return view('livewire.dashboard.apis.manage', compact('tokens'));
    }
}
