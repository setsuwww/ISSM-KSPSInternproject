<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\Fungsi;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'jabatan' => 'required|string|max:150|unique:jabatans,jabatan',
            'fungsis' => 'nullable|array',
            'fungsis.*' => 'exists:fungsis,id',
        ]);

        $jabatan = Jabatan::create([
            'jabatan' => $data['jabatan'],
        ]);

        if (!empty($data['fungsis'])) {
            Fungsi::whereIn('id', $data['fungsis'])
                ->whereNull('jabatan_id') // proteksi bisnis rule
                ->update([
                    'jabatan_id' => $jabatan->id
                ]);
        }

        return redirect()
            ->route('admin.management.index', ['tab' => 'jabatan']);
    }

    public function update(Jabatan $jabatan, Request $request)
    {
        $request->validate([
            'jabatan' => 'required|string|max:150'
        ]);

        $jabatan->update([
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('admin.management.index', ['tab' => 'jabatan']);
    }

    public function bulkUpdate(Request $request)
    {
        $data = $request->validate([
            'jabatans' => 'required|array',
            'jabatans.*.jabatan' => 'required|string|max:150',
        ]);

        foreach ($data['jabatans'] as $id => $row) {
            Jabatan::where('id', $id)
                ->where('is_active', true)
                ->update([
                    'jabatan' => $row['jabatan'],
                ]);
        }

        return redirect()->route('admin.management.index', ['tab' => 'jabatan']);
    }

    public function destroy(Jabatan $jabatan)
    {
        $jabatan->update(['is_active' => false]);
        return redirect()->route('admin.management.index', ['tab' => 'jabatan']);
    }
}
