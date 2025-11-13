<x-admin.layout>
    <div class="space-y-8">
        <div class="bg-purple-600 text-white shadow-md rounded-lg">
            <div class="p-6 text-lg font-semibold">
                {{ __('Edit Data Finance Entry') }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
            <form action="{{ route('finance.entries.update', [$entry_period->id, $entry->id]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="harga" value="{{ old('harga', $entry->harga) }}"
                            class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">PPH / Non</label>
                        <select name="pph_status" class="w-full border rounded-md p-2">
                            <option value="">-- Pilih --</option>
                            <option value="pph" {{ $entry->pph_status == 'pph' ? 'selected' : '' }}>PPH</option>
                            <option value="non" {{ $entry->pph_status == 'non' ? 'selected' : '' }}>Non</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Agen</label>
                        <input type="text" name="agen" value="{{ old('agen', $entry->agen) }}"
                            class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Dooring</label>
                        <input type="text" name="dooring" value="{{ old('dooring', $entry->dooring) }}"
                            class="w-full border rounded-md p-2">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">SI Final</label>
                        <input type="text" name="si_final" value="{{ old('si_final', $entry->si_final) }}"
                            class="w-full border rounded-md p-2">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">No Invoice</label>
                        <input type="text" name="no_inv" value="{{ old('no_inv', $entry->no_inv) }}"
                            class="w-full border rounded-md p-2">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-500 text-white px-4 py-2 rounded-md shadow">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin.layout>
