<div>
    <div class="flex justify-between my-2">
        <div class="form-control">
            <a href="{{ route('dashboard.admin.users.create') }}" class="btn gap-2 btn-primary"><i
                        class="fa-solid fa-circle-plus"></i>Tambah User</a>
        </div>
        <div class="form-control">
            <div class="input-group">
                <input wire:model.lazy="search" type="text" placeholder="Search…" class="input input-bordered" />
                <button class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                </button>
            </div>
        </div>
    </div>

    <div class="bg-base-100 p-2">
        @if(blank($users))
            <div class="alert shadow-lg my-5">
                <div>
                    <span>Tidak ada users.</span>
                </div>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">
                    <thead>
                    <tr>
                        <th class="w-1">#</th>
                        <th class="w-1">Nama</th>
                        <th>Email</th>
                        {{--                        <th class="w-1">Nomor Telepon</th>--}}
                        <th class="w-1">Opsi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $item)
                        <tr>
                            <th class="w-1">
                                {{ get_iteration_number($users, $loop->iteration) }}
                            </th>
                            <td class="w-1">{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            {{--                            <td class="w-1">{{ $item->phone_number }}</td>--}}
                            <td>
                                <div class="dropdown dropdown-left">
                                    <label tabindex="0" class="btn btn-ghost">
                                        <svg id="more-circle-vertical" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 24 24" class="h-5 w-5">
                                            <circle id="primary" cx="12" cy="12" r="9"
                                                    style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2;"></circle>
                                            <line id="primary-upstroke" x1="12" y1="6.95" x2="12" y2="7.05"
                                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.6;"></line>
                                            <line id="primary-upstroke-2" data-name="primary-upstroke" x1="12"
                                                  y1="11.95" x2="12" y2="12.05"
                                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.6;"></line>
                                            <line id="primary-upstroke-3" data-name="primary-upstroke" x1="12"
                                                  y1="16.95" x2="12" y2="17.05"
                                                  style="fill: none; stroke: rgb(0, 0, 0); stroke-linecap: round; stroke-linejoin: round; stroke-width: 2.6;"></line>
                                        </svg>
                                    </label>
                                    <ul tabindex="0"
                                        class="dropdown-content menu shadow bg-base-100 rounded-box w-52">
{{--                                        <li><a href="{{ route('dashboard.admin.users.edit', $item->id) }}">Edit User</a></li>--}}
{{--                                        <li><a href="{{ route('dashboard.admin.users.edit-password', $item->id) }}">Ubah Kata Sandi</a></li>--}}
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-5">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>
