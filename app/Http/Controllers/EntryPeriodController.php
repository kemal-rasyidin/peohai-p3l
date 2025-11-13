<?php

namespace App\Http\Controllers;

use App\Models\EntryPeriod;
use Illuminate\Http\Request;

class EntryPeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periods = EntryPeriod::orderByDesc('tahun')->orderByDesc('id')->paginate(10);
        return view('admin/entry_periods.index', compact('periods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/entry_periods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|digits:4|integer|min:2000',
        ]);

        // Cegah duplikat periode
        if (EntryPeriod::where($validated)->exists()) {
            return back()->withErrors(['periode' => 'Periode ini sudah ada.'])->withInput();
        }

        EntryPeriod::create($validated);

        return redirect()->route('entry_periods.index')
            ->with('success', 'Periode berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EntryPeriod $entryPeriod)
    {
        return view('admin/entry_periods.edit', compact('entryPeriod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EntryPeriod $entryPeriod)
    {
        $validated = $request->validate([
            'bulan' => 'required|string|max:20',
            'tahun' => 'required|digits:4|integer|min:2000',
        ]);

        $entryPeriod->update($validated);

        return redirect()->route('entry_periods.index')
            ->with('success', 'Periode berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EntryPeriod $entryPeriod)
    {
        $entryPeriod->delete();
        return redirect()->route('entry_periods.index')
            ->with('success', 'Periode berhasil dihapus.');
    }
}
