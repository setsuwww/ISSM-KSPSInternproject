<?php

namespace App\Http\Controllers\Admin\Management;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:100'
        ]);

        Role::create([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.management.index', ['tab' => 'role']);
    }

    public function update(Role $role, Request $request)
    {
        $request->validate([
            'role' => 'required|string|max:100'
        ]);

        $role->update([
            'role' => $request->role,
        ]);

        return redirect()->route('admin.management.index', ['tab' => 'role']);
    }

    public function bulkUpdate(Request $request)
    {
        $data = $request->validate([
            'roles' => 'required|array',
            'roles.*.role' => 'required|string|max:150',
        ]);

        foreach ($data['roles'] as $id => $row) {
            Role::where('id', $id)
                ->where('is_active', true)
                ->update([
                    'role' => $row['role'],
                ]);
        }

        return redirect()->route('admin.management.index', ['tab' => 'role']);
    }

    public function destroy(Role $role)
    {
        $role->update(['is_active' => false]);
        return redirect()->route('admin.management.index', ['tab' => 'role']);
    }
}
