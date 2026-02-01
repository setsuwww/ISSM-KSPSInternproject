@extends('layouts.admin')

@section('title', 'Riwayat Jabatan Karyawan')

@section('content')
  <x-form>

    <x-form-header header="{{ $employee->nama }}" paragraph="{{ $employee->email }}" />
    <div class="overflow-x-auto border rounded-xl">
      <table class="w-full text-sm">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-4 py-3 text-left">Role</th>
            <th class="px-4 py-3 text-left">Jabatan</th>
            <th class="px-4 py-3 text-left">Fungsi</th>
            <th class="px-4 py-3 text-left">Lokasi</th>
            <th class="px-4 py-3 text-left">Mulai Efektif</th>
            <th class="px-4 py-3 text-left">Akhir Efektif</th>
            <th class="px-4 py-3 text-left">Status</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($employee->histories as $history)
            <tr class="border-t">
              <td class="px-4 py-3">{{ $history->role->role }}</td>
              <td class="px-4 py-3">{{ $history->jabatan->jabatan }}</td>
              <td class="px-4 py-3">{{ $history->fungsi->fungsi }}</td>
              <td class="px-4 py-3">{{ $history->location->location }}</td>
              <td class="px-4 py-3">
                {{ $history->tanggal_mulai_efektif }}
              </td>
              <td class="px-4 py-3">
                {{ $history->tanggal_akhir_efektif }}
              </td>
              <td class="px-4 py-3">
                @if($history->current_flag)
                  <span class="px-2 py-1 text-xs rounded bg-black text-white">
                    Aktif
                  </span>
                @else
                  <span class="text-xs text-gray-500">
                    Riwayat
                  </span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="px-4 py-6 text-center text-gray-500">
                Tidak ada riwayat jabatan
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.employee-history.index') }}"
        class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
        Kembali
      </a>
    </div>

  </x-form>
@endsection