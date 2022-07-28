<div>
    <div class="flex justify-between my-5">
        <div>
            <a href="{{ route('dashboard.banks.create') }}" class="btn btn-primary">Tambah Bank</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-compact w-full text-left">
            <thead>
            <tr>
                <th class="w-1"></th>
                <th class="w-1">Nama Rekening</th>
                <th>Nomor Rekening</th>
                <th class="w-1">Paket Layanan</th>
                <th class="w-1">Nama Layanan</th>
                <th class="w-1">Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($banks as $bank)
                <tr>
                    <th class="w-1"></th>
                    <td class="w-1">{{ $bank->account_name }}</td>
                    <td class="">{{ $bank->account_number }}</td>
                    <td class="w-1">{{ $bank->package->name }}</td>
                    <td class="w-1">{{ $bank->service->name }}</td>
                    <td class="w-1">
                        <input wire:click="updateStatus('{{ $bank->id }}')" type="checkbox" class="toggle" {{ $bank->is_active ? 'checked' : '' }} />
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-5">
        {{ $banks->links() }}
    </div>
</div>
