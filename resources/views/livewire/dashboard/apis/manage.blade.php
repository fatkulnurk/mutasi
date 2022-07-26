<div>
    <div class="flex justify-between my-5">
        <div>
            <a href="{{ route('dashboard.apis.create') }}" class="btn btn-primary">Tambah Api</a>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table table-compact w-full text-left">
            <thead>
            <tr>
                <th class="w-1"></th>
                <th class="w-1">Nama</th>
                <th>Terakhir dibuat</th>
                <th class="w-1">Dibuat Pada</th>
                <th class="w-1">Option</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tokens as $token)
                <tr>
                    <th class="w-1"></th>
                    <td class="">{{ $token->name }}</td>
                    <td class="">{{ $token->last_used_at }}</td>
                    <td class="">{{ $token->created_at }}</td>
                    <td class="w-1"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-5">
        {{ $tokens->links() }}
    </div>
</div>
