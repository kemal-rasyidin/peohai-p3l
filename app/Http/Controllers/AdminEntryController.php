<?php

namespace App\Http\Controllers;

use App\Models\EntryMain;
use App\Models\EntryPeriod;
use Illuminate\Http\Request;

class AdminEntryController extends Controller
{
    /**
     * Menampilkan daftar data Entry milik Admin (bisa difilter berdasarkan periode)
     */
    public function index(EntryPeriod $entry_period)
    {
        // Ambil semua entry yang sesuai periode ini
        $entries = EntryMain::where('entry_period_id', $entry_period->id)->paginate(10);

        // Kirim ke view
        return view('admin.entry.admin.index', compact('entries', 'entry_period'));
    }

    /**
     * Form tambah data entry untuk Admin.
     */
    public function create(EntryPeriod $entry_period)
    {
        return view('admin.entry.admin.create', compact('entry_period'));
    }

    /**
     * Simpan data baru hasil input Admin
     */
    public function store(Request $request, EntryPeriod $entry_period)
    {
        $validated = $request->validate([
            'qty' => 'nullable|integer',
            'tgl_stuffing' => 'nullable|date',
            'sl_sd' => 'nullable|string|max:255',
            'customer' => 'nullable|string|max:255',
            'pengirim' => 'nullable|string|max:255',
            'penerima' => 'nullable|string|max:255',
            'jenis_barang' => 'nullable|string|max:255',
            'pelayaran' => 'nullable|string|max:255',
            'nama_kapal' => 'nullable|string|max:255',
            'voy' => 'nullable|string|max:255',
            'tujuan' => 'nullable|string|max:255',
            'etd' => 'nullable|date',
            'eta' => 'nullable|date',
            'no_cont' => 'nullable|string|max:255',
            'seal' => 'nullable|string|max:255',
            'agen' => 'nullable|string|max:255',
            'dooring' => 'nullable|string|max:255',
            'nopol' => 'nullable|string|max:255',
            'supir' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:50',
            'harga' => 'nullable|numeric',
            'si_final' => 'nullable|string|max:255',
            'ba' => 'nullable|string|max:255',
            'ba_balik' => 'nullable|string|max:255',
            'no_inv' => 'nullable|string|max:255',
            'alamat_penerima_barang' => 'nullable|string|max:255',
            'nama_penerima' => 'nullable|string|max:255',
        ]);

        $validated['entry_period_id'] = $entry_period->id;
        // $validated['status'] = 'admin_filled';

        EntryMain::create($validated);

        return redirect()
            ->route('admin.entries.index', $entry_period->id)
            ->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Form edit data Entry (Admin)
     */
    public function edit(EntryMain $entry)
    {
        $periods = EntryPeriod::orderByDesc('tahun')->get();
        return view('entry.admin.edit', compact('entry', 'periods'));
    }

    /**
     * Update data Entry (Admin)
     */
    public function update(Request $request, EntryMain $entry)
    {
        $validated = $request->validate([
            'entry_period_id' => 'required|exists:entry_periods,id',
            'qty' => 'nullable|integer',
            'tgl_stuffing' => 'nullable|date',
            'sl_sd' => 'nullable|string|max:255',
            'customer' => 'nullable|string|max:255',
            'pengirim' => 'nullable|string|max:255',
            'penerima' => 'nullable|string|max:255',
            'jenis_barang' => 'nullable|string|max:255',
            'pelayaran' => 'nullable|string|max:255',
            'nama_kapal' => 'nullable|string|max:255',
            'voy' => 'nullable|string|max:255',
            'tujuan' => 'nullable|string|max:255',
            'etd' => 'nullable|date',
            'eta' => 'nullable|date',
            'no_cont' => 'nullable|string|max:255',
            'seal' => 'nullable|string|max:255',
            'nopol' => 'nullable|string|max:255',
            'supir' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:50',
            'alamat_penerima_barang' => 'nullable|string|max:255',
            'nama_penerima' => 'nullable|string|max:255',
        ]);

        $entry->update($validated);
        $entry->update(['status' => 'admin_filled']);

        return redirect()->route('admin.entry.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Hapus data Entry (Admin)
     */
    public function destroy(EntryMain $entry)
    {
        $entry->delete();
        return redirect()->route('admin.entry.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
