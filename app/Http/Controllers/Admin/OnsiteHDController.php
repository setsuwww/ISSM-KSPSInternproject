<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OnsiteHD;
use Illuminate\Http\Request;

class OnsiteHDController extends Controller
{
    public function index()
    {
        $onsites = OnsiteHD::latest()->paginate(10);
        return view('admin.onsite-hd.index', compact('onsites'));
    }

    public function create()
    {
        return view('admin.onsite-hd.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:150',
            'hd_onsite_name' => 'required|string|max:150',
            'tanggal_mulai_efektif' => 'required|date',
            'tanggal_akhir_efektif' => 'nullable|date|after_or_equal:tanggal_mulai_efektif',
        ]);

        OnsiteHD::create($validated);

        return redirect()
            ->route('admin.onsite.index')
            ->with('success', 'Data onsite berhasil ditambahkan');
    }

    public function show(OnsiteHD $onsiteHd)
    {
        return view('admin.onsite-hd.show', [
            'onsite' => $onsiteHd
        ]);
    }

    public function edit(OnsiteHD $onsiteHd)
    {
        return view('admin.onsite-hd.edit', [
            'onsite' => $onsiteHd
        ]);
    }

    public function update(Request $request, OnsiteHD $onsiteHd)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:150',
            'hd_onsite_name' => 'required|string|max:150',
            'tanggal_mulai_efektif' => 'required|date',
            'tanggal_akhir_efektif' => 'nullable|date|after_or_equal:tanggal_mulai_efektif',
        ]);

        $onsiteHd->update($validated);

        return redirect()
            ->route('admin.onsite.index')
            ->with('success', 'Data onsite berhasil diperbarui');
    }

    public function destroy(OnsiteHD $onsiteHd)
    {
        $onsiteHd->delete();

        return redirect()
            ->route('admin.onsite.index')
            ->with('success', 'Data onsite berhasil dihapus');
    }
}
