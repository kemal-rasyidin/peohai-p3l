<x-admin.layout>
    <div class="space-y-8">
        <div class="bg-green-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Tambah Data Admin Entry') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('admin.entries.store', $entry_period->id) }}" method="POST">
                @csrf

                {{-- <div class="mb-4">
                    <label for="entry_period_id" class="block font-medium text-gray-700">Periode</label>
                    <select name="entry_period_id" id="entry_period_id" class="border rounded-md w-full p-2">
                        @foreach ($periods as $periode)
                            <option value="{{ $periode->id }}">
                                {{ ucfirst($periode->bulan) }} {{ $periode->tahun }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Customer</label>
                        <input type="text" name="customer" class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Tujuan</label>
                        <input type="text" name="tujuan" class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No Kontainer</label>
                        <input type="text" name="no_cont" class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Jenis Barang</label>
                        <input type="text" name="jenis_barang" class="w-full border rounded-md p-2">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-md shadow">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
