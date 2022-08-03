<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Manage extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $users = User::when(!blank($this->search), function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%')
//                ->orWhere('phone_number', 'like', '%' . $this->search . '%')
                ->orWhere('id', 'like', '%' . $this->search . '%')
//                ->orWhere('username', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%');
        })->simplePaginate(20);

        return view('livewire.admin.users.manage', compact('users'));
    }
}
