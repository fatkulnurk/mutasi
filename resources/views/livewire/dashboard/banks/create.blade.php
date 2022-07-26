<div>
    <form wire:submit.prevent="submit">
        <div class="bg-base-100 rounded p-3">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-lg">Pilih Bank</span>
                </label>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach($services as $service)
                        <label class="label cursor-pointer w-full p-3 bg-base-100 hover:bg-base-200 border rounded-md">
                            <div class="flex justify-between h-full my-auto w-full">
                                <div class="flex justify-start">
                                    <div class="avatar my-auto">
                                        <div class="w-12 rounded-full">
                                            <img src="{{ asset('images/default.png') }}"/>
                                        </div>
                                    </div>
                                    <div class="pl-2 my-auto">
                                        <h3 class="font-extrabold">{{ $service->name }}</h3>
                                        <p class="">{{ $service->description }}</p>
                                    </div>
                                </div>
                                <div class="my-auto">
                                    <input wire:model.lazy="selectedService"
                                           type="radio"
                                           name="service"
                                           value="{{ $service->id}}"
                                           class="radio checked:bg-red-500"/>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text text-lg">Pilih Paket</span>
                </label>
                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-2">
                    @foreach($packages as $package)
                        <label class="label cursor-pointer w-full p-3 bg-base-100 hover:bg-base-200 border rounded-md">
                            <div class="flex justify-between h-full my-auto w-full">
                                <div class="my-auto">
                                    <h3 class="font-extrabold">{{ $package->name }}</h3>
                                    <p class="">{{ $package->description }}</p>
                                </div>
                                <div class="my-auto">
                                    <input wire:model.lazy="selectedPackage"
                                           type="radio"
                                           name="package"
                                           value="{{ $package->id }}"
                                           class="radio checked:bg-red-500"/>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            </div>

        <div class="grid grid-cols-2 gap-2">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">{{ strtoupper('Nama Pada Rekening/Ewallet') }}</span>
                </label>
                <input wire:model.lazy="customerName" type="text" placeholder=""
                       class="input input-bordered w-full"/>
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">{{ strtoupper('Nomor Rekening/Nomor Telepon Pada E-wallet') }}</span>
                </label>
                <input wire:model.lazy="customerNumber" type="text" placeholder=""
                       class="input input-bordered w-full"/>
            </div>
        </div>
        </div>

        <div class="bg-base-100 rounded p-3 my-3">
            @if(!blank($serviceModel))
                <div class="grid grid-cols-2 gap-2">
                    @foreach(collect($serviceModel->credential)->toArray() ?? [] as $key => $credential)
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">{{ strtoupper($key) }}</span>
                            </label>
                            <input wire:model.lazy="credentials.{{ $key }}"
                                   type="text"
                                   placeholder="{{ $credential }}"
                                   class="input input-bordered w-full"/>
                        </div>
                    @endforeach
                </div>
            @endif

            @if(!blank($credentials))
                <div class="form-control w-full my-5">
                    <button type="submit" class="btn">Simpan</button>
                </div>
            @endif
        </div>
    </form>
</div>
