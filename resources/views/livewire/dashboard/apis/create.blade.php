<div>
    <form wire:submit.prevent="submit">
        @if(blank($plainTextToken))
            <div class="bg-base-100 rounded p-3">
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text text-lg">Masukan nama api</span>
                    </label>
                    <input wire:model.lazy="name"
                           type="text"
                           placeholder="Masukan Nama Api"
                           class="input input-bordered w-full"/>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text text-lg">Masukan Kata Sandi anda</span>
                    </label>
                    <input wire:model.lazy="password"
                           type="password"
                           placeholder="password"
                           class="input input-bordered w-full"/>
                </div>

                <div class="form-control w-full my-5">
                    <button type="submit" class="btn">Submit</button>
                </div>

                @else
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text text-lg">Token Api (Harap disimpan, karena hanya ditampilkan sekali ini saja</span>
                        </label>
                        <input wire:model.lazy="plainTextToken"
                               type="text"
                               disabled="disabled"
                               class="input input-bordered w-full"/>
                    </div>
                @endif
            </div>
    </form>
</div>
