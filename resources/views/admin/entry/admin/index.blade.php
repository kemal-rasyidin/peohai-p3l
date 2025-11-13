<x-admin.layout>
    <div class="space-y-8">

        <div class="bg-blue-500 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Data Admin Entry') }}
            </div>
        </div>

        <a href="{{ route('admin.entries.create', $entry_period->id) }}"
            class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md shadow">
            + Tambah Data
        </a>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg mt-4">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Customer</th>
                            <th class="px-4 py-3 text-left">Tujuan</th>
                            <th class="px-4 py-3 text-left">No Kontainer</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($entries as $entry)
                            <tr class="border-t">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $entry->periode->periode ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $entry->customer ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $entry->tujuan ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $entry->no_cont ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded text-sm {{ $entry->status == 'finance_filled' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst(str_replace('_', ' ', $entry->status)) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    {{-- <a href="{{ route('admin.entry.edit', $entry->id) }}"
                                        class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded-md text-sm">
                                        Edit
                                    </a> --}}
                                    <form action="{{ route('admin.entries.destroy', [$entry_period->id, $entry->id]) }}"
                                        method="POST" class="inline-block"
                                        onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded-md text-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4 text-gray-500">
                                    Tidak ada data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{-- {{ $entrys->links() }} --}}
            </div>
        </div>
    </div>
</x-admin.layout>
