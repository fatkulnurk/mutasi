<?php

namespace App\Http\Livewire\Dashboard\Banks;

use App\Models\Bank;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $selectedService = null;
    public $selectedPackage = null;
    public $customerName = '';
    public $customerNumber = '';
    public $credentials = null;
    public $serviceModel = null;

    public $rules = [
        'selectedService' => 'required|string|exists:services,id',
        'selectedPackage' => 'required|string|exists:packages,id',
        'customerName' => 'required|string',
        'customerNumber' => 'required|string',
    ];

    public function updatingSelectedService($value)
    {
        $this->serviceModel = Service::findOrFail($value);
    }

    public function submit()
    {
        $this->validate();

        $data = [];
        $data['user_id'] = auth()->id();
        $data['service_id'] = $this->selectedService;
        $data['package_id'] = $this->selectedPackage;
        $data['account_name'] = $this->customerName;
        $data['account_number'] = $this->customerNumber;
        $data['credential'] = $this->credentials;

        $bank = Bank::create($data);

        $this->reset();

        return redirect()->route('dashboard.banks.index');
    }

    public function getServices()
    {
        return Service::orderBy('created_at')->get();
    }

    public function getPackages()
    {
        return Package::orderBy('created_at')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.banks.create', [
            'services' => $this->getServices(),
            'packages' => $this->getPackages()
        ]);
    }
}
