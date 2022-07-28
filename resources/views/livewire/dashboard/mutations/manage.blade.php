<div>
    <div class="my-5 grid grid-cols-2 md:grid-cols-4 gap-2">
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Pilih Bank</span>
            </label>
            <select wire:model.lazy="selectedBank" class="select select-bordered">
                <option value="" selected>Tampilkan Semua</option>
                @foreach($banks as $bank)
                    <option value="{{ $bank->id }}">{{ ($bank->account_name ?? '') . ' (' . ($bank->service->name ?? '') . ')' }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Jenis</span>
            </label>
            <select wire:model.lazy="selectedType" class="select select-bordered">
                <option value="" selected>Tampilkan Semua</option>
                @foreach($types as $key =>$type))
                    <option value="{{ $key }}">{{ $type ?? '' }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Mulai Tanggal</span>
            </label>
            <input wire:model.lazy="fromDate" type="date" placeholder="DD-MM-YYYY" class="input input-bordered w-full" />
        </div>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Sampai Tanggal</span>
            </label>
            <input wire:model.lazy="toDate" type="date" placeholder="DD-MM-YYYY" class="input input-bordered w-full" />
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-compact w-full text-left">
            <thead>
            <tr>
                <th class="w-1">Bank</th>
                <th class="w-1">Jumlah</th>
                <th>Deskripsi</th>
                <th class="w-1">Tipe</th>
                <th class="w-1">Waktu diambil</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mutations as $mutation)
                <tr>
                    <td class="w-1">
                        {{ $mutation->bank->account_name ?? '' }} / {{$mutation->bank->account_number ?? ''}}
                        <br>
                        ({{ $mutation->bank->service->name ?? '' }})
                    </td>
                    <td class="w-1">{{ $mutation->amount }}</td>
                    <td>{!! $mutation->description !!}</td>
                    <td class="w-1">{{ $mutation->type }}</td>
                    <td class="w-1">{{ $mutation->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-5">
        {{ $mutations->links() }}
    </div>
</div>
