@extends('layouts.admin')

@section('content')
  <x-form>
    <x-form-header header="Employee History" paragraph="Riwayat penugasan dan posisi karyawan" />

    {{-- ACTION BAR --}}
    <div class="flex justify-between items-center mb-6">
      <div class="text-sm text-gray-500">
        Total: {{ $items->total() }} data
      </div>

      <a href="{{ route('admin.employee-history.create') }}"
        class="bg-black text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-800">
        Tambah History
      </a>
    </div>

    {{-- FLASH --}}
    @if(session('success'))
      <div class="mb-6 rounded-lg bg-green-50 text-green-700 px-4 py-3 text-sm">
        {{ session('success') }}
      </div>
    @endif

    {{-- TABLE --}}
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-600">
          <tr>
            <th class="px-4 py-3 text-left font-medium">Employee</th>
            <th class="px-4 py-3 text-left font-medium">Role</th>
            <th class="px-4 py-3 text-left font-medium">Lokasi</th>
            <th class="px-4 py-3 text-left font-medium">Jabatan</th>
            <th class="px-4 py-3 text-left font-medium w-40">Aksi</th>
          </tr>
        </thead>

        <tbody class="divide-y">
          @forelse($items as $item)
            <tr class="transition">
              {{-- EMPLOYEE --}}
              <td class="px-4 py-3">
                <div class="font-medium text-gray-900">
                  {{ $item->employee->nama }}
                </div>
                <div class="text-xs text-gray-400">
                  {{ $item->employee->nik }}
                </div>
              </td>

              {{-- ROLE --}}
              <td class="px-4 py-3">
                {{ $item->role->role ?? '-' }}
              </td>

              {{-- LOKASI --}}
              <td class="px-4 py-3">
                {{ $item->location->location ?? '-' }}
              </td>

              {{-- JABATAN --}}
              <td class="px-4 py-3">
                {{ $item->jabatan->jabatan ?? '-' }}
              </td>

              {{-- ACTION --}}
              <td class="px-4 py-3 text-right">
                <div class="inline-flex gap-2">
                  <a href="{{ route('admin.employee-history.show', $item) }}"
                    class="px-3 py-1 rounded-md text-xs bg-gray-100 hover:bg-gray-200">
                    View
                  </a>

                  <a href="{{ route('admin.employee-history.edit', $item) }}"
                    class="px-3 py-1 rounded-md text-xs bg-yellow-100 text-yellow-700 hover:bg-yellow-200">
                    Edit
                  </a>

                  <form action="{{ route('admin.employee-history.destroy', $item) }}" method="POST"
                    onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="px-3 py-1 rounded-md text-xs bg-red-100 text-red-700 hover:bg-red-200">
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-4 py-10 text-center text-gray-400">
                Belum ada data employee history
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-6">
      {{ $items->links() }}
    </div>
  </x-form>
@endsection