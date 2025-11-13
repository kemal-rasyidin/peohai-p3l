<x-admin.layout>
    <div class="space-y-8">
        <div class="bg-purple-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Data Finance Entry') }}
            </div>
        </div>

        {{-- Filter Periode --}}
        {{-- <form method="GET" class="mb-4">
            <label for="periode" class="mr-2 font-medium">Periode:</label>
            <select name="periode" id="periode" onchange="this.form.submit()" class="border rounded-md px-3 py-2">
                <option value="">-- Semua Periode --</option>
                @foreach ($periods as $periode)
                    <option value="{{ $periode->id }}" {{ $selectedPeriod == $periode->id ? 'selected' : '' }}>
                        {{ ucfirst($periode->bulan) }} {{ $periode->tahun }}
                    </option>
                @endforeach
            </select>
        </form> --}}

        <div class="bg-white overflow-hidden shadow-lg rounded-lg">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">No</th>
                            <th class="px-4 py-3 text-left">Customer</th>
                            <th class="px-4 py-3 text-left">Tujuan</th>
                            <th class="px-4 py-3 text-left">Harga</th>
                            <th class="px-4 py-3 text-left">PPH / Non</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($entries as $entry)
                            <tr class="border-t">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $entry->customer ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $entry->tujuan ?? '-' }}</td>
                                <td class="px-4 py-3">
                                    {{ $entry->harga ? 'Rp ' . number_format($entry->harga, 0, ',', '.') : '-' }}</td>
                                <td class="px-4 py-3">{{ strtoupper($entry->pph_status ?? '-') }}</td>
                                {{-- <td class="px-4 py-3">
                                    <span
                                        class="px-2 py-1 rounded text-sm {{ $entry->status == 'finance_filled' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        {{ ucfirst(str_replace('_', ' ', $entry->status)) }}
                                    </span>
                                </td> --}}
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ route('finance.entries.edit', [$entry->entry_period_id, $entry->id]) }}"
                                        class="bg-purple-600 hover:bg-purple-500 text-white px-3 py-1 rounded-md text-sm">
                                        Edit
                                    </a>
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
                {{ $entries->links() }}
            </div>
        </div>
    </div>
</x-admin.layout>
