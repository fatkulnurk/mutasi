<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah User') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-base-100 p-2">
            <form action="{{ route('dashboard.admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input name="name" type="text" placeholder="Type here" value="{{ old('name', $user->name) }}" class="input input-bordered w-full" />
                    @error('name')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                {{--
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nomor Telepon/Whatsapp</span>
                    </label>
                    <input name="phone_number" type="text" placeholder="Type here" value="{{ old('phone_number', $user->phone_number) }}" class="input input-bordered w-full" />
                    @error('phone_number')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" placeholder="Type here" value="{{ $user->username }}" class="input input-bordered w-full" disabled/>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Alamat Lengkap</span>
                    </label>
                    <input name="address" type="text" placeholder="Type here"value="{{ old('address', $user->address) }}"  class="input input-bordered w-full" />
                    @error('address')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <select name="gender" class="select select-bordered">
                        <option value="" disabled selected>Jenis Kelamin</option>
                        <option value="male" @if($user->gender == 'male') selected @endif>Laki Laki</option>
                        <option value="female"@if($user->gender == 'female') selected @endif>Perempuan</option>
                    </select>
                    @error('gender')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                --}}
                <div class="form-control py-5">
                    <button class="btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
