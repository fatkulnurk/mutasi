<?php

namespace App\Http\Livewire\Dashboard\Apis;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;
    public $password;
    public $plainTextToken;

    public $rules = [
        'name' => 'required|string|max:60',
        'password' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        if (!Hash::check($this->password, auth()->user()->password)) {
            session()->flash('failed', 'Invalid password.');
        } else {
            $scopes = ['mutations:read'];
            $this->plainTextToken = auth()->user()->createToken($this->name, $scopes)->plainTextToken;
            session()->flash('message', 'Token berhasil dibuat.');
        }
    }

    public function render()
    {
        return view('livewire.dashboard.apis.create');
    }
}
