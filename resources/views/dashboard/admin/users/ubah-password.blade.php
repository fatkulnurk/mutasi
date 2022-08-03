<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rubah Kata Sandi') }} {{ $user->username }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-base-100 p-2">
            <form action="{{ route('dashboard.admin.users.update-password', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Kata Sandi Baru</span>
                    </label>
                    <input name="password" type="password" placeholder="Type here" value="{{ old('password') }}" class="input input-bordered w-full" />
                    @error('password')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Ulangi Kata Sandi Baru</span>
                    </label>
                    <input name="password_confirmation" type="password" placeholder="Type here" value="{{ old('password_confirmation') }}" class="input input-bordered w-full" />
                    @error('password_confirmation')<span class="text-error py-2">{{ $message }}</span>@endif
                </div>
                <div class="form-control py-5">
                    <button class="btn">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
