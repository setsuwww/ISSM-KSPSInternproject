<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Fungsi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanFungsiController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::with('fungsis')->get();

        return view('admin.management.jabatan-fungsi.index', compact('jabatans'));
    }
    public function edit(Jabatan $jabatan)
    {
        // semua fungsi
        $allFungsis = Fungsi::orderBy('fungsi')->get();

        // fungsi yg sudah dipakai jabatan ini
        $assignedFungsiIds = $jabatan->fungsis()->pluck('fungsis.id')->toArray();

        // fungsi yg dipakai jabatan LAIN (lock)
        $lockedFungsiIds = DB::table('jabatan_fungsi')
            ->where('jabatan_id', '!=', $jabatan->id)
            ->pluck('fungsi_id')
            ->toArray();

        return view('admin.management.jabatan-fungsi.edit', compact(
            'jabatan',
            'allFungsis',
            'assignedFungsiIds',
            'lockedFungsiIds'
        ));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'fungsi_ids' => 'array'
        ]);

        // kosongkan fungsi lama
        Fungsi::where('jabatan_id', $jabatan->id)
            ->update(['jabatan_id' => null]);

        // assign baru
        if ($request->filled('fungsi_ids')) {
            Fungsi::whereIn('id', $request->fungsi_ids)
                ->update(['jabatan_id' => $jabatan->id]);
        }

        return redirect()
            ->route('admin.management.jabatan-fungsi.index')
            ->with('success', 'Mapping berhasil disimpan');
    }

}
