@extends('layouts.admin')

@section('content')
  <x-form>
    <x-form-header header="Onsite HD" paragraph="Daftar histori onsite" />

    <div class="flex justify-end mb-4">
      <a href="{{ route('admin.onsite.create') }}" class="px-4 py-2 bg-black text-white rounded-lg">
        Tambah
      </a>
    </div>

    <table class="w-full text-sm border rounded-lg overflow-hidden">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-3 text-left">Customer</th>
          <th class="p-3 text-left">HD</th>
          <th class="p-3 text-left">Mulai</th>
          <th class="p-3 text-left">Akhir</th>
          <th class="p-3 text-left">Status</th>
          <th class="p-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($onsites as $onsite)
          <tr class="border-t">
            <td class="p-3">{{ $onsite->customer_name }}</td>
            <td class="p-3">{{ $onsite->hd_onsite_name }}</td>
            <td class="p-3">{{ $onsite->tanggal_mulai_efektif }}</td>
            <td class="p-3">{{ $onsite->tanggal_akhir_efektif ?? '-' }}</td>
            <td class="p-3">
              {{ $onsite->tanggal_akhir_efektif ? 'Nonaktif' : 'Aktif' }}
            </td>
            <td class="p-3 flex gap-2 justify-end">
              <a href="{{ route('admin.onsite.show', $onsite) }}">Detail</a>
              <a href="{{ route('admin.onsite.edit', $onsite) }}">Edit</a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </x-form>
@endsection
