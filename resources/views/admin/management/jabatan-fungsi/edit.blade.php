@extends('layouts.admin')

@section('title', 'Edit mapping')

@section('content')
  <x-form>
    <x-form-header header="Edit Mapping Fungsi" paragraph="Jabatan: {{ $jabatan->jabatan }}" />

    <div x-data="{
              assigned: @js($assignedFungsiIds),
              all: @js($allFungsis),
              search: ''
            }" class="mb-6">
      <div class="text-sm text-gray-500 mb-2">Fungsi ter-assign</div>

      <div class="flex flex-wrap gap-2">
        <template x-for="fungsi in all.filter(f => assigned.includes(f.id))" :key="fungsi.id">
          <span class="flex items-center gap-1 px-3 py-1 text-xs rounded-full bg-black text-white">
            <span x-text="fungsi.fungsi"></span>
            <button type="button" @click="assigned = assigned.filter(id => id !== fungsi.id)"
              class="ml-1 text-white/70 hover:text-white">
              ×
            </button>
          </span>
        </template>

        <span x-show="assigned.length === 0" class="text-xs text-gray-400">
          Belum ada fungsi
        </span>
      </div>

      <div class="mt-6 mb-3">
        <input type="text" x-model="search" placeholder="Cari fungsi..."
          class="w-full px-4 py-2 border rounded-lg text-sm focus:ring-1 focus:ring-black focus:border-black">
      </div>

      <form method="POST" action="{{ route('admin.management.jabatan-fungsi.update', $jabatan) }}">
        @csrf
        @method('PUT')

        <div class="border rounded-xl overflow-hidden">
          <table class="w-full text-sm">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-3 text-left w-12">Pilih</th>
                <th class="px-4 py-3 text-left">Nama Fungsi</th>
                <th class="px-4 py-3 text-left">Status</th>
              </tr>
            </thead>

            <tbody>
              <template x-for="fungsi in all.filter(f =>
                f.fungsi.toLowerCase().includes(search.toLowerCase())
              )" :key="fungsi.id">
                <tr class="border-t">
                  <td class="px-4 py-3">
                    <input type="checkbox" name="fungsi_ids[]" :value="fungsi.id" x-model="assigned"
                      class="rounded border-gray-300 text-black focus:ring-black">
                  </td>

                  <td class="px-4 py-3" x-text="fungsi.fungsi"></td>

                  <td class="px-4 py-3 text-xs">
                    <span x-show="assigned.includes(fungsi.id)" class="text-green-600">
                      Aktif
                    </span>
                    <span x-show="!assigned.includes(fungsi.id)" class="text-gray-400">
                      Tersedia
                    </span>
                  </td>
                </tr>
              </template>
            </tbody>
          </table>
        </div>
        <div class="flex justify-end gap-3 mt-6">
          <a href="{{ route('admin.management.jabatan-fungsi.index') }}"
            class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
            Batal
          </a>

          <button class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800">
            Simpan Mapping
          </button>
        </div>
      </form>
    </div>


  </x-form>
@endsection