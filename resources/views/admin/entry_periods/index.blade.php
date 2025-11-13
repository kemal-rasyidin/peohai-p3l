<x-admin.layout>
    <div class="space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-xl font-semibold">Daftar Periode</h1>
            <a href="{{ route('entry_periods.create') }}" class="bg-green-600 text-white px-3 py-1 rounded">Tambah</a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded">{{ session('success') }}</div>
        @endif

        <table class="w-full border-collapse border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Periode</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($periods as $i => $p)
                    <tr>
                        <td class="border p-2 text-center">{{ $periods->firstItem() + $i }}</td>
                        <td class="border p-2">{{ $p->periode }}</td>
                        <td class="border p-2">
                            <a href="{{ route('entry_periods.edit', $p->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('entry_periods.destroy', $p->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600"
                                    onclick="return confirm('Hapus periode ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">{{ $periods->links() }}</div>
    </div>
</x-admin.layout>
